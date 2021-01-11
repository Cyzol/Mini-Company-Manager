<?php

require_once __DIR__ . './../database/config.php';

class Invoice
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
            $stmt = $this->connection->prepare('INSERT INTO `fakturysprzedazy` (`ID`, `NumerFaktury`, `DaneKontrahenta`, `KwotaNetto`, `KwotaPodatkuVAT`, `KwotaBrutto`, `DataSprzedazy`, `KwotaNettoWWalucie`, `Waluta`, `URL`) VALUES (NULL, :invoicenumber, :contactordata, :netamount, :vattax, :grossamount, :dateinvoice, :amountincurrency, :currency, :url);');
            $lastInsertId = $this->connection->lastInsertId();
            $result = $stmt->execute($params);
            return $lastInsertId;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}