<?php

defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

function get_games( int $number = 0, array $args = [] ){

    // Parse args.
    $default = [
        'orderby' => 'title'
    ];
    $args = array_parse( $args, $default );

    // Fetch all games.
    $files = glob( SITE_PATH . GAME_DATA_FOLDER . '*.md' );
    $games = [];

    foreach( $files as $file ){

        $games[] = new Game( basename($file, '.md') );

    }

    // Filters. Order by updated.
    if( $args['orderby'] == 'updated' ){

        foreach( $games as $game ){

            if( $game->update == "" ){
                
                unset( $games[ array_search( $game, $games ) ] );

            }
        }

        usort( $games, function( $a, $b ){
            return $b->update - $a->update;
        } );
    }

    if( $number != 0 ){

        $games = array_slice( $games, 0, $number );

    }

    return $games;
}

function build_game_url( string $gamename ){

    return build_url( 'game.php', [ 'file' => $gamename ] );
}