<?php

require_once __DIR__ . './../database/config.php';

class Invoice
{
    private $connection = null;

    public function __construct(){
//        phpinfo(); die();
        global $config;
        $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function select($params){
        try{
            $stmt = $this->connection->prepare('SELECT * FROM fakturysprzedazy WHERE ID = :id');
            $result = $stmt->execute($params);
            return $stmt->fetchAll();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function insert($params){
        try{
            $stmt = $this->connection->prepare('INSERT INTO `fakturysprzedazy` (`ID`, `NumerFaktury`, `DaneKontrahenta`, `KwotaNetto`, `KwotaPodatkuVAT`, `KwotaBrutto`, `DataSprzedazy`, `KwotaNettoWWalucie`, `Waluta`, `URL`) VALUES (NULL, :invoicenumber, :contactordata, :netamount, :vattax, :grossamount, :dateinvoice, :amountincurrency, :currency, :url);');
            $result = $stmt->execute($params);
            return 1;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}