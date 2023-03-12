<?php
class  GeneratorHelper{

    public static function generateId()
    {

        if (!key_exists("item",$_SESSION))
            session_start();
        if (! key_exists('items', $_SESSION)) {
            return 1;
        }
        $items = $_SESSION['items'];

        $todoItems = [0];
        $completedItems = [0];
        $deletedItems = [0];

        if ( key_exists('todo', $items) && $items['todo']) {
            $todoItems = array_keys($items['todo']);

        }
        if ( key_exists('completed', $items) && $items['completed']) {
            $completedItems = array_keys($items['completed']);
        }
        if ( key_exists('deleted', $items) && $items['deleted']) {
            $deletedItems = array_keys($items['deleted']);

        }
        $maxIdOfTodos = max($todoItems);
        $maxIdOfCompletes = max($completedItems);
        $maxIdOfDeletes = max($deletedItems);

        return max($maxIdOfTodos, $maxIdOfCompletes, $maxIdOfDeletes) + 1;
    }
    public static function generateDate(){

        return date("Y-m-d H:i:s");

    }





}