<?php

require_once "core/auth.php";
require_once "core/functions.php";
require_once "core/base.php";

$id = $_GET['id'];
if(categoryPinToTop($id)){
    redirect("category_add.php");
}