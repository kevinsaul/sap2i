<?php

namespace App\Controllers;

use App\Models\Page as PageModel;

/**
 * Template site map controller.
 */
class TplContact extends Page
{
    /**
     * Allow recovery data of the page.
     *
     * @var PageModel
     */
    protected $pageData;

    /**
     * Define contact form title.
     *
     * @var integer
     */
    private $formTitle;

    /**
     * Define contact form ID.
     *
     * @var integer
     */
    private $formID;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pageData = PageModel::find(get_post(), [
            'contact',
            'accroche_contact',
            'banner_contact'
        ]);
    }


    /**
     * Define contact form shortcode with formId and formTitle attributes.
     *
     * @return string  
     */
    public function contactForm()
    {
        if (!empty($this->pageData->contact)) {
            return do_shortcode('[contact-form-7 id="'.$this->pageData->contact['value'].'"]');
        }
    }
}
