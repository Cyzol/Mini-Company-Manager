<?php
require_once __DIR__ . '/../autoload.php';

class EquipmentController
{
    public static function add()
    {
        echo EquipmentViewAdd::render();
        return;
    }

}