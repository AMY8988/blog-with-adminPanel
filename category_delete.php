<?php

require_once "core/auth.php";
require_once "core/functions.php";
require_once "core/base.php";

$id = $_GET['id'];
if(categoryDelete($id)){
   redirect("category_add.php");
}