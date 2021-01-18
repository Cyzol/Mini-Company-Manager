<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './LicenseClass.php';
require_once __DIR__ . './AbstractRepository.php';

class LicenseRepository extends AbstractRepository
{
    public $licensesList = array();

    public function getLicenses($serialNumber =null, $inventoryNumber=null){

        $statement = '';
        $where = ' WHERE ';
        $and = ' AND ';
        $flag = 0;
        $apo = "'";

        if($serialNumber != null){
            $statement = $where.'KluczSeryjny = '.$apo.$serialNumber.$apo;
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
            $this->licensesList = array();
            $stmt = $this->connection->prepare('SELECT * FROM licencje'.$statement);
            $result = $stmt->execute();
            $allLicenses = $stmt->fetchAll();
            $size = $this->countLicenses($statement);
            for ($i =0;$i<$size;$i++){
                $singleLicense = new LicenseClass();
                $singleLicense->setId($allLicenses[$i]["ID"]);
                $singleLicense->setIdlicense($allLicenses[$i]["NumerInwentarzowy"]);
                $singleLicense->setLicensename($allLicenses[$i]["Nazwa"]);
                $singleLicense->setSerialnumberlicense($allLicenses[$i]["KluczSeryjny"]);
                $singleLicense->setLicensepurchasedate($allLicenses[$i]["DataZakupu"]);
                $singleLicense->setIdinvoicelicense($allLicenses[$i]["NumerFaktury"]);
                $singleLicense->setSupportdate($allLicenses[$i]["WsparcieTechniczneDo"]);
                $singleLicense->setValidtodate($allLicenses[$i]["LicencjaWaznaDo"]);
                $singleLicense->setLicenseowner($allLicenses[$i]["NaCzyimStanie"]);
                $singleLicense->setLicensenotes($allLicenses[$i]["Notatki"]);
                $this->licensesList[]=$singleLicense;
            }
            return $this->licensesList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countLicenses($statement){
        $stmt = $this->connection->prepare('SELECT COUNT(*) FROM licencje'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}