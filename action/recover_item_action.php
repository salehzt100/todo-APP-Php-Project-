<?php
session_start();
include "../helpers/GeneratorHelper.php";
include "../helpers/RedirectHelper.php";
include "../constant/itemType.php";


$id=$_POST["item_id"];
$recover_to=$_POST["recover_to"];
$item=$_SESSION["items"]["deleted"][$id];
unset($_SESSION["items"]["deleted"][$id]);

if ($recover_to=="completed"){

    $_SESSION["items"]["completed"][$id]=[

        'title' => $item['title'],
        'description' => $item['description'],
        "completed_at" => $item["completed_at"],
        "created_at" =>$item["created_at"]
    ];

}else{
    $_SESSION["items"]["todo"][$id]=[

        'title' => $item['title'],
        'description' => $item['description'],
        "completed_at" => $item["completed_at"],
        "created_at" =>$item["created_at"]
    ];

}
$_SESSION['message'] = "the '" . $item['title'] . "' is recovered now.";

RedirectHelper::redirectToPreviousPage();


