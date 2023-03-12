<?php

session_start();
include "../helpers/GeneratorHelper.php";
include "../helpers/RedirectHelper.php";



$id = $_POST['item_id'];
$todoItem =$_SESSION['items']['todo'][$id];
// actual add
unset($_SESSION['items']['todo'][$id]);

$_SESSION['items']['completed'][$id] = [
    'title' => $todoItem['title'],
    'description' => $todoItem['description'],
    'created_at' => $todoItem['created_at'],
    'completed_at' => GeneratorHelper::generateDate()
];
$_SESSION['message'] = "the '" . $todoItem['title'] . "' assigned as completed.";


RedirectHelper::redirectToPreviousPage();