<?php

require_once __DIR__ . '/../autoload.php';

class LicenseController
{
    public static function add()
    {
        echo LicenseViewAdd::render();
        return;
    }

    public static function view()
    {
        echo LicenseView::render();
        return;
    }

}