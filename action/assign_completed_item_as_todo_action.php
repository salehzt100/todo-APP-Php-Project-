<?php

session_start();
include "../helpers/GeneratorHelper.php";
include "../helpers/RedirectHelper.php";
include "../constant/itemType.php";


$id=$_POST["item_id"];
$item=$_SESSION["items"]["completed"][$id];
unset($_SESSION["items"]["completed"][$id]);


$_SESSION["items"]["todo"][$id]=[
    "title"=>$item["title"],
    "description"=>$item["description"],
    "created_at"=>$item["created_at"]
];
$_SESSION['message'] = "the '" .$item['title'] . "' isn't completed any more.";


RedirectHelper::redirectToPreviousPage();