<?php

Route::get(ADM_URI.'/(:bundle)', function()
{
    return Redirect::to(ADM_URI.'/gravatar/settings');
});

Route::get(ADM_URI.'/(:bundle)/settings', function()
{
    return Controller::call('gravatar::backend.settings@index');
});

Route::put(ADM_URI.'/(:bundle)/settings', function()
{
    return Controller::call('settings::backend.settings@update');
});