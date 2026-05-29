<?php
require __DIR__ . '/config/db.php';
$pdo->prepare('INSERT INTO theme_settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = ?')
    ->execute(['tinymce_api_key', 'g77lsz8oyguquriifu1cqau3ylhvqnayou1zeyw4z66rvby1', 'g77lsz8oyguquriifu1cqau3ylhvqnayou1zeyw4z66rvby1']);
echo "TinyMCE API key has been set successfully.\n";