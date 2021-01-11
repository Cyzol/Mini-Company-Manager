<?php
class PurchaseInvoiceClass{
    private $id;
    private $purchaseId;
    private $idInvoice;
    private $contractorData;
    private $netAmount;
    private $grossAmount;
    private $vatTax;
    private $dateInvoice;
    private $amountInCurrency;
    private $currency;
    private $fileToUpload;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPurchaseId()
    {
        return $this->purchaseId;
    }

    /**
     * @param mixed $purchaseId
     */
    public function setPurchaseId($purchaseId)
    {
        $this->purchaseId = $purchaseId;
    }

    /**
     * @return mixed
     */
    public function getIdInvoice()
    {
        return $this->idInvoice;
    }

    /**
     * @param mixed $idInvoice
     */
    public function setIdInvoice($idInvoice)
    {
        $this->idInvoice = $idInvoice;
    }

    /**
     * @return mixed
     */
    public function getContractorData()
    {
        return $this->contractorData;
    }

    /**
     * @param mixed $contractorData
     */
    public function setContractorData($contractorData)
    {
        $this->contractorData = $contractorData;
    }

    /**
     * @return mixed
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * @param mixed $netAmount
     */
    public function setNetAmount($netAmount)
    {
        $this->netAmount = $netAmount;
    }

    /**
     * @return mixed
     */
    public function getGrossAmount()
    {
        return $this->grossAmount;
    }

    /**
     * @param mixed $grossAmount
     */
    public function setGrossAmount($grossAmount)
    {
        $this->grossAmount = $grossAmount;
    }

    /**
     * @return mixed
     */
    public function getVatTax()
    {
        return $this->vatTax;
    }

    /**
     * @param mixed $vatTax
     */
    public function setVatTax($vatTax)
    {
        $this->vatTax = $vatTax;
    }

    /**
     * @return mixed
     */
    public function getDateInvoice()
    {
        return $this->dateInvoice;
    }

    /**
     * @param mixed $dateInvoice
     */
    public function setDateInvoice($dateInvoice)
    {
        $this->dateInvoice = $dateInvoice;
    }

    /**
     * @return mixed
     */
    public function getAmountInCurrency()
    {
        return $this->amountInCurrency;
    }

    /**
     * @param mixed $amountInCurrency
     */
    public function setAmountInCurrency($amountInCurrency)
    {
        $this->amountInCurrency = $amountInCurrency;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getFileToUpload()
    {
        return $this->fileToUpload;
    }

    /**
     * @param mixed $fileToUpload
     */
    public function setFileToUpload($fileToUpload)
    {
        $this->fileToUpload = $fileToUpload;
    }
}
