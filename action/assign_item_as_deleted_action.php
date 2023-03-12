<?php
session_start();
include "../helpers/GeneratorHelper.php";
include "../helpers/RedirectHelper.php";
include "../constant/itemType.php";



$id=$_POST["item_id"];
$deleted_from=$_POST["delete_from"];

if ($deleted_from=="todo")
{
    $item=$_SESSION["items"]["todo"][$id];
    unset($_SESSION["items"]["todo"]["$id"]);
    $_SESSION["items"]["deleted"][$id]=$item;
}else {
    $item = $_SESSION["items"]["completed"][$id];
    unset($_SESSION["items"]["completed"]["$id"]);
    $_SESSION["items"]["deleted"][$id] = $item;
    $completed_item["completed_at"] = null;
}
$_SESSION["items"]["deleted"][$id]=$item;
    $_SESSION["items"]["deleted"][$id]["deleted_from"]=$deleted_from;
    $_SESSION["items"]["deleted"][$id]["deleted_at"]=GeneratorHelper::generateDate();
$_SESSION['message'] = "the '" . $item['title'] . "' is deleted now.";

    RedirectHelper::redirectToPreviousPage();



