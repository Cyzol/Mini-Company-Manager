<?php


class HomePageViewIndex
{
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <?= Layout::navbar() ?>
        <?= Layout::bodyPage()?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}