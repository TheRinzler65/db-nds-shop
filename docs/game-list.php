<?php

require_once 'site-load.php';

import_header();

?>

<?php

$game_list_updated = get_games( 0, [
    'orderby' => 'updated'
] );

if( $game_list_updated != [] ){

    ?>

    <div class="games-grid">

    <?php

        foreach( $game_list_updated as $game ){

            if( !( $game instanceof Game ) ) continue;

            ?>

            <a href="<?php echo build_game_url( $game->file_name ); ?>">
                <div class="game-block">
                    <img src="<?php $game->icon(); ?>" alt="<?php $game('title'); ?> Icon" class="game-icon">
                    <h3><?php $game('title'); ?></h3>
                    <p><strong><?php t('author'); ?></strong>&nbsp;<?php $game('author'); ?></p>
                    <p><strong><?php t('version'); ?></strong>&nbsp;<?php $game('version'); ?></p>
                    <p><strong><?php t('system'); ?></strong>&nbsp;<?php $game->systems(); ?></p>
                    <p><strong><?php t('latest_update'); ?></strong>&nbsp;<?php echo date_formater( $game->update ); ?></p>
                </div>
            </a>

            <?php
        }

    ?>

    </div>

    <?php

}

import_footer();