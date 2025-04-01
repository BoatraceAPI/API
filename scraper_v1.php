<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BVP\BoatraceScraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

$date = Carbon::today();
$programs = Scraper::scrapePrograms($date);

$newPrograms = [];
foreach (array_values($programs) as $data) {
    foreach (array_values($data) as $program) {
        $program['boats'] = array_values($program['boats']);
        $newPrograms[] = $program;
    }
}

$name = 'docs/v1/' . $date->format('Ymd') . '.json';
file_put_contents($name, json_encode([
    'programs' => $newPrograms,
], JSON_PRETTY_PRINT));
