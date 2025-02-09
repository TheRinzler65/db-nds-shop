<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

define( 'SITE_URL', 'https://db-nds-shop.fr/' );
define( 'SITE_PATH', __DIR__ . "/" );

define( 'GAME_DATA_FOLDER', '_ds/' );

define( 'SITE_NAME', 'db-nds-shop' );
define( 'SITE_TITLE_SEP', ' - ' );
define( 'SITE_DEFAULT_IMAGE', "" );

$allowed_languages = [ 'fr', 'en' ];

$pages = [
    'index.php' => [
        'name' => 'Accueil | db-nds-shop',
        'fr_name' => 'Accueil | db-nds-shop',
        'en_name' => 'Home | db-nds-shop'
    ],
    'game.php' => [
        'name' => 'Accueil',
        'fr_name' => 'Accueil',
        'en_name' => 'Eng',
    ],
    'game-list.php' => [
        'name' => 'Liste des Jeux NDS | db-nds-shop',
        'fr_name' => 'Liste des Jeux NDS | db-nds-shop',
        'en_name' => 'NDS Games List | db-nds-shop' ,  
    ],  
    'about.php' => [
        'name' => 'À propos | db-nds-shop',
        'fr_name' => 'À propos | db-nds-shop',
        'en_name' => 'About | db-nds-shop',
    ],
    'rss.php' => [
        'name' => 'RSS | db-nds-shop',
        'fr_name' => 'RSS | db-nds-shop',
        'en_name' => 'RSS | db-nds-shop',
    ]    
];

$css = [
    SITE_URL . 'css/styles.css',
    SITE_URL . 'css/toggleswitch.css',
];

$js = [
    SITE_URL . 'js/darkmode.js',
    SITE_URL . 'js/languages.js'
];