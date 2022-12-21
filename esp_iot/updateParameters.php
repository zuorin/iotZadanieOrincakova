<?php

$parameters = [
    'hint',
    'name',
    'type',
    'tPlaced',
    'heater',
    'tReady',
    'minFluid',
    'valve',
    'temperature'
];

$parametersJson = [];
foreach ($parameters as $parameter) {
    $parametersJson[$parameter] = isset($_GET[$parameter]) ? $_GET[$parameter] : null;
}

$fp = fopen('parameters.json', 'w');
fwrite($fp, json_encode($parametersJson));
fclose($fp);
