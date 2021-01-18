<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './PurchaseInvoiceClass.php';
require_once __DIR__ . './AbstractRepository.php';

class PurchaseInvoiceRepository extends AbstractRepository
{
    public $purchaseInvoicesList = array();

    public function getPurchaseInvoices($netAmount=null, $invoiceNumber=null, $contractorData=null,$grossAmount=null){

        $statement = '';
        $where = ' WHERE ';
        $and = ' AND ';
        $flag = 0;
        $apo = "'";

        if($netAmount != null){
            $statement = $where.'KwotaNetto = '.$netAmount;
            $flag = 1;
        }
        if($invoiceNumber != null){
            if($flag == 0){
                $statement = $where.'NumerFaktury = '.$invoiceNumber;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'NumerFaktury = '.$invoiceNumber;
            }
        }
        if($contractorData != null){
            if($flag == 0){
                $statement = $where.'DaneKontrahenta = '.$apo.$contractorData.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'DaneKontrahenta = '.$apo.$contractorData.$apo;
            }
        }
        if($grossAmount != null){
            if($flag == 0){
                $statement = $where.'KwotaBrutto = '.$grossAmount;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'KwotaBrutto = '.$grossAmount;
            }
        }

        try{
            $this->purchaseInvoicesList = array();
            $stmt = $this->connection->prepare('SELECT * FROM fakturyzakupu'.$statement);
            $result = $stmt->execute();
            $allPurchaseInvoices = $stmt->fetchAll();
            $size = $this->countPurchaseInvoices($statement);
            for ($i =0;$i<$size;$i++){
                $singleInvoice = new PurchaseInvoiceClass();
                $singleInvoice->setId($allPurchaseInvoices[$i]["ID"]);
                $singleInvoice->setPurchaseId($allPurchaseInvoices[$i]["IdentyfikatorFaktury"]);
                $singleInvoice->setIdInvoice($allPurchaseInvoices[$i]["NumerFaktury"]);
                $singleInvoice->setContractorData($allPurchaseInvoices[$i]["DaneKontrahenta"]);
                $singleInvoice->setNetAmount($allPurchaseInvoices[$i]["KwotaNetto"]);
                $singleInvoice->setGrossAmount($allPurchaseInvoices[$i]["KwotaBrutto"]);
                $singleInvoice->setVatTax($allPurchaseInvoices[$i]["KwotaPodatkuVAT"]);
                $singleInvoice->setDateInvoice($allPurchaseInvoices[$i]["DataZakupu"]);
                $singleInvoice->setAmountInCurrency($allPurchaseInvoices[$i]["KwotaNettoWWalucie"]);
                $singleInvoice->setCurrency($allPurchaseInvoices[$i]["Waluta"]);
                $singleInvoice->setFileToUpload($allPurchaseInvoices[$i]["URL"]);
                $this->purchaseInvoicesList[]=$singleInvoice;
            }
            return $this->purchaseInvoicesList;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function countPurchaseInvoices($statement=null){
        $stmt = $this->connection->prepare('SELECT COUNT(*) FROM fakturyzakupu'.$statement);
        $result = $stmt->execute();
        $count = $stmt->fetchAll();
        return $count[0]['COUNT(*)'];
    }
}