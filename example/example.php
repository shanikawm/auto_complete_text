<?php
/**
 * User: Shanika
 * Date: 6/23/2015
 * Time: 3:17 PM
 */
include_once dirname(__DIR__) . '/src/Dyms/dyms.php';
$ac = new Dyms\dyms([
    'Light Pink',
    'Pale Violet Red',
    'Light Salmon',
    'Fire Brick',
    'Medium Spring Green',
    'Dark Olive Green',
    'Medium Slate Blue',
    'Pale Turquoise',
    'Light Steel Blue',
    'Light Slate Gray',
    'Dark Goldenrod',
    'Corn flower Blue',
    'Antique White',
    'Navajo White',
    'Blanched Almond',
    'Burly Wood',
    'Powder Blue',
    'Dark Olive Green'
]);
echo "---Blue---\n"; //Search for existing word
print_r($ac->search('blue'));
echo "---Water---\n"; //Search for non existing word
print_r($ac->search('Water'));
echo "--hwite---\n"; //Search for spelling mistake word
print_r($ac->search('hwite'));