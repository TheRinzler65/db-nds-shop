<?php

defined('SITE_LOADED') or die("You don't have access to this file.");

define('SITE_URL', 'http://localhost/');
define('SITE_PATH', __DIR__ . "/");

define('GAME_DATA_FOLDER', '_ds/');

define('SITE_NAME', 'NDS-Shop');
define('SITE_TITLE_SEP', ' - ');
define('SITE_DEFAULT_IMAGE', "");

$allowed_languages = ['fr', 'en'];

$pages = [
    'index.php' => [
        'name' => 'Accueil',
        'fr_name' => 'Accueil',
        'en_name' => 'Home'
    ],
    'game.php' => [
        'name' => '',
        'fr_name' => '',
        'en_name' => '',
    ],
    'game-list.php' => [
        'name' => 'Liste des jeux',
        'fr_name' => 'Liste des jeux',
        'en_name' => 'Games List',
    ],
    'about.php' => [
        'name' => 'À propos',
        'fr_name' => 'À propos',
        'en_name' => 'About',
    ],
    'rss.php' => [
        'name' => 'RSS',
        'fr_name' => 'RSS',
        'en_name' => 'RSS',
    ]
];

$css = [
    SITE_URL . 'css/styles.css',
    SITE_URL . 'css/toggleswitch.css',
];

$js = [
    SITE_URL . 'js/darkmode.js',
    SITE_URL . 'js/languages.js',
    SITE_URL . 'js/script.js',
    SITE_URL . 'js/gametable.js'
];
