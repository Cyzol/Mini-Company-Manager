<?php


class LicenseViewAdd
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <section class ="box-section">
            <form class="box-form" method="post" action="uploadingFile/uploadLicense.php" enctype="multipart/form-data">
                <div class="title">
                    <h1 class="title title-large">License</h1>
                </div>
                <input id="id-license" type="text" name="idlicense" placeholder="Inventory number" required="required" pattern='[/\A-Z0-9]*'>

                <input id="license-name" type="text" name="licensename" placeholder="License name" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="serial-number-license" type="text" name="serialnumberlicense" placeholder="Serial number" required="required" pattern="[-\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="license-purchase-date" type="date" name="licensepurchasedate" placeholder="Date" required="required">
                <input id="id-invoice-license" type="text" name="idinvoicelicense" placeholder="Invoice number" required="required" pattern='[/\A-Z0-9]*'>
                <input id="support-date" type="date" name="supportdate" placeholder="Support date" required="required">
                <input id="valid-to-date" type="date" name="validtodate" placeholder="Valid to date" required="required">
                <input id="license-owner" type="text" name="licenseowner" placeholder="License owner" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="license-notes" type="text" name="licensenotes" placeholder="License notes" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">


                <input type="submit" name="submit" value="Add invoice">
                <a href="index.php?action=home-page">Back</a>
            </form>
        </section>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}