<?php


class PurchaseInvoiceView
{
    public static function render($repositoryObject,$purchaseInvoiceRepository)
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <?= Layout::backToHomePage() ?>
        <div class="header-table">
            <h1>Purchase Invoice</h1>
        </div>
        <?= Layout::searchbarInvoice('index.php?action=purchase-invoice-search')?>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Purchase number</th>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Contractor data</th>
                    <th scope="col">Net amount</th>
                    <th scope="col">Gross amount</th>
                    <th scope="col">Vat tax</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Currency</th>
                    <th scope="col">File</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < sizeof($purchaseInvoiceRepository); $i++) {

                ?>
                <tr>
                    <th scope="row"><?php print_r($purchaseInvoiceRepository[$i]->getId())?></th>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getPurchaseId())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getIdInvoice())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getContractorData())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getNetAmount())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getGrossAmount())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getVatTax())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getDateInvoice())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getAmountInCurrency())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getCurrency())?></td>
                    <td><?php print_r($purchaseInvoiceRepository[$i]->getFileToUpload())?></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}