<?php
class InvoiceClass{
    private $id;
    private $invoiceNumber;
    private $contactorData;
    private $netAmount;
    private $vatTax;
    private $grossAmount;
    private $saleDate;
    private $amountInCurrency;
    private $currency;
    private $url;

    public function __construct($id,$invoiceNumber,$contactorData,$netAmount,$vatTax,$grossAmount, $saleDate,$amountInCurrency,$currency,$url){
        $this->id = $id;
        $this->invoiceNumber = $invoiceNumber;
        $this->contactorData = $contactorData;
        $this->netAmount = $netAmount;
        $this->vatTax = $vatTax;
        $this->grossAmount = $grossAmount;
        $this->saleDate = $saleDate;
        $this->amountInCurrency = $amountInCurrency;
        $this->currency = $currency;
        $this->url = $url;
    }

    public function getAllParams(){
        return array($this->id,$this->invoiceNumber,$this->contactorData,$this->netAmount,$this->vatTax,$this->grossAmount, $this->saleDate, $this->amountInCurrency,$this->currency,$this->url);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getContactorData()
    {
        return $this->contactorData;
    }

    /**
     * @return mixed
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * @return mixed
     */
    public function getVatTax()
    {
        return $this->vatTax;
    }

    /**
     * @return mixed
     */
    public function getGrossAmount()
    {
        return $this->grossAmount;
    }

    /**
     * @return mixed
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * @return mixed
     */
    public function getAmountInCurrency()
    {
        return $this->amountInCurrency;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}
