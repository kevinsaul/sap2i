<?php

namespace App\Helpers;

/**
 * RevWP class.
 */
class RevWPClass
{
    public $optimizer;
    public $config;
    public $blocType;

    public function __construct()
    {
        if (env('IMAGE_OPTIMIZER')) {
            $this->optimizer = new OptimizerClass();
        }

        add_action('wp_dashboard_setup', array($this, 'addDashboardWidgets'));
        add_action('init', array($this, 'excludeImagesFromSearchResults'));
        $this->removeWordpressShit();
        add_filter('wp_resource_hints', array($this, 'removeDnsPrefetch'), 10, 2);
        add_action('wp_footer', array($this, 'myDeregisterScripts'));
        add_action('wp_print_styles', array($this, 'enqueueStyleToInline'), 101);
        add_action('wp_before_admin_bar_render', array($this, 'lsAdminBarRemove'), 0);
    }

    /**
     * Widget de l'agence.
     */
    public function dashboardWidgetFunction($post, $callback_args)
    {
        $data = array(
            'name' => 'Bonjour',
            'color' => '#d10a43',
        );

        $url = 'https://www.revelateur.fr/widget.html?' . http_build_query($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $widget = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        echo $widget;
    }

    /**
     * Ajout du Widget de l'agence dans le tableau de bord.
     */
    public function addDashboardWidgets()
    {
        wp_add_dashboard_widget('dashboard_widget', 'Agence Révélateur', array($this, 'dashboardWidgetFunction'));
    }

    /**
     * Exclude images from search results.
     */
    public function excludeImagesFromSearchResults()
    {
        global $wp_post_types;
        $wp_post_types['attachment']->exclude_from_search = true;

        return;
    }

    /*
      * Remove Wordpress shits
      * ---------------------------------------
      */
    public function removeWordpressShit()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rest_output_link_wp_head');
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('wp_head', 'wp_oembed_add_host_js');
        remove_action('rest_api_init', 'wp_oembed_register_route');
        remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    }

    public function removeDnsPrefetch($hints, $relation_type)
    {
        if ('dns-prefetch' === $relation_type) {
            return array_diff(wp_dependencies_unique_hosts(), $hints);
        }

        return $hints;
    }

    public function myDeregisterScripts()
    {
        wp_deregister_script('wp-embed');
    }

    /**
     * Met les CSS enqueue en inline dans le head.
     */
    public function enqueueStyleToInline()
    {
        global $wp_styles;

        if (class_exists('\MatthiasMullie\Minify\CSS') && !empty($wp_styles->queue) && env('CSS_INLINE')) {
            $cssToInline = [];

            foreach ($wp_styles->queue as $handle) {
                $cssToInline[] = str_replace(get_stylesheet_directory_uri(), get_stylesheet_directory(), $wp_styles->registered[$handle]->src);
                wp_dequeue_style($handle);
            }

            $inline = '';
            foreach ($cssToInline as $cssPath) {
                $canMinify = true;
                $url = strtok($cssPath, '?');

                if (!file_exists($url)) {
                    $canMinify = false;
                    if (file_exists(ABSPATH . $url)) {
                        $url = ABSPATH . $url;
                        $canMinify = true;
                    }
                }

                if ((strpos($url, 'http') !== false || strpos($url, 'http') !== false)) {
                    $canMinify = true;
                }

                if ($canMinify) {
                    $minifier = new \MatthiasMullie\Minify\CSS($url);
                    $contentCss = $minifier->minify();
                    $inline .= $contentCss;
                }
            }

            $variablesCss = [
                'tpl_dir' => get_template_directory_uri(),
                'child_dir' => get_stylesheet_directory_uri(),
            ];
            foreach ($variablesCss as $varName => $value) {
                $inline = str_replace('{$' . $varName . '}', $value, $inline);
            }

            echo '<style>' . $inline . '</style>';
        }
    }

    /**
     * Ajouter un style spécifique à un
     * groupe utilisateur sur le back office.
     */
    public function addAdminCss($role, $file)
    {
        $f = pathinfo($file);

        if (!empty($f) && current_user_can($role)) {
            wp_enqueue_style('rev_' . $f['filename'] . '_css', $file);
        }
    }

    /**
     * Remove wordpress logo/pages from admin bar.
     *
     * @global type $wp_admin_bar
     */
    public function lsAdminBarRemove()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
    }
}
