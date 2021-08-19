<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>SIGN UP-CoinNewHistories.com</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style-login.css">
</head>
<body>
<?php include("config.php");
if(isset($_SESSION['current'])){
  echo $_SESSION['current'];
}?>

<div class="container-signup">
<div class="card-signup">
  <div class="card-body">
    <div class="circle"> </div>
    <header class="myHed text-center">
     <i class="far fa-user"></i>
     <p>LOGIN</p> 
    </header>
    <form class="main-form text-center" method="post">
      <div class="form-group my-0">
        <label class="my-0">
          <i class="fas fa-user"></i>
          <input type="email" name="e_mail" class="myemail" placeholder="youremail@example.com" required>
        </label>
      </div>
      <div class="form-group my-0">
        <label class="my-0">
          <i class="fas fa-lock"></i>
          <input type="password" name='pw' class="mypw" placeholder="8-20 Characters" required>
        </label>
      </div>
      
      <label class="check1">
        <input type="checkbox" unchecked >
        Remember Me.
      </label>
      <div class="form-group">
        <label>
          <input type="submit" name="login" id="login" class="form-control button" value="LOGIN">
        </label> 
      </div>
    </form>
  </div>
</div>

</div>
<div>
  <?php
if(mysqli_connect_error()){
  echo mysqli_connect_error();}

if(isset($_POST['login'])){

if(isset($_POST["e_mail"]))
$email=mysqli_real_escape_string($link, $_POST["e_mail"]);

if(isset($_POST["pw"]))
$pw=mysqli_real_escape_string($link, $_POST["pw"]);

$query="SELECT * FROM users WHERE email = '".$email."' LIMIT 1";
$result=mysqli_query($link, $query);
    if(mysqli_num_rows($result)>0){
      $row=mysqli_fetch_assoc($result);
        {$auth_pw=$row['user_pw'];
         
        }
      if(password_verify($pw, $auth_pw)){
        if($row['premium']==1){
          $_SESSION["current"]=1;
          header("Location: index.php");
          }
        
        else{
         $_SESSION["current"]=0;
       header("Location: index.php");
       }
        
      }
      else
        echo "wrong pw";
      ?>


      <?php
    }
    else
      echo "email yok";?>
      <script>

  alert("Hello! I am an alert box!");
  </script>
<?php

  }
  ?>




</div>
</body>
</html>