<?php

use App\CustomeFacade;
use App\Models\Services\Skill_One;
use App\Models\Services\Skill_Two;
use App\Models\Test_Container;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get("container",function(){

    $player =new Test_Container();

    $player->bind("skill_1",function(){
        return new Skill_One();
    });

    $player->bind("skill_2",function(){
        return new Skill_Two();
    });

    $res = $player->resolve("skill_1");
    $res2 = $player->resolve("skill_2");

    dd($res->spell(),$res->name,$res2->spell());
});


Route::get("laravel_app",function(){
    app()->bind("skill_1",function(){ // should use service provider
        return new Skill_One();
    });
    dd(resolve("skill_1")->spell());
});


// add service/class used by AppServiceProvider and resolve the services
Route::get("service_provider",function(Skill_One $skill_One , Skill_Two $skill_Two){
    dd($skill_One->spell(),$skill_Two->name); // can use key eg:: resolve("skill_1");
});


// use custome serviceProvider and use FacadeAccessor
Route::get("FacadeAccessor",function(Skill_Two $skill_Two){
    dd(CustomeFacade::spell(),resolve("skill_2"),$skill_Two->name);
});
