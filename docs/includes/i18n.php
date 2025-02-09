<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

function load_translation( string $lang_name ){

    $path = SITE_PATH . 'i18n/' . $lang_name. '.php';

    if( file_exists( $path ) ){

        require_once $path;

    } else {

        site_error( "Translation file doesn't exist. ", 500 );

    }
}

function t( string $text_name ){

    echo T[$text_name] ?? "";
}