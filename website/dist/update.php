<?php 
require_once 'database.php';
    $id = $_GET['id'];
    $status = $_GET['status'];
    if($status==1){
        $delquiz = "UPDATE quiz SET qenable='0' WHERE id='$id'";
        $query = mysqli_query($conn,$delquiz);
    }else{
        $delquiz = "UPDATE quiz SET qenable='1' WHERE id='$id'";
        $query = mysqli_query($conn,$delquiz);
}
    header('location:manage.php');
?>
