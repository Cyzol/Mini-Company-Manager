<?php
require_once __DIR__ . '/../autoload.php';

class RegisterController
{
    public static function index()
    {
        echo RegisterViewIndex::render();
        return;
    }
}