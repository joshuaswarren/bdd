<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/bdd/', function() use ($app) {
    return "Welcome to the world of BDD";
});

$app->get('/bdd/timeoff/new/', function() use ($app) {
    if(Request::has('name')) {
        $to = new \App\Timeoff();
        $name = Request::input('name');
        $reason = Request::input('reason');
        $to->create($name, $reason);
        return "Time off request submitted";
    } else {
        return view('request.new');
    }
});

