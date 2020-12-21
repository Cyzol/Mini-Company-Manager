<?php


class InvoiceViewAdd
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <?= Layout::navbar() ?>
        <div>
            <div class="header">
                <label class="lheader">Dodaj dokument</label>
            </div>
            <form>
                <input type="file" name="upload" accept="application/pdf" /><br>

                <label for="ldate">Data dokumentu</label>
                <input type="date" id="fdate" name="date" placeholder="YYYY-MM-DD">

                <label for="lname">Strona dokumentu</label>
                <input type="text" id="lname" name="lastname" placeholder="Cos do wpisania">

                <label for="lnotes">Notatki</label>
                <input type="text" id="fnotes" name="text" placeholder="Chcesz coś dodać?">


                <input type="submit" value="Submit">
            </form>
        </div>
        <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}