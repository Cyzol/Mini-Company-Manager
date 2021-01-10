<?php


class InvoiceView
{
    public static function render($params = [])
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
                    <th scope="col">Gross amount</th>
                    <th scope="col">Vat tax</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">File</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>1</td>
                    <td>123456</td>
                    <td>12324</td>
                    <td>23</td>
                    <td>43</td>
                    <td>12-12-2020</td>
                    <td>234.67</td>
                    <td>Marek/Files/Udostepnioneplikia</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>1</td>
                    <td>123456</td>
                    <td>12324</td>
                    <td>23</td>
                    <td>43</td>
                    <td>12-12-2020</td>
                    <td>234.67</td>
                    <td>Marek/Files/Udostepnioneplikia</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>1</td>
                    <td>123456</td>
                    <td>12324</td>
                    <td>23</td>
                    <td>43</td>
                    <td>12-12-2020</td>
                    <td>234.67</td>
                    <td>Marek/Files/Udostepnioneplikia</td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}