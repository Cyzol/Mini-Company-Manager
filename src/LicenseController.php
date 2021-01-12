<?php

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './LicenseRepository.php';

class LicenseController
{
    public static function add()
    {
        echo LicenseViewAdd::render();
        return;
    }

    public static function view()
    {
        $licensesRepository = new LicenseRepository();
        $repository = $licensesRepository->getLicenses();
        echo LicenseView::render($licensesRepository,$repository);
        return;
    }
}