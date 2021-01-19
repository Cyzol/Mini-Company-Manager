<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './../database/config.php';
require_once __DIR__ . './PurchaseInvoiceClass.php';
require_once __DIR__ . './AbstractRepository.php';

class PurchaseInvoiceRepository extends AbstractRepository
{
    public $purchaseInvoicesList = array();

    public function getPurchaseInvoices($netAmount=null, $invoiceNumber=null, $contractorData=null,$grossAmount=null, $dateFrom = null, $dateTo =null){

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

        if($dateFrom != null AND $dateTo != null){
            if($flag == 0){
                $statement = $where.'DataZakupu BETWEEN '.$apo.$dateFrom.$apo.$and.$apo.$dateTo.$apo;
                $flag = 1;
            }
            else{
                $statement = $statement.$and.'DataZakupu BETWEEN '.$apo.$dateFrom.$apo.$and.$apo.$dateTo.$apo;
            }
        }else{
            if($dateFrom != null){
                if($flag == 0){
                    $statement = $where.'DataZakupu >= '.$apo.$dateFrom.$apo;
                    $flag = 1;
                }
                else{
                    $statement = $statement.$and.'DataZakupu >= '.$apo.$dateFrom.$apo;
                }
            }
            if($dateTo != null){
                if($flag == 0){
                    $statement = $where.'DataZakupu <= '.$apo.$dateTo.$apo;
                    $flag = 1;
                }
                else{
                    $statement = $statement.$and.'DataZakupu >= '.$apo.$dateTo.$apo;
                }
            }
        }

        try{
            $this->purchaseInvoicesList = array();
            $stmt = $this->connection->prepare('SELECT * FROM fakturyzakupu'.$statement);
            $result = $stmt->execute();
            $stmt2 = $this->connection->prepare('SELECT SUM(KwotaNetto) as KwotaNettoSum,SUM(KwotaPodatkuVAT) as KwotaPodatkuVATSum ,SUM(KwotaBrutto) as KwotaBruttoSum FROM fakturyzakupu'.$statement);
            $result2 = $stmt2->execute();
            $allPurchaseInvoices = $stmt->fetchAll();
            $summed = $stmt2->fetchAll();
            $sum = new PurchaseInvoiceClass();

            $sum->setNetAmount($summed[0]["KwotaNettoSum"]);
            $sum->setVatTax($summed[0]["KwotaPodatkuVATSum"]);
            $sum->setGrossAmount($summed[0]["KwotaBruttoSum"]);

            $size = $this->countPurchaseInvoices($statement);
            $this->purchaseInvoicesList[]=$sum;

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