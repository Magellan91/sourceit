<?php
$dir = scandir(__DIR__);
foreach ($dir as $value) {
    if (preg_match('/.(txt)$/', $value)) {
        echo __DIR__ . '\\' . $value;
    }
}