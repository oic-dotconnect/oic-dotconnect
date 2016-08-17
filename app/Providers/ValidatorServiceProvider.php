<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Validator\CustomValidator;

class ValidatorServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        \Validator::resolver(function($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * @return void
     */
    public function register()
    {
        //
    }

}
