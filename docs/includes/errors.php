<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

function site_error( string $error_message, int $http_error_code = 200 ){

    http_response_code( $http_error_code );
    ?>
        <div class="site-error-box" style="border: 1px solid black;padding:3%10%3%10%;margin:1%20%1%20%;display:flex;align-items:center;justify-content:center;flex-direction:column;">
            <b>An error occured : <?php echo $http_error_code; ?></b>
            <p><?php echo $error_message; ?></p>
        </div>

    <?php
    die();

}