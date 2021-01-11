<?php


class PurchaseInvoiceViewAdd
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <section class ="box-section">
            <form class="box-form" method="post" action="uploadingFile/uploadPurchaseInvoice.php" enctype="multipart/form-data">
                <div class="title">
                    <h1 class="title title-large">Purchase Invoice</h1>
                </div>
                <input id="puchase-number" type="text" name="purchaseid" placeholder="Purchase number" required="required" pattern='[/\A-Z0-9]*'>
                <input id="id-invoice-purchase" type="text" name="idinvoice" placeholder="Invoice number" required="required" pattern='[/\A-Z0-9]*'>
                <input id="contractor-data-purchase" type="text" name="contractordata" placeholder="Contractor data" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="net-amount-purchase" type="number" step="0.01" name="netamount" placeholder="Net amount" required="required" pattern="[0-9]{1,10}">
                <input id="gross-amount-purchase" type="number" step="0.01" name="grossamont" placeholder="Gross amount" required="required" pattern="[0-9]{1,10}">
                <input id="vat-tax-purchase" type="number" step="0.01" name="vattax" placeholder="Vat tax" required="required" pattern="[0-9]{1,10}">
                <input id="date-invoice-purchase" type="date" name="dateinvoice" placeholder="Date" required="required">
                <div>
                    <input id="amount-in-currency" type="number" step="0.01" name="amountincurrency" placeholder="Amount in currency" required="required" pattern="[0-9]{1,10}">
                    <select name="currency" id="currency">
                        <option value="zloty">ZŁ</option>
                        <option value="usd">$</option>
                        <option value="pounds">£</option>
                        <option value="euro">€</option>
                    </select>
                </div>
                <input type="file" id="fileToUpload" name="fileToUpload" value="Add Invoice" accept="application/pdf" required="required">
                <input type="submit" name="submit" value="Add invoice">
                <a href="index.php?action=home-page">Back</a>
            </form>
        </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}