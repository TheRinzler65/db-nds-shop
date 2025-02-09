<?php

require_once 'site-load.php';

header('Content-Type: text/xml; charset=UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">' . "\n";
echo '  <channel>' . "\n";

$game_list_updated = get_games(1, [
    'orderby' => 'updated'
]);

if (!empty($game_list_updated)) {
    foreach ($game_list_updated as $game) {
        if (!($game instanceof Game)) continue;

        $title = !empty($game->meta['title']) ? htmlspecialchars($game->meta['title']) : 'No title available';
        $link = !empty($game->file_name) ? htmlspecialchars(build_game_url($game->file_name)) : '#';
        $author = !empty($game->meta['author']) ? htmlspecialchars($game->meta['author']) : 'Unknown author';
        $version = !empty($game->meta['version']) ? htmlspecialchars($game->meta['version']) : 'Unknown version';
        $updated = !empty($game->meta['updated']) ? strtotime($game->meta['updated']) : time();
        $pubDate = date('r', $updated);

        // Utilisation de l'URL pour l'icône
        $icon = !empty($game->meta['icon']) ? htmlspecialchars($game->meta['icon']) : '';
        
        // Utilisation de l'URL pour le QR Code
        $qr = !empty($game->meta['qr']) ? htmlspecialchars(current($game->meta['qr'])) : '';

        // Télécharger les liens
        $downloads = '';
        if (!empty($game->meta['downloads'])) {
            foreach ($game->meta['downloads'] as $file_name => $download) {
                $downloads .= htmlspecialchars($download['url'], ENT_QUOTES, 'UTF-8') . "\n";
            }
        }

        // Construction des éléments du RSS
        echo '    <item>' . "\n";
        echo '      <title>' . $title . '</title>' . "\n";
        echo '      <link>' . $link . '</link>' . "\n";
        echo '      <icon>' . $icon . '</icon>' . "\n";  // L'URL de l'icône
        echo '      <qr>' . $qr . '</qr>' . "\n";  // L'URL du QR Code
        echo '      <downloads>' . $downloads . '</downloads>' . "\n";  // URLs de téléchargement
        echo '      <author>' . $author . '</author>' . "\n";
        echo '      <game_version>' . $version . '</game_version>' . "\n";
        echo '      <pubDate>' . $pubDate . '</pubDate>' . "\n";
        echo '      <category>' . implode(', ', $game->meta['categories']) . '</category>' . "\n";
        echo '    </item>' . "\n";
    }
} else {
    echo '    <item>' . "\n";
    echo '      <title>No games available</title>' . "\n";
    echo '      <link>' . htmlspecialchars('URL du site') . '</link>' . "\n";
    echo '      <description>No games are available at the moment.</description>' . "\n";
    echo '      <author>No author</author>' . "\n";
    echo '      <pubDate>' . date('r') . '</pubDate>' . "\n";
    echo '    </item>' . "\n";
}

echo '  </channel>' . "\n";
echo '</rss>' . "\n";

?>
