<?php
session_start();
include "../helpers/GeneratorHelper.php";
include "../helpers/RedirectHelper.php";


$generated_id = GeneratorHelper::generateId(); // unique & auto increment

$_SESSION['items']['todo'][$generated_id] = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    "created_at" => GeneratorHelper::generateDate()
];
$_SESSION['message'] = "the '" . $_POST['title'] . "' item successfully created.";
RedirectHelper::redirectToPreviousPage();
