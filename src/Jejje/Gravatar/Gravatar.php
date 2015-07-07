<?php namespace Jejje\Gravatar;

use Illuminate\Support\Facades\Facade;

class Gravatar extends Facade {

    /**
     * Facade for our Gravatar Package
     * so that we may use it like
     * Gravatar::method();
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'Jejje\Gravatar\Image';
    }

}