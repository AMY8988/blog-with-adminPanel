<?php

function con(){
   return mysqli_connect("localhost" , "root" , "","blog");
}

$info = array(
    "name" => "Amy Moe",
    "age" => 20,
    "job" => "Web Developer"
);

$role = ["admin" ,"editor" , "user"];

$url = "http://{$_SERVER["HTTP_HOST"]}/blog-with-adminpanel/" ;