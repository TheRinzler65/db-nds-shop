<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

function build_url( string $php_pagename, array $args = [] ){

    $url = SITE_URL . $php_pagename;

    if( !empty( $args ) ){

        $url .= "?";

        foreach( $args as $key => $value ){

            $url .= $key . "=" . $value . "&";
        }

        $url = substr( $url, 0, -1 );

    }

    return $url;

}

function home_url(){

    return build_url( 'index.php' );
}