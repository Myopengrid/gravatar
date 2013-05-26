<?php

class Gravatar_Backend_Settings_Controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->data['bar'] = array(
            'title'       => __('gravatar::lang.Gravatar')->get(ADM_LANG),
            'url'         => URL::base(). '/'.ADM_URI.'/gravatar',
            'description' => __('gravatar::lang.Provides access to gravatar api service')->get(ADM_LANG),
        );

        $this->data['section_bar'] = array(
            __('gravatar::lang.Settings')->get(ADM_LANG) => URL::base().'/'.ADM_URI.'/gravatar/settings',
        );
    }

    public function get_index()
    {
        $this->data['section_bar_active'] = __('groups::lang.Settings')->get(ADM_LANG);
        
        $this->data['settings'] = Settings\Model\Setting::where_module_slug('gravatar')->order_by('order', 'asc')->get();

        return $this->theme->render('gravatar::backend.settings', $this->data); 
    }
}