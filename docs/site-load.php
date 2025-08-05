<?php

if( !defined( 'SITE_LOADED' ) ) define( 'SITE_LOADED', true );

require_once 'config.php';
require_once 'vendor/autoload.php';
require_once 'includes/errors.php';
require_once 'includes/misc.php';
require_once 'includes/templates.php';
require_once 'includes/i18n.php';
require_once 'includes/url.php';
require_once 'includes/class-game.php';
require_once 'includes/game.php';

// Define lang.
$website_lang = isset( $_COOKIE['lang'] ) ? strip_tags( $_COOKIE['lang'] ) : 'fr';

if( !in_array( $website_lang, $allowed_languages ) ) $website_lang = 'fr'; // Default value.

define( 'SITE_CURRENT_USER_LANGUAGE', $website_lang );
load_translation( SITE_CURRENT_USER_LANGUAGE );

// Build page.
global $page, $pages;
if( !$page || $page == [] || $page == "" ){ // If page not defined previously.

    $page = &$pages[ basename( $_SERVER['PHP_SELF'] ) ] ?? false;
    if( !$page ) site_error( 'Page doesn\'t exist.', 404 );

}

function get_current_locale()
{
    return ($_SESSION['lang'] ?? 'fr') === 'fr' ? 'fr_FR' : 'en_US';
}

function format_game_date($datetime)
{
    $separator = t('date_separator', true);
    $formatter = new IntlDateFormatter(
        get_current_locale(),
        IntlDateFormatter::LONG,
        IntlDateFormatter::SHORT
    );

    if (is_numeric($datetime)) {
        $datetimeObj = new DateTime();
        $datetimeObj->setTimestamp((int)$datetime);
    } else {
        $datetimeObj = new DateTime($datetime);
    }

    $formatted = $formatter->format($datetimeObj);

    return str_replace(' à ', " $separator ", $formatted);
}
