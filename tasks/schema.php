<?php

class Gravatar_Schema_Task {

    public function __construct()
    {
        Bundle::register('settings');
        Bundle::start('settings');

        Bundle::register('modules');
        Bundle::start('modules');
    }

    public function install()
    {
        $module = Modules\Model\Module::where_slug('settings')->first();
        
        $gravatar_default_image = array(
            'title'       => 'Default Image', 
            'slug'        => 'gravatar_default_image', 
            'description' => 'Gravatar will automatically serve up that image if there is no image associated with the requested email', 
            'type'        => 'select', 
            'default'     => '0', 
            'value'       => '0', 
            'options'     => '{"0":"None","404":"HTTP 404","mm":"Mistery Man","identicon":"Geometric Pattern","monsterid":"Monster","wavatar":"Random Generated","retro":"Arcate Style Image"}', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => '1', 
            'module_slug' => 'gravatar', 
            'module_id'   => $module->id, 
            'order'       => '999', 
        );
        $gravatar_default_image = Settings\Model\Setting::create($gravatar_default_image);

        $gravatar_rating = array(
            'title'       => 'Rating', 
            'slug'        => 'gravatar_rating', 
            'description' => 'Indicate if an image is appropriate for a certain audience', 
            'type'        => 'select', 
            'default'     => 'g', 
            'value'       => 'g', 
            'options'     => '{"g":"G","pg":"PG","r":"R","x":"X"}', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => '1', 
            'module_slug' => 'gravatar', 
            'module_id'   => $module->id, 
            'order'       => '999', 
        );
        $gravatar_rating = Settings\Model\Setting::create($gravatar_rating);

        $gravatar_size = array(
            'title'       => 'Gravatar Size', 
            'slug'        => 'gravatar_size', 
            'description' => 'The default size of the gravatar image to be displayed on the application', 
            'type'        => 'text', 
            'default'     => '80', 
            'value'       => '80', 
            'options'     => '', 
            'class'       => '', 
            'section'     => '',
            'validation'  => 'required|numerid', 
            'is_gui'      => '1', 
            'module_slug' => 'gravatar', 
            'module_id'   => $module->id, 
            'order'       => '999', 
        );
        $gravatar_size = Settings\Model\Setting::create($gravatar_size);
    }

    public function uninstall()
    {
        //
        // REMOVE GRAVATAR SETTINGS
        // 
        $settings = Settings\Model\Setting::where_module_slug('gravatar')->get();
        
        if(isset($settings) and !empty($settings))
        {
            foreach ($settings as $setting) 
            {
                $setting->delete();
            }
        }
    }

    public function __destruct()
    {
        Bundle::disable('settings');
        Bundle::disable('modules');
    }
}