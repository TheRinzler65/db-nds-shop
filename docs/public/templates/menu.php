<?php

    defined( 'SITE_LOADED' ) or die( "You don't have access to this file." );

?>

<header>
    <nav class="navbar">
        <div class="nav-links">
            <a href="<?php echo home_url(); ?>" class="nav-link"><?php t( 'home' ); ?></a>
            <a href="<?php echo build_url( 'game-list.php' ); ?>" class="nav-link"><?php t( 'game-list' ); ?></a>
            <a href="<?php echo build_url( 'about.php' ); ?>" class="nav-link"><?php t( 'about' ); ?></a>
        </div>
        <div class="language">
            <button class="lang-btn"><?php t('languages'); ?></button>
            <ul class="lang-dropdown">
                <li><a href="#" class="lang-link" onclick="setLanguage('fr')"><?php t('fr'); ?></a></li>
                <li><a href="#" class="lang-link" onclick="setLanguage('en')"><?php t('en'); ?></a></li>
            </ul>
        </div>
        <button id="theme-switch">
            <label class="switch">
                <span class="switch__icon switch__icon--light">
                </span>
                <input class="switch__input" type="checkbox" role="switch" />
                <span class="switch__icon switch__icon--dark">
                </span>
                <span class="switch__label">Dark Mode</span>
            </label>
        </button>
    </nav>
</header>
