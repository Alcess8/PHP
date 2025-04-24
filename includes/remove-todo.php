<?php

session_start();
require_once __DIR__ . "/todos.php";
$id = $_GET['id'] ?? '';
$todos = &$_SESSION['todos'] ?? [];

if ($id && count($todos)) {
    $todoIndex = array_search($id, array_column($todos, 'id'));
    if ($todoIndex !== false) {
        array_splice($todos, $todoIndex, 1);
    }
}

header('location:/');
    
// KISS = Keep It Simple, Stupid 
// DRY = Dont'Repeat Yourself
// YAGNI = You Aren't Gonna Need It