<?php

require_once "core/auth.php";
require_once "core/functions.php";
require_once "core/base.php";

if(categoryRemovePin()){
   linkTo('category_add.php');
}