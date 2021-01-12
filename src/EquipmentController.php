<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './EquipmentRepository.php';

class EquipmentController
{
    public static function add()
    {
        echo EquipmentViewAdd::render();
        return;
    }

    public static function view()
    {
        $equipmentRepository = new EquipmentRepository();
        $repository = $equipmentRepository->getEquipments();
        echo EquipmentView::render($equipmentRepository, $repository);
        return;
    }


}