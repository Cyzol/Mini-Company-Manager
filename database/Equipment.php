<?php

require_once __DIR__ . './../database/config.php';

class Equipment
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
            $stmt = $this->connection->prepare('INSERT INTO `sprzet` (`ID`, `NumerInwentarzowy`, `Nazwa`, `NumerSeryjny`, `DataZakupu`, `NumerFaktury`,
                      `GwarancjaDo`, `WartoscNetto`, `NaCzyimStanie`, `Notatki`)
                VALUES (NULL, :idequipment, :equipmentname, :serialnumber, :equipmentdate, :idinvoiceequipment, :warrantydate, :netamountequipment, :equipmentowner, :equipmentnotes );');
            $lastInsertId = $this->connection->lastInsertId();
            $result = $stmt->execute($params);
            return $lastInsertId;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

}