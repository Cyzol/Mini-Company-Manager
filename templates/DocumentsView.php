<?php


class DocumentsView
{
    public static function render()
    {
        ob_start();

        ?>
        <?= Layout::header() ?>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Document number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Recipient</th>
                    <th scope="col">Document notes</th>
                    <th scope="col">File</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}