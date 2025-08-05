<?php
require_once 'site-load.php';
import_header();

$game_list_updated = get_games(5, ['orderby' => 'updated']);
?>

<!-- 1st block -->
<section class="hero-section">
    <img src="assets/website/banner_nds.jpeg" alt="Hero banner" class="hero-img">
    <div class="hero-content">
        <h1>NDS-Shop</h1>
        <p>Téléchargez et jouez aux meilleurs jeux de la Nintendo DS dès maintenant !</p>
        <p>Scannez ou téléchargez l'application homebrew</p>
        <div class="hero-buttons">
            <span class="icon-text">
                <button class="btn" id="btn-show-qr">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M120-520v-320h320v320H120Zm80-80h160v-160H200v160Zm-80 480v-320h320v320H120Zm80-80h160v-160H200v160Zm320-320v-320h320v320H520Zm80-80h160v-160H600v160Zm160 480v-80h80v80h-80ZM520-360v-80h80v80h-80Zm80 80v-80h80v80h-80Zm-80 80v-80h80v80h-80Zm80 80v-80h80v80h-80Zm80-80v-80h80v80h-80Zm0-160v-80h80v80h-80Zm80 80v-80h80v80h-80Z" />
                    </svg>
                    QR Code
                </button>
            </span>

            <span class="icon-text">
                <a class="btn download-btn" href="https://github.com/tonrepo/jeu.nds" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
                    </svg>
                    Télécharger
                </a>
            </span>
        </div>
    </div>
</section>

<!-- 2nd block -->
<section class="latest-games">
    <h2>Derniers jeux ajoutés</h2>
    <?php if (!empty($game_list_updated)): ?>
        <ul class="latest-game-list-alt">
            <?php foreach ($game_list_updated as $game):
                if (!($game instanceof Game)) continue;
            ?>
                <li class="game-entry">
                    <img src="<?php $game->icon(); ?>" alt="<?= $game('title'); ?>" class="game-thumb-sm">
                    <div class="game-info">
                        <a href="<?= build_game_url($game->file_name); ?>" class="game-title"><?= $game('title'); ?></a>
                        <div class="game-meta">
                            <span class="game-version"><?= $game('version'); ?></span>
                            <span class="game-author"><?= $game('author'); ?></span>
                            <span class="game-date"><?= format_game_date($game->update); ?></span>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>


<!-- 3rd block -->
<section class="faq-section">
    <h2>Questions fréquentes</h2>
    <div class="faq">
        <details>
            <summary>Comment installer un jeu sur ma 3DS ?</summary>
            <p>Utilisez FBI ou Universal-Updater avec le QR code fourni.</p>
        </details>
        <details>
            <summary>Les jeux sont-ils compatibles avec toutes les consoles ?</summary>
            <p>La majorité des jeux sont compatibles 3DS. Vérifiez les détails système dans chaque fiche.</p>
        </details>
        <details>
            <summary>Comment signaler un bug ou une erreur ?</summary>
            <p>Vous pouvez ouvrir une issue sur notre GitHub ou nous contacter via Discord.</p>
        </details>
    </div>
</section>

<!-- Modal du QR code -->
<div id="qr-modal" class="modal hidden">
    <div class="modal-content">
        <button class="close-btn" id="close-qr-modal">Fermer</button>
        <p>Scannez ce QR code avec votre 3DS depuis FBI :</p>
        <img src="assets/website/qrcode-nds-shop.unistore.png" alt="QR Code" class="qr-code-img">
    </div>
</div>

<?php import_footer(); ?>