<?php

require_once __DIR__ . './../database/config.php';

class PurchaseInvoice{

    private $connection = null;

    public function __construct(){
        global $config;
        $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function insert($params){
        try{
            $stmt = $this->connection->prepare('INSERT INTO `fakturyzakupu` (`ID`, `IdentyfikatorFaktury`, `NumerFaktury`, `DaneKontrahenta`, `KwotaNetto`, `KwotaBrutto`,
`KwotaPodatkuVAT`, `DataZakupu`, `KwotaNettoWWalucie`, `Waluta`, `URL`) VALUES (NULL, :purchaseid, :idinvoice, :contractordata, :netamount, :grossamount, :vattax,
:date, :amountincurrency, :currency, :fileToUpload);');
            $lastInsertId = $this->connection->lastInsertId();
            $result = $stmt->execute($params);
            return $lastInsertId;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }


}

