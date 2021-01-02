<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
    <title>Khana Khazana</title>
</head>

<body>

    <?php include 'partials/_header.php'?>
    <?php include 'partials/_dbconnect.php'?>
    <?php
    $insert=false;
    $id = $_GET['catid'];
    $sql= "SELECT * FROM `categories` WHERE cid=$id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
         $catname=$row['cname'];
     }
    ?>
    <?php

    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
    //insert  recipe into database
    
    //$cate= "SELECT `cid`FROM `categories` WHERE `cname`=$cat";
    //echo $cate;
    
    $rname=$_POST['rname'] ;
    //echo $rname;
    $ingredients= $_POST['ingredients'];
    //echo $ingredients;
    $steps= $_POST['steps'];
    //echo $steps;
    //$user=(isset($_POST['username']) ? $_POST['username'] : '');
    // $uid="SELECT `uid` FROM `users` WHERE `username`=$user";
    //echo $uid;
    
    $sql="INSERT INTO `recipes`( `category`, `cid`, `rname`, `ingredients`, `steps`, `date`) VALUES ('$catname','$id','$rname','$ingredients','$steps',current_timestamp())";
    //echo $sql;
    if($conn->query($sql)==true){
       // echo "Successfully inserted";
   
        //Flag for successful insertion
        $insert= true;
      }
      else{
        echo "ERROR: $sql <br> $conn->error";  
   
      }
    }
    ?>
    <?php
 if($insert == true)
        {
          echo '<div class="alert alert-success" role="alert">
            Your recipe has been successfully added!          </div>'  ;
        }
        ?>

    <!-- Category-->
    <div class="container my-4">
        <div class="jumbotron ">
            <div class="container">
                <h1 class="display-4"><?php echo "<p align='center'>".$catname."</p>";?></h1>


            </div>
        </div>
    </div>


    
    <?php
    $id = $_GET['catid'];
    $sql= "SELECT * FROM `recipes` WHERE cid=$id";
    $result = mysqli_query($conn,$sql);
    $noResult=true;
    while($row = mysqli_fetch_assoc($result)){
         $noResult=false;

         $catname=$row['category'];
         $title=$row['rname'];
         $ingredients=$row['ingredients'];
         $steps=$row['steps'];
     
    echo '
    <div class="col-md-1">
    <div class="card" style="width:15rem;">
      <img src="https://source.unsplash.com/500x400/?'.$title.','.$title.'" class="card-img-top" alt="...">
      <div class="card-body ">
        <h5 class="card-title"><a class="text-dark" href="recipe.php?rid='.$id.'">'.$title. '</a></h5>
        </div>
     </div>
     </div>
     </div>';
    
    
    
    
    

    
    /*'<div class="col md-3 ">
            <img src="https://source.unsplash.com/500x400/?'.$title.','.$title.'" width="200px" >
            <div class="media-body">
            <h5 class="mt-0"> <a class="text-dark"  href="recipe.php?rid='.$id.'">'.$title. '</a></h5>
            </div>
        </div>';*/
    }

   // echo var_dump($noResult);
   if($noResult){
       echo '<div class="jumbotron jumbotoron-fluid">
       
     <div class="container">
     <h1 class="display-4">Didn\'t find what you are looking for?</h1>
     
    <button type="button" class="btn btn-info" href="">Add A recipe</button>
     </div>
     </div>';
   }
   ?>

<<<<<<< HEAD
    <div class="container">
        <h1  style="text-align:center;">   Add A Recipe </h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <!--input type="text" name="name" id="username" placeholder="Enter your username">-->
            <input type="text" name="rname" id="rname" placeholder="Enter the name of the recipe">
=======
   <!-- <div class="container">
        <h1 style="text-align:center;"> Add A Recipe</h1>
        <form action="<//?php echo $_SERVER['REQUEST_URI']?>" method="post">
            input type="text" name="name" id="username" placeholder="Enter your username">-->
           
           <!-- <input type="text" name="rname" id="rname" placeholder="Enter the name of the recipe">
>>>>>>> 18c15df145db344a80b920e26ea11866ffc4db9c
            <br> <textarea type="text" name="ingredients" id="ingredients"
                placeholder="Enter the Ingredients of the recipe" cols="30" rows="10"></textarea>
            <br><textarea type="text" name="steps" id="steps" placeholder="Enter the Steps of the recipe" cols="30"
                rows="12"></textarea>
            <button class="btn1">Submit</button>
        </form>
    </div>-->




    <!-- design items to be added here -->



    <?php include 'partials/_footer.php'?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <style>
    #ques {
        min-height: 433px;
    }
    </style>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>