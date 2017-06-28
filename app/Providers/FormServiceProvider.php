<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('esText', 'form.text', ['name', 'label']);
        Form::component('esTextarea', 'form.textarea', ['name', 'label']);
        Form::component('esSubmit', 'form.submit', ['label']);
        Form::component('esSelect', 'form.select', ['name', 'label', 'options', 'multiple']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
