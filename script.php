<?php
$data = [
    "time" => date("Y-m-d H:i:s"),
    "message" => "Hello, GitHub Actions!"
];

file_put_contents("output.json", json_encode($data, JSON_PRETTY_PRINT));
