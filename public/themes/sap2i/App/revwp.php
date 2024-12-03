<?php

/**
 * ------------------
 * Fonctions global
 * ------------------
 */

/**
 * Redimenssionne une image
 *
 * @param [string] $imagePath
 * @param [float] $width
 * @param [float] $height
 * @return string
 */
function useResize($imagePath, $width, $height = null, $webp = false)
{
    global $revwp;
    if (!empty($revwp->optimizer)) {
        return $revwp->optimizer->useResize($imagePath, $width, $height, $webp);
    } else {
        return $imagePath;
    }
}

/**
 * Ajoute un feuille de style en
 * fonction du role de l'utilsateur
 *
 * @param [string] $role
 * @param [string] $file
 * @return void
 */
function addAdminRoleCss($role, $file)
{
    add_action('admin_print_styles', function () use ($role, $file) {
        global $revwp;
        $revwp->addAdminCss($role, $file);
    }, 11);
}

/**
 * Ajoute une feuille de style
 * sur la page de connexion
 *
 * @param [string] $file
 * @return void
 */
function addCustomCssLogin($file)
{
    add_action('login_head', function () use ($file) {
        echo '<link rel="stylesheet" type="text/css" href="' . $file . '" />';
    });
}

/**
 * Permet de mettre le style dans le footer
 * s'il n'est pas mit en inline
 *
 * @param [type] $handle
 * @param string $src
 * @param array $deps
 * @param boolean $ver
 * @param string $media
 * @param boolean $inFooter
 * @return void
 */
function addEnqueueStyle($handle, $src = '', $deps = array(), $ver = false, $media = 'all', $inFooter = false)
{
    if ($inFooter) {
        add_action('wp_footer', function () use ($handle, $src, $deps, $ver, $media) {
            wp_enqueue_style($handle, $src, $deps, $ver, $media);
        });
    } else {
        wp_enqueue_style($handle, $src, $deps, $ver, $media);
    }
}

/**
 * Active la possibilité d'upload
 * des images SVG dans le BO
 *
 * @return void
 */
function activeUploadSvg()
{
    add_filter('upload_mimes', function ($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    });
}

/**
 * Function de nettoyage
 *
 * @param [type] $string
 * @param boolean $force_lowercase
 * @param boolean $anal
 * @return void
 */
function sanitize($string, $force_lowercase = true, $anal = false)
{
    $strip = array(
        "~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
        "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
        "â€”", "â€“", ",", "<", ">", "/", "?"
    );
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    // Remove special accented characters - ie. sí.
    $clean = strtr($clean, array('Š' => 'S', 'Ž' => 'Z', 'š' => 's', 'ž' => 'z', 'Ÿ' => 'Y', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ÿ' => 'y'));
    $clean = strtr($clean, array('Þ' => 'TH', 'þ' => 'th', 'Ð' => 'DH', 'ð' => 'dh', 'ß' => 'ss', 'Œ' => 'OE', 'œ' => 'oe', 'Æ' => 'AE', 'æ' => 'ae', 'µ' => 'u'));
    $clean = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $clean);
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
        mb_strtolower($clean, 'UTF-8') :
        strtolower($clean) :
        $clean;
}