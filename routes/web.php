<?php

use App\Models\User;
use App\CustomeFacade;
use App\Events\testevent;
use App\Mail\WelcomeMail;
use App\Models\Test_Container;
use App\Models\Services\Skill_One;
use App\Models\Services\Skill_Two;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\TestingNotifiaction;
use Illuminate\Support\Facades\Notification;


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


// mail raw
Route::get("mailRaw",function(){
    Mail::raw("testing",function($mess){
        $mess->to("test@gmail.com")->subject("Welcome Message");
    });
    dd("mail was send");
});


//Mail to
Route::get("welcomeMail",function(){
    $email = "anc@123";
    $name = "aung";
    Mail::to($email)->send(new WelcomeMail($email ,$name));
    dd("mail was send");
});

// notification
Route::get("noti",function(){
    Notification::send(User::find(1),new TestingNotifiaction());
    dd("done noti");
});

// notify
Route::get("notify",function(){
    $user = User::findOrFail(1);
    $user->notify(new TestingNotifiaction());
    dd("done");
});

// events and listeners
Route::get("hitEvent",function(){
    $user = User::findOrFail(1);
    event(new testevent($user));
    dd("send noti");
});

// test livewire
Route::get("livewire",function(){
    return view("welcome");
});

