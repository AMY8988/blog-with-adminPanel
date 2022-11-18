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

function day($timeStamp,$format="j M Y"){

    return date($format,strtotime($timeStamp));

}

function countTotal($tableName,$condition=1){
    $sql = " SELECT COUNT(id) FROM `$tableName` WHERE $condition";
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

//viewer start
function viewerRecord($userId,$postId,$device){
    $sql = "INSERT INTO `viewers` (`user_id`,`post_id`,`device`) VALUES  ('$userId','$postId','$device')";
    return runQuery($sql);
}

function viewerByPost($postId){
    $sql = "SELECT * FROM `viewers` WHERE `post_id`=$postId";
    return fetchAll($sql);
}

function viewerByUser($userId){
    $sql = "SELECT * FROM `viewers` WHERE `user_id`=$userId";
    return fetchAll($sql);
}
//viewer end


//category start



function categoryAdd(){
    $title = textFilter($_POST['title']);
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
    $sql = "SELECT * FROM `categories` ORDER BY ordering DESC ";
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

function categoryPinToTop($id){
    $sql = "UPDATE `categories` SET `ordering`='0' ";
    mysqli_query(con(),$sql);

    $sql ="UPDATE `categories` SET `ordering`='1' WHERE `id`=$id ";
    return runQuery($sql);
}

function categoryRemovePin(){
    $sql = "UPDATE `categories` SET `ordering`='0' ";
    return runQuery($sql);
}




//category end

//post start

function isCategoryId($id){
    if(category($id)){
        return $id;
    }else{

         die(alert('Category is unavaliable','secondary'));
    }
}

function postAdd(){
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategoryId($_POST['category_id']);
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

//front-panel start

function fcategories(){
    $sql = "SELECT * FROM `categories`";
    return fetchAll($sql);
}


function fposts($orderBy='id',$orderType='DESC'){

    $sql = "SELECT * FROM `posts` ORDER BY $orderBy $orderType ";
    return fetchAll($sql);
}

function fpostBaseOnUser($id){

        $sql = "SELECT * FROM `posts` WHERE `category_id`=$id";
        return fetchAll($sql);

}

function fpostsByCategory($currentCategory_id,$limit="9999",$currentPostId=0){

    $sql = "SELECT * FROM `posts` WHERE `category_id`=$currentCategory_id AND `id`!= $currentPostId ORDER BY id DESC LIMIT $limit ";
    return fetchAll($sql);
}

function fsearch($searchKey){
    $sql = "SELECT * FROM `posts` WHERE `title` LIKE '%$searchKey%' OR `description` LIKE '%$searchKey%' ORDER BY id DESC " ;
    return fetchAll($sql);
}

function fsearchByDate($start,$end){
    $sql = "SELECT * FROM `posts` WHERE `created_at` BETWEEN '$start' AND '$end' ORDER BY id DESC " ;
    return fetchAll($sql);
}




//front-panel end

//ads start
function adsAdd(){
    $ownerName = $_POST['owner_name'];
    $photo = $_POST['photo'];
    $link = $_POST['link'];
    $start = $_POST['start_ads'];
    $end = $_POST['end_ads'];
    $sql = "INSERT INTO `ads` (`owner_name`,`photo`,`link`,`start`, `end`) VALUES  ('$ownerName','$photo','$link','$start','$end')";
    return runQuery($sql);
}

function showAds(){
    $sql = "SELECT * FROM `ads`";
    return fetchAll($sql);
}
//ads end

//payment start
function transfer(){
    $toUserId = $_POST['toUserId'];
    $amount =$_POST['amount'];
    $description =$_POST['description'];

    if( user($_SESSION['user']['id'])['money'] > $amount ){
        //from user transfer
        $fromUserId = $_SESSION['user']['id'];
        $fromUserDetail = user($fromUserId);
        $leftAmount = $fromUserDetail['money'] - $amount;
        $sql = "UPDATE `users` SET `money`=$leftAmount WHERE `id`=$fromUserId";
        mysqli_query(con(),$sql);

        //to user transfer
        $toUserDetail = user($toUserId);
        $totalAmount = $toUserDetail['money']  + $amount;
        $sql = "UPDATE `users` SET `money`=$totalAmount WHERE `id`=$toUserId";
        mysqli_query(con(),$sql);

        //add payment history
        $sql = "INSERT INTO `transitions` (`from_user`,`to_user`,`amount`,`description`) VALUES ('$fromUserId','$toUserId','$amount','$description')";
        runQuery($sql);
    }
}

function transition($id){
    $sql = "SELECT * FROM `transitions` WHERE id=$id";
    return fetch($sql);
}

function transitions(){
    $sql = "SELECT * FROM `transitions` ";
    return fetchAll($sql);
}
//payment end

//dashboard start
function dashboardPosts($limit=9999999){

    $sql = "SELECT * FROM `posts` ORDER BY id DESC Limit $limit";
    return fetchAll($sql);
}
//dashboard end

//api start

function apiOutPut($arr){
    echo json_encode($arr);
}

//api end

