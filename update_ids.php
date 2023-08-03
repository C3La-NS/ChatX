<?php
$lastShouts = $repoShouts->query()
    ->orderBy('createdAt DESC')
    ->limit($m_s, 0)
    ->execute();

foreach ($lastShouts as $lastShout) {
    $results[] = mb_substr($lastShout->getId(), 0, 4);
}
$IDs = $repoShoutsID->findById('last_items');
$IDs->IDs = $results;
$repoShoutsID->update($IDs);