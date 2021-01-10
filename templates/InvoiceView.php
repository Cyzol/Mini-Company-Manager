<?php


class InvoiceView
{
    public static function render($invoiceRepository)
    {
        ob_start();

        ?>
        <?= Layout::header() ?>
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
                <?php
                for ($i = 0; $i <sizeof($invoiceRepository->getInvoices()); $i++) {

                ?>

                <tr>
                    <th scope="row"><?php print_r($invoiceRepository->getInvoices()[$i]->getId())?></th>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getInvoiceNumber())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getContactorData())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getNetAmount())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getVatTax())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getGrossAmount())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getSaleDate())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getAmountInCurrency())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getCurrency())?></td>
                    <td><?php print_r($invoiceRepository->getInvoices()[$i]->getUrl())?></td>
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