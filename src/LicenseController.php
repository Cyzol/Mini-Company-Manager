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

    public static function search(){
        $serialNumber = $_POST['serialNumber'];
        $inventoryNumber = $_POST['inventoryNumber'];

        $licenseRepository = new LicenseRepository();
        $repository = $licenseRepository->getLicenses($serialNumber, $inventoryNumber);
        echo LicenseView::render($licenseRepository, $repository);

        return;
    }

}