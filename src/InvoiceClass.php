<?php
class InvoiceClass{
    private $id;
    private $invoiceNumber;
    private $contactorData;
    private $netAmount;
    private $vatTax;
    private $grossAmount;
    private $amountInCurrency;
    private $currency;
    private $url;

    public function __construct($id,$invoiceNumber,$contactorData,$netAmount,$vatTax,$grossAmount,$amountInCurrency,$currency,$url){
        $this->id = $id;
        $this->invoiceNumber = $invoiceNumber;
        $this->contactorData = $contactorData;
        $this->netAmount = $netAmount;
        $this->vatTax = $vatTax;
        $this->grossAmount = $grossAmount;
        $this->amountInCurrency = $amountInCurrency;
        $this->currency = $currency;
        $this->url = $url;
    }

    public function getAllParams(){
        return array($this->id,$this->invoiceNumber,$this->contactorData,$this->netAmount,$this->vatTax,$this->grossAmount,$this->amountInCurrency,$this->currency,$this->url);
    }
}
