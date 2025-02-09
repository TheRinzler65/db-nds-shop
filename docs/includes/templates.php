<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

function import_template( string $template_name ){

    $path = SITE_PATH . 'public/templates/' . $template_name . '.php';

    if( file_exists( $path ) ){

        include $path;

    } else {

        echo "This current template doesn't exist.";

    }
}

function import_header(){

    return import_template( 'header' );
}

function import_footer(){

    return import_template( 'footer' );
}

function get_page_head_title(){

    global $page;
    
    if( isset( $page['custom_title'] ) ) return $page['custom_title'];

    $title = $page[ SITE_CURRENT_USER_LANGUAGE . '_name' ] ?? $page['name'];
    $title .= SITE_TITLE_SEP . SITE_NAME;

    return $title;
}

function css_files(){

    global $css;

    foreach( $css as $single ){

        ?>
        
            <link rel="stylesheet" href="<?php echo $single; ?>">

        <?php
    }

    return;
}

function js_files(){

    global $js;

    foreach( $js as $single ){

        ?>
        
            <script src="<?php echo $single; ?>"></script>

        <?php
    }

    return;
}
