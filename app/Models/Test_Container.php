<?php

namespace App\Models;

class Test_Container{
    protected $abalities = [];
    public function bind($key,$value){
        $this->abalities[$key]= $value;
    }

    public function resolve($key){
        return call_user_func($this->abalities[$key]);
    }

}

