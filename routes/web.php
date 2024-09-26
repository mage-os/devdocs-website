<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', 'main');
}

Route::get('/', [DocsController::class, 'showRootPage']);

Route::get('docs/{version}/index.json', [DocsController::class, 'index']);
Route::get('docs/{version}/{page?}', [DocsController::class, 'show'])->name('docs.version');


Route::get('team', function () {
    return view('team', [
        'team' => [
            [
                'name' => 'David Lambauer',
                'github_username' => 'davidlambauer',
                'twitter_username' => 'davidlambauer',
                'location' => 'Germany',
            ], [
                'name' => 'John Prendergast',
                'github_username' => 'johnprendergast',
                'twitter_username' => 'johnprendergast',
                'location' => 'Ireland',
            ],  [
                'name' => 'John Hughes',
                'github_username' => 'johnhughes1984',
                'twitter_username' => 'JohnHughes1984',
                'location' => 'Shrewsbury, United Kingdom',
            ],  [
                'name' => 'Ryan Hoerr',
                'github_username' => 'rhoerr',
                'twitter_username' => 'ryanhoerr',
                'location' => 'Lancaster, PA USA',
            ], [
                'name' => 'Peter Jaap Blaakmeer',
                'github_username' => 'PeterJaap',
                'twitter_username' => 'PeterJaap',
                'location' => 'Groningen, Netherlands',
            ], [
                'name' => 'Alessandro Ronchi',
                'github_username' => 'aleron75',
                'twitter_username' => 'aleron75',
                'location' => 'Reggio Emilia - Italy',
            ], [
                'name' => 'Brent W. Peterson',
                'github_username' => 'brentwpeterson',
                'twitter_username' => 'brentwpeterson',
                'location' => 'Saint Louis Park',
            ], [
                'name' => 'Roland Haselager',
                'github_username' => 'rhaselager',
                'twitter_username' => 'rhaselager',
                'location' => 'Utrecht, The Netherlands',
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
                'name' => 'Damien Retzinger',
                'github_username' => 'damienwebdev',
                'twitter_username' => 'damienwebdev',
                'location' => 'Richmond, VA',
            ]
        ],
        'title' => 'Team',
        'metaTitle' => DocsController::DEFAULT_META_TITLE,
        'metaDescription' => DocsController::DEFAULT_META_DESCRIPTION,
        'metaKeywords' => DocsController::DEFAULT_META_KEYWORDS,
        'canonical' => 'team'
    ]);
})->name('team');
