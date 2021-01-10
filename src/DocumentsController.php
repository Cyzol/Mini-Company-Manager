<?php
require_once __DIR__ . '/../autoload.php';

class DocumentsController
{

    public static function add()
    {
        echo DocumentsViewAdd::render();
        return;
    }
}