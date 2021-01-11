<?php

require_once __DIR__ . './../database/config.php';

class License
{
    private $connection = null;

    public function __construct(){
        global $config;
        $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function insert($params){
        try{
            $stmt = $this->connection->prepare('INSERT INTO `licencje` (`ID`, `NumerInwentarzowy`, `Nazwa`, `KluczSeryjny`, `DataZakupu`, `NumerFaktury`,
                      `WsparcieTechniczneDo`, `LicencjaWaznaDo`, `NaCzyimStanie`, `Notatki`)
                VALUES (NULL, :idlicense, :licensename, :serialnumberlicense, :licensepurchasedate, :idinvoicelicense, :supportdate, :validtodate, :licenseowner, :licensenotes );');
            $lastInsertId = $this->connection->lastInsertId();
            $result = $stmt->execute($params);
            return $lastInsertId;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

}