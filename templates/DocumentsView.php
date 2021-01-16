<?php


class DocumentsView
{
    public static function render($repositoryObject,$documentsRepository)
    {
        ob_start();

        ?>
        <?= Layout::header() ?>
        <?= Layout::backToHomePage() ?>
        <div class="header-table">
            <h1>Documents</h1>
        </div>
        <?= Layout::searchbarDocuments()?>
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
                    <?php
                    for ($i = 0; $i <$repositoryObject->countDocuments(); $i++) {
                    ?>
                        <tr>
                            <th scope="row"><?php print_r($documentsRepository[$i]->getId())?></th>
                            <td><?php print_r($documentsRepository[$i]->getIddocument())?></td>
                            <td><?php print_r($documentsRepository[$i]->getDateinvoice())?></td>
                            <td><?php print_r($documentsRepository[$i]->getSender())?></td>
                            <td><?php print_r($documentsRepository[$i]->getRecipient())?></td>
                            <td><?php print_r($documentsRepository[$i]->getNotes())?></td>
                            <td><?php print_r($documentsRepository[$i]->getUrl())?></td>
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