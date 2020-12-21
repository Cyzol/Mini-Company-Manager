<?php
require_once __DIR__ . '/../autoload.php';

class HomePageController
{
    public static function index()
    {
        echo HomePageViewIndex::render();
        return;
    }
}