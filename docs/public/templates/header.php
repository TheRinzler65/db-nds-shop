<?php

    defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

?>

<!DOCTYPE html>
<html lang="<?php echo SITE_CURRENT_USER_LANGUAGE; ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <title><?php echo get_page_head_title(); ?></title>
        <?php css_files(); ?>
    </head>
    <body>
        <?php import_template( 'menu' ); ?>
    <main>