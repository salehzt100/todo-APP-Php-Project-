<?php

class RedirectHelper
{

    public static function redirectToPreviousPage()
    {
        header("Location:" . $_SERVER['HTTP_REFERER']);


    }
}
