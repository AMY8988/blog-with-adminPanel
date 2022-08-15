<?php

require_once "core/auth.php";
require_once "core/functions.php";
require_once "core/base.php";

$id = $_GET['id'];
if(postDelete($id)){
    redirect("post-list.php");
}