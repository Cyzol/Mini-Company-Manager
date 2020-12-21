<?php


class InvoiceViewAdd
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <section class ="box-section">
            <form class="box-form" method="post" action="upload.php" enctype="multipart/form-data">
                <div class="title">
                    <h1 class="title title-large">Sales Invoice</h1>
                </div>
                <input id="id-invoice" type="text" name="idinvoice" placeholder="Invoice number">
                <input id="contractor-data" type="text" name="contractordata" placeholder="Contractor data">
                <input id="net-amount" type="number" name="netamount" placeholder="Net amount">
                <input id="gross-amount" type="number" name="grossamont" placeholder="Gross amount">
                <input id="vat-tax" type="number" name="vattax" placeholder="Vat tax">
                 <div>
                     <input id="amount-in-currency" type="number" name="amountincurrency" placeholder="Amount in currency">
                     <select name="currency" id="currency">
                         <option value="zloty">ZŁ</option>
                         <option value="usd">$</option>
                         <option value="pounds">£</option>
                         <option value="euro">€</option>
                     </select>
                 </div>
                <input type="file" id="fileToUpload" name="fileToUpload" value="Add Invoice" accept="application/pdf">
                <input type="submit" name="submit" value="Add invoice">
                <a href="index.php?action=home-page">Back</a>
            </form>
        </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}