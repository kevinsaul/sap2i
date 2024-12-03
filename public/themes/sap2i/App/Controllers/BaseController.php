<?php

namespace App\Controllers;

use Bladerunner\Controller;

/**
 * Global controller.
 */
class BaseController extends Controller
{
    /**
     * Define the controller on the view.
     *
     * @return $this
     */
    public function controller()
    {
        return $this;
    }

    /**
     * Get global informations from general parameters option page.
     *
     * @return array
     */
    public function informations()
    {
        return get_field('global_informations', 'option');
    }

    /**
     * Get global informations from general parameters option page.
     *
     * @return array
     */
    public function socialNetworks()
    {
        return get_field('social_networks', 'option');
    }

    /**
     * Get Language Switcher.
     *
     * @return string
     */
    public function languages()
    {
        if (function_exists('pll_the_languages')) {
            return pll_the_languages([
                'hide_current' => 0,
                'hide_if_empty' => 0,
                'display_names_as' => 'slug',
                'echo' => false,
            ]);
        } else {
            return;
        }
    }

    /**
     * Get current languages.
     *
     * @return string
     */
    public function language()
    {
        if (function_exists('pll_the_languages')) {
            return pll_current_language();
        } else {
            return home_url();
        }
    }
}
