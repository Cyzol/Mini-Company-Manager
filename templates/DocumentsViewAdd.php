<?php


class DocumentsViewAdd
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <section class ="box-section">
            <form class="box-form" method="post" action="" enctype="multipart/form-data">
                <div class="title">
                    <h1 class="title title-large">Documents</h1>
                </div>
                <input id="id-document" type="text" name="iddocument" placeholder="Document number" required="required" pattern='[/\A-Z0-9]*'>

                <input id="date-invoice" type="date" name="dateinvoice" placeholder="Date" required="required">
                <input id="document-sender" type="text" name="sender" placeholder="Sender" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="document-recipient" type="text" name="recipient" placeholder="Recipient" required="required" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">
                <input id="document-notes" type="text" name="notes" placeholder="Document notes" pattern="[\s.a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ0-9]+">


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