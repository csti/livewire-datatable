<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Endpoint;
use App\Models\EndpointAction;
use Faker\Generator as Faker;

$factory->define(Endpoint::class, function (Faker $faker) {
    return [
    ];
});


$factory->define(EndpointAction::class, function (Faker $faker) {
    return [
        'active' => 1,
    ];
});

$factory->state(EndpointAction::class, 'index', function (Faker $faker) {
    return [
        'verb' => 'GET',
        'action' => 'index',
    ];
});
$factory->state(EndpointAction::class, 'store', function (Faker $faker) {
    return [
        'verb' => 'POST',
        'action' => 'store',
    ];
});
$factory->state(EndpointAction::class, 'show', function (Faker $faker) {
    return [
        'verb' => 'GET',
        'action' => 'show',
    ];
});
$factory->state(EndpointAction::class, 'update', function (Faker $faker) {
    return [
        'verb' => 'PUT',
        'action' => 'update',
    ];
});
$factory->state(EndpointAction::class, 'delete', function (Faker $faker) {
    return [
        'verb' => 'DELETE',
        'action' => 'destroy',
    ];
});

