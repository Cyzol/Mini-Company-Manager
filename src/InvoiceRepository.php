<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './InvoiceClass.php';
require_once __DIR__ . './AbstractRepository.php';

class InvoiceRepository extends AbstractRepository
{
    public $invoicesList = array();

    public function getInvoices(){
        try{
            $this->invoicesList = array();
            $stmt = $this->connection->prepare('SELECT * FROM fakturysprzedazy');
            $result = $stmt->execute();
            $allInvoices = $stmt->fetchAll();
            for ($i =0;$i<sizeof($allInvoices);$i++){
                $singleInvoice = new InvoiceClass();
                $singleInvoice->setId($allInvoices[$i]["ID"]);
                $singleInvoice->setInvoiceNumber($allInvoices[$i]["NumerFaktury"]);
                $singleInvoice->setContactorData($allInvoices[$i]["DaneKontrahenta"]);
                $singleInvoice->setNetAmount($allInvoices[$i]["KwotaNetto"]);
                $singleInvoice->setVatTax($allInvoices[$i]["KwotaPodatkuVAT"]);
                $singleInvoice->setGrossAmount($allInvoices[$i]["KwotaBrutto"]);
                $singleInvoice->setSaleDate($allInvoices[$i]["DataSprzedazy"]);
                $singleInvoice->setAmountInCurrency($allInvoices[$i]["KwotaNettoWWalucie"]);
                $singleInvoice->setCurrency($allInvoices[$i]["Waluta"]);
                $singleInvoice->setUrl($allInvoices[$i]["URL"]);
                $this->invoicesList[]=$singleInvoice;
            }
            return $this->invoicesList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

//    public function getInvoice($id)
//    {
//        return ['abc'];
//    }
}
