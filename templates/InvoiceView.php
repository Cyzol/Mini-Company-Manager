<?php


class InvoiceView
{
    public static function render($repositoryObject,$invoiceRepository)
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <?= Layout::backToHomePage() ?>
        <div class="header-table">
            <h1>Sales Invoice</h1>
        </div>
        <?= Layout::searchbarInvoice('index.php?action=invoice-search')?>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Invoice Number</th>
                    <th scope="col">Contractor data</th>
                    <th scope="col">Net amount</th>
                    <th scope="col">Vat tax</th>
                    <th scope="col">Gross amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Currency</th>
                    <th scope="col">File</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"></th>
                    <th>Summary</th>
                    <th></th>
                    <th><?php print_r($invoiceRepository[0]->getNetAmount())?></th>
                    <th><?php print_r($invoiceRepository[0]->getVatTax())?></th>
                    <th><?php print_r($invoiceRepository[0]->getGrossAmount())?></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <?php
                for ($i = 1; $i < sizeof($invoiceRepository); $i++) {

                ?>

                <tr>
                    <th scope="row"><?php print_r($invoiceRepository[$i]->getId())?></th>
                    <td><?php print_r($invoiceRepository[$i]->getInvoiceNumber())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getContactorData())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getNetAmount())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getVatTax())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getGrossAmount())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getSaleDate())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getAmountInCurrency())?></td>
                    <td><?php print_r($invoiceRepository[$i]->getCurrency())?></td>
                    <td><a href="Mini-Company-Manager/<?php print_r($invoiceRepository[$i]->getUrl())?>"><i class="far fa-file-pdf"></i></a></td>
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