<?php

namespace App;
use Illuminate\Support\Facades\Facade;

class CustomeFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'skill_2';
    }
}
