<?php


class HomePageViewIndex
{
    public static function render($params = [])
    {
        ob_start();

//        if(isset($_SESSION['Username']) and isset($_SESSION['Role'])){
//            echo "Zalogowano jako ".$_SESSION['Username'];
//        }
//        else{
//            echo "Użytkownik niezalogowany";
//        }

        ?>
        <?= Layout::header() ?>
        <?= Layout::navbar() ?>
        <?= Layout::bodyPage()?>
        <?= Layout::tiles()?>

        <?php
        $html = ob_get_clean();
        return $html;
    }
}