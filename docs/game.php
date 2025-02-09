<?php

require_once 'site-load.php';

$game_name = isset($_GET['file']) ? strip_tags($_GET['file']) : 'none';
$game = new Game($game_name);

if (!isset($game->game_path)) site_error("An error occured during game launch. Maybe this game doesn't exist.", 404);

global $page;
$page['custom_title'] = $game->meta('title') . SITE_TITLE_SEP . SITE_NAME;

import_header();

?>

<div class="game-details">

    <!-- Image Game Banner -->
    <div class="slider">
        <img class="slider-background" src="" alt="<?php $game('title'); ?> Banner">
        <div class="slider-content">
            <h1 style="color:<?php $game('color'); ?>;"><?php $game('title'); ?></h1>
        </div>
    </div>

    <!-- Block 1 -->
    <div class="block-game-details left">
        <img class="icon" src="<?php $game->icon(); ?>" alt="<?php $game('title'); ?> Icon"'>
        <p><strong style="color:<?php $game('color'); ?>;"><?php t('author'); ?></strong>&nbsp;<?php $game('author'); ?></p>
        <p><strong style="color:<?php $game('color'); ?>;"><?php t('version'); ?></strong>&nbsp;<?php $game('version'); ?></p>
        <p><strong style="color:<?php $game('color'); ?>;"><?php t('latest_update'); ?></strong>&nbsp;<?php echo date_formater($game->update); ?></p>
        <?php if (!empty($game->meta('categories'))) { ?>
            <p><strong style="color:<?php $game('color'); ?>;"><?php t('categories'); ?></strong>&nbsp;<?php echo implode(', ', $game->meta('categories')); ?></p>
        <?php } ?>
        <?php if (!empty($game->meta('systems'))) { ?>
            <p><strong style="color:<?php $game('color'); ?>;"><?php t('system'); ?></strong>&nbsp;<?php $game->systems(); ?></p>
        <?php } ?>
    </div>

    <!-- Block 2 -->
    <div class="block-game-details right">
        <?php if (!empty($game->meta('downloads')) && is_array($game->meta['downloads'])) { ?>
            <h2 style="color:<?php $game('color'); ?>;"><?php t('downloads'); ?></h2>
            <ul>
                <?php
                foreach ($game->meta['downloads'] as $name => $details) {

                    echo '<li><a href="' . $details['url'] . '">' . 'Télécharger ' . $name . '</a> (' . $details['size_str'] . ')</li>';
                }
                ?>
            </ul>
        <?php } ?>

        <?php if (!empty($game->meta('qr'))) { ?>
            <h2 style="color:<?php $game('color'); ?>;"><?php t('qr_code'); ?></h2>
            <?php
            foreach ($game->meta['qr'] as $key => $url) {

                if (filter_var($url, FILTER_VALIDATE_URL)) {

                    echo '<img src="' . $url . '" alt="' . sprintf(T['qr_code_for'], $key) . '">';
                } else {

                    echo '<p><strong>' . $key . ':</strong>' . T['qr_code_unavailable'] . '</p>';
                }
            }
            ?>
        <?php } ?>

        <?php if (!empty($game->meta('screenshots'))) { ?>
            <h2 style="color:<?php $game('color'); ?>;"><?php t('screenshots'); ?></h2>
            <div class=' screenshots'>
        <?php foreach ($game->meta['screenshots'] as $screenshot) {

                $description = $screenshot['description'] ?? T['screenshot_alt'];

                echo '<div><img src="' . $screenshot['url'] . '" alt="' . $description . '"></div>';
            } ?>
    </div>
<?php } ?>
</div>

</div>

<?php

import_footer();
