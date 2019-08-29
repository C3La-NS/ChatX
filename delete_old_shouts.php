<?php
include 'settings.php';
require 'vendor/autoload.php';

// If you want to delete old comments, make this true. We use it to clean up the demo.
$deleteOldComments = true;

// Setting up the data store

$dir = __DIR__.'/data';

$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));

$repo = new \JamesMoss\Flywheel\Repository('shouts', $config);


if($deleteOldComments) {
    
    $oldShouts = $repo->query()
                ->where('createdAt', '<', strtotime('-1 minute'))
                ->orderBy('createdAt DESC')
                ->limit(999, $maxHistoryShouts)
                ->execute();

    foreach($oldShouts as $old) {
        $repo->delete($old);
    }
    
}