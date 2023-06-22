<?php

use App\Documentation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', 'main');
}

Route::get('docs', [DocsController::class, 'showRootPage']);

Route::get('docs/{version}/index.json', [DocsController::class, 'index']);
Route::get('docs/{version}/{page?}', [DocsController::class, 'show'])->name('docs.version');

Route::redirect('partners', 'https://partners.laravel.com');

Route::get('partner/{partner}', function ($partner) {
    return redirect('https://partners.laravel.com/partners/'.$partner, 301);
});

Route::get('/', fn() => view('marketing'))->name('marketing');

Route::get('team', function () {
    return view('team', [
        'team' => [
            [
                'name' => 'David Lambauer',
                'github_username' => 'davidlambauer',
                'twitter_username' => 'davidlambauer',
                'location' => 'Germany',
            ], [
                'name' => 'Ivan Chepurnyi',
                'github_username' => 'IvanChepurnyi',
                'twitter_username' => 'IvanChepurnyi',
                'location' => 'Netherlands',
            ], [
                'name' => 'Rafael Corrêa Gomes',
                'github_username' => 'rafaelstz',
                'twitter_username' => 'rafaelcgstz',
                'location' => 'Montreal, CA',
            ], [
                'name' => 'Gonzalo Pelon',
                'github_username' => 'gomencal',
                'twitter_username' => 'gonzalopelon',
                'location' => 'Spain',
            ], [
                'name' => 'Rye Miller',
                'github_username' => 'ryemiller',
                'twitter_username' => 'ryemiller',
                'location' => 'Denver',
            ], [
                'name' => 'Matthias Walter',
                'github_username' => 'mwr',
                'twitter_username' => 'mat_walter',
                'location' => 'Germany',
            ], [
                'name' => 'Jerry Lopez',
                'github_username' => 'jerrylopez',
                'twitter_username' => 'jerrylopezdev',
                'location' => 'Texas',
            ], [
                'name' => 'Kuba Zwolinski',
                'github_username' => 'snowdog',
                'twitter_username' => 'snowdog',
                'location' => 'Poland',
            ], [
                'name' => 'Sascha Wohlgemuth',
                'github_username' => 'Celldweller',
                'twitter_username' => 'Nomad73',
                'location' => 'Germany',
            ],[
                'name' => 'Sean van Zuidam',
                'github_username' => 'GrimLink',
                'twitter_username' => 'GrimLink',
                'location' => 'Netherlands',
            ],[
                'name' => 'Sanjay Patel',
                'github_username' => 'sanjay-evrig',
                'twitter_username' => 'sanjaypatel653',
                'location' => 'Ahmemdabad, India',
            ],[
                'name' => 'Max Uroda',
                'github_username' => 'u-maxx',
                'twitter_username' => 'u_maxx',
                'location' => 'Ukraine',
            ],[
                'name' => 'Torben Höhn',
                'github_username' => 'torhoen',
                'twitter_username' => 'torhoen',
                'location' => 'Germany',
            ],[
                'name' => 'Kiel',
                'github_username' => 'pykettk',
                'twitter_username' => 'level42psyduck',
                'location' => 'United Kingdom',
            ],[
                'name' => 'Willem Poortman',
                'github_username' => 'wpoortman',
                'twitter_username' => 'wpoortman',
                'location' => 'Netherlands',
            ],[
                'name' => 'Simon Sprankel',
                'github_username' => 'sprankhub',
                'twitter_username' => 'SimonSprankel',
                'location' => 'Germany',
            ],[
                'name' => 'Vinai Kopp',
                'github_username' => 'Vinai',
                'twitter_username' => 'VinaiKopp',
                'location' => 'Germany',
            ],[
                'name' => 'Christian Münch',
                'github_username' => 'cmuench',
                'twitter_username' => 'cmuench',
                'location' => 'Germany',
            ],
        ]
    ]);
})->name('team');

Route::get('/frontend', function () {
    return view('frontend');
})->name('frontend');

Route::get('/trademark', function () {
    return view('trademark');
})->name('trademark');
