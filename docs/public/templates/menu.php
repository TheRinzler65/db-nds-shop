<?php

defined('SITE_LOADED') or die("You don't have access to this file.");

?>

<header>
    <nav class="navbar">

        <!-- Bloc gauche : Logo + NDS-SHOP -->
        <div class="navbar-left">
            <a href="<?php echo home_url(); ?>" class="logo-link">
                <img src="/assets/website/nds-shop_logo.png" alt="Logo" class="logo" />
                <span class="site-title">NDS-SHOP</span>
            </a>
        </div>

        <!-- Centre : Liens -->
        <div class="nav-links">
            <a href="<?php echo home_url(); ?>" class="nav-link"><?php t('home'); ?></a>
            <a href="<?php echo build_url('game-list.php'); ?>" class="nav-link"><?php t('game-list'); ?></a>
            <a href="<?php echo build_url('about.php'); ?>" class="nav-link"><?php t('about'); ?></a>
        </div>

        <!-- Droite : langue + thème -->
        <div class="navbar-right">
            <div class="language" id="lang-container">
                <button type="button" id="lang-toggle" class="lang-icon-btn" aria-label="Toggle language menu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-7-.5-14.5T799-507q-5 29-27 48t-52 19h-80q-33 0-56.5-23.5T560-520v-40H400v-80q0-33 23.5-56.5T480-720h40q0-23 12.5-40.5T563-789q-20-5-40.5-8t-42.5-3q-134 0-227 93t-93 227h200q66 0 113 47t47 113v40H400v110q20 5 39.5 7.5T480-160Z" />
                    </svg>
                </button>
                <ul class="lang-dropdown" id="lang-menu">
                    <li><a href="#" class="lang-link" data-lang="fr"><?php t('fr'); ?></a></li>
                    <li><a href="#" class="lang-link" data-lang="en"><?php t('en'); ?></a></li>
                </ul>
            </div>

            <button id="theme-toggle" class="theme-toggle" aria-label="Toggle dark mode">
                <svg class="theme-icon sun-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                    <path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z" />
                </svg>
                <svg class="theme-icon moon-icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                    <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Z" />
                </svg>
            </button>
        </div>

    </nav>
</header>