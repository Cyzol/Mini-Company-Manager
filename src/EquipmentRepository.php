<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './EquipmentClass.php';
require_once __DIR__ . './AbstractRepository.php';

class EquipmentRepository extends AbstractRepository
{
    public $equipmentList = array();

    public function getEquipments($serialNumber = null, $inventoryNumber = null){

        $statement = '';
        $where = ' WHERE ';
        $and = ' AND ';
        $flag = 0;
        $apo = "'";

        if($serialNumber != null){
            $statement = $where.'NumerSeryjny = '.$apo.$serialNumber.$apo;
            $flag = 1;
        }
        if($inventoryNumber != null){
            if($flag == 0){
                $statement = $where.'NumerInwentarzowy = '.$inventoryNumber;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'NumerInwentarzowy = '.$inventoryNumber;
            }
        }

        try{
            $this->equipmentList = array();
            $stmt = $this->connection->prepare('SELECT * FROM sprzet'.$statement);
            $result = $stmt->execute();
            $allEquipments = $stmt->fetchAll();
            $size = $this->countEquipments($statement);
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

    public function countEquipments($statement){
        $stmt = $this->connection->prepare('SELECT COUNT(*) FROM sprzet'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }



}