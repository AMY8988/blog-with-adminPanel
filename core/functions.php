<?php

// common-uses start

function runQuery($sql){
    $con = con();
   if( mysqli_query( $con ,$sql)){
       return true;
   }else{
       die("Query Fail:");
   }
}

function alert($data , $color="danger"){
    echo "<p class='alert alert-$color'>$data</p>";
}

function redirect($location){
     header("location:$location");
}

function linkTo($location){
     echo "<script>location.href='$location' </script>";
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row=mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function fetch($sql){
    $query =mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function day($timeStamp,$format="j-n-Y"){

    return date($format,strtotime($timeStamp));

}

function countTotal($tableName){
    $sql = " SELECT COUNT(id) FROM `$tableName` ";
    $total =  fetch($sql);
    return $total['COUNT(id)'];

};

function short($str,$length){
    return substr($str ,0,$length) . '...';
}

function textFilter($str){
    $text = trim($str);
    $textWithEntities = htmlentities($text , ENT_QUOTES);
    $text = stripcslashes($textWithEntities);

    return $text;
}

// common-uses end


// auth start

function register(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];

    if ($password == $Cpassword) {
        $securPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$securPassword')";
        if(runQuery($sql)){
            return redirect("login.php");
        }


    }else{
        return alert("Password don't match");
    };

};


function logIn(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE `email`='$email' ";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);

    if(!$row){
        // email မှားရင်ထွက်မယ့် error
        return alert("Email or Password don't match");
    }else{

        if(!password_verify($password , $row['password'])){
            //password မှားရင် ထွက်မယ့် error
            return  alert("Email or Password don't match");
        }else{
          session_start();
          $_SESSION['user'] = $row;
          redirect('dashboard.php');

        }
    }

}

// auth end

//user start

function user($id){
    $sql = "SELECT * FROM `users` WHERE id=$id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM `users`";
    return fetchAll($sql);
}

//user end

//category start

function categoryAdd(){
    $title = $_POST['title'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO `categories` (`title`,`user_id`) VALUES ('$title' , '$user_id')";
    if(runQuery($sql)){
        return linkTo('category_add.php');
    }
}

function category($id){
    $sql = "SELECT * FROM `categories` WHERE id=$id";
    return fetch($sql);
}

function categories(){
    $sql = "SELECT * FROM `categories`";
    return fetchAll($sql);
}

function categoryDelete($id){
    $sql = "DELETE FROM `categories` WHERE id=$id";
   return runQuery($sql);
}

function categoryEdit(){
    $title = $_POST['title'];
    $id = $_POST['id'];
   $sql = " UPDATE `categories` SET `title`='$title' WHERE id=$id ";
   if(runQuery($sql)){
       linkTo("category_add.php");
   }

}




//category end

//post start
function postAdd(){
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO `posts` (`title`,`user_id`,`description`,`category_id`) VALUES ('$title' , '$user_id','$description','$category_id')";

    if(runQuery($sql)){
        return alert("Post Added","success");
    }
}

function post($id){
    $sql = "SELECT * FROM `posts` WHERE id=$id";
    return fetch($sql);
}

function posts(){

    if($_SESSION['user']['role'] == 0){
        $sql = "SELECT * FROM `posts`";
    }else{
        $current = $_SESSION['user']['id'];
        $sql ="SELECT * FROM `posts` WHERE user_id='$current' ";
    }

    return fetchAll($sql);
}

function postDelete($id){
    $sql = "DELETE FROM `posts` WHERE id=$id";
    return runQuery($sql);
}

function selectTitle($id){
    $sql = "SELECT * FROM `posts` WHERE id=$id";
    return fetch($sql);
}

function postEdit(){
    $title = $_POST['title'];
    $id = $_POST['id'];
    $description = $_POST['description'];
    $category_id =$_POST['category_id'];
    $sql = " UPDATE `posts` SET `title`='$title',`description`='$description',`category_id`='$category_id' WHERE id=$id ";
    if(runQuery($sql)){
        linkTo("post-list.php");
    }

}
//post end
