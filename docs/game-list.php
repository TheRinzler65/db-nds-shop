<?php
require_once 'site-load.php';
import_header();

$game_list = get_games(0, ['orderby' => 'updated']);
?>

<div class="game-list-container">
    <h1 class="game-list-title"><?php t('games_list'); ?></h1>

    <input type="text" id="searchInput" class="search-bar" placeholder="<?php t('search_game'); ?>">

    <div class="table-wrapper">
        <table class="game-table" id="gameTable">
            <thead>
                <tr>
                    <th><?php t('icon'); ?></th>
                    <th onclick="sortTable(1)"><?php t('title'); ?> ⬍</th>
                    <th onclick="sortTable(2)"><?php t('version'); ?> ⬍</th>
                    <th onclick="sortTable(3)"><?php t('author'); ?> ⬍</th>
                    <th onclick="sortTable(4)"><?php t('latest_update'); ?> ⬍</th>
                    <th><?php t('categories'); ?></th>
                    <th><?php t('system'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($game_list as $game):
                    if (!($game instanceof Game)) continue;
                ?>
                    <tr>
                        <td>
                            <a href="<?= build_game_url($game->file_name); ?>">
                                <img src="<?php $game->icon(); ?>" alt="<?php $game('title'); ?>" class="table-icon">
                            </a>
                        </td>
                        <td><a href="<?= build_game_url($game->file_name); ?>"><?php $game('title'); ?></a></td>
                        <td><?php $game('version'); ?></td>
                        <td><?php $game('author'); ?></td>
                        <td><?= format_game_date($game->update); ?></td>
                        <td><?= implode(', ', $game->meta('categories') ?? []); ?></td>
                        <td><?php $game->systems(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php import_footer(); ?>