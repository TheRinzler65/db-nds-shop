<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

function array_parse( array $suspect, array $default ){

    foreach( $default as $key => $value ){

        if( !isset( $suspect[$key] ) ) $suspect[$key] = $value;
    }

    return $suspect;
}

function date_formater( $date ){

    global $date_format;
    return $date_format->format( $date );

}