<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './EquipmentClass.php';
require_once __DIR__ . './AbstractRepository.php';

class EquipmentRepository extends AbstractRepository
{
    public $equipmentList = array();

    public function getEquipments(){
        try{
            $this->equipmentList = array();
            $statement =  'FROM sprzet';
            $stmt = $this->connection->prepare('SELECT *'.$statement);
            $result = $stmt->execute();
            $allEquipments = $stmt->fetchAll();
            $size = $this->countEquipments();
            for ($i =0;$i<$size;$i++){
                $singleEquipment = new EquipmentClass();
                $singleEquipment->setId($allEquipments[$i]["ID"]);
                $singleEquipment->setIdequipment($allEquipments[$i]["NumerInwentarzowy"]);
                $singleEquipment->setEquipmentname($allEquipments[$i]["Nazwa"]);
                $singleEquipment->setSerialnumber($allEquipments[$i]["NumerSeryjny"]);
                $singleEquipment->setEquipmentdate($allEquipments[$i]["DataZakupu"]);
                $singleEquipment->setIdinvoiceequipment($allEquipments[$i]["NumerFaktury"]);
                $singleEquipment->setWarrantydate($allEquipments[$i]["GwarancjaDo"]);
                $singleEquipment->setNetamountequipment($allEquipments[$i]["WartoscNetto"]);
                $singleEquipment->setEquipmentowner($allEquipments[$i]["NaCzyimStanie"]);

                $singleEquipment->setEquipmentnotes($allEquipments[$i]["Notatki"]);

                $this->equipmentList[]=$singleEquipment;
            }
            return $this->equipmentList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countEquipments($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        $statement = 'FROM sprzet';
        $stmt = $this->connection->prepare('SELECT COUNT(*)'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }



}