<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './AbstractRepository.php';

class LicenseRepository extends AbstractRepository
{
    public $licensesList = array();

    public function getLicenses($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        try{
            $this->licensesList = array();
            $statement =  'FROM licencje';
            $stmt = $this->connection->prepare('SELECT *'.$statement);
            $result = $stmt->execute();
            $allLicenses = $stmt->fetchAll();
            $size = $this->countLicenses();
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
                $this->licesesList[]=$singleLicense;
            }
            return $this->licensesList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countLicenses($invoiceNumber=null,$contractorData=null,$amountInCurrency=null){
        $statement = 'FROM licencje';
        $stmt = $this->connection->prepare('SELECT COUNT(*)'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}