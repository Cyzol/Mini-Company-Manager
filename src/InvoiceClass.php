<?php
class InvoiceClass{
    private $id;
    private $invoiceNumber;
    private $contractorData;
    private $netAmount;
    private $vatTax;
    private $grossAmount;
    private $saleDate;
    private $amountInCurrency;
    private $currency;
    private $url;

    public function serialize(){
        return [
            'id' => $this->getId(),
            'invoiceNumber' => $this->getInvoiceNumber(),
            'contractorData' => $this->getContactorData(),
            'netAmount' => $this->getNetAmount(),
            'vatTax' => $this->getVatTax(),
            'grossAmount' => $this->getGrossAmount(),
            'saleDate' => $this->getSaleDate(),
            'amountInCurrency' => $this->getAmountInCurrency(),
            'currency' => $this->getCurrency(),
            'url' => $this->getUrl(),
        ];
    }

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
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param mixed $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getContactorData()
    {
        return $this->contractorData;
    }

    /**
     * @param mixed $contractorData
     */
    public function setContactorData($contractorData)
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
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * @param mixed $saleDate
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
