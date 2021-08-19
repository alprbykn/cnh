<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>SIGN UP-CoinNewHistories.com</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/ bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<?php include("config.php");
if(isset($_SESSION['current']))
echo $_SESSION['current'];?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="style-login.css">

<div class="container-signup">
<div class="card-signup">
  <div class="card-body">
    <div class="circle"> </div>
    <header class="myHed text-center">
     <i class="far fa-user"></i>
     <p>SIGN UP</p> 
    </header>
    <form class="main-form text-center" method="post">
      <div class="form-group my-0">
        <label class="my-0">
          <i class="fas fa-user"></i>
          <input type="email" id="email" name="e-mail" class="myemail" placeholder="youremail@example.com" required>
        </label>
      </div>
      <div class="form-group my-0">
        <label class="my-0">
          <i class="fas fa-lock"></i>
          <input type="password" name="pw" id="pw" class="mypw" placeholder="8-20 Characters" required>
        </label>
      </div>
      <div class="form-group my-0">
        <label class="my-0">
          <i class="fas fa-lock"></i>
          <input type="password" name="cpw" id="checkpw" class="mypw" placeholder="Check Password" required>
        </label>
      </div>
      <label class="check1">
        <input type="checkbox" unchecked required>
        I agree Terms of Use and Privacy Policy.
      </label>
      <div class="form-group">
        <label>
          <input type="submit" name="signup" id="register" class="form-control button" value="SIGN UP">
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

if(isset($_POST['signup'])){

if(isset($_POST["e-mail"]))
$email=mysqli_real_escape_string($link, $_POST["e-mail"]);
if(isset($_POST["pw"]))
$pw=mysqli_real_escape_string($link, $_POST["pw"]);
if(isset($_POST["cpw"]))
$cpw=mysqli_real_escape_string($link, $_POST["cpw"]);
if($pw!=$cpw)
{
  ?>
 
       <script type='text/javascript'>
        document.getElementById("checkpw").style.backgroundColor = "red"; 
    <script type="text/javascript">
        $(function(){
          $('#register').click(function(){
          Swal.fire({
  'title':'Passwords does not match!',
  'text': 'Please correct selected space',
  'type': 'no success'
        })
        });
         });

      </script>
        <?php 
        $query="SELECT * FROM users WHERE email = '".$email."'";
    $result=mysqli_query($link, $query);
    //echo "mysqli_num_rows($result)";
    if(mysqli_num_rows($result)>0)
      {
      ?>
      <script type='text/javascript'>
        document.getElementById("email").style.backgroundColor = "red"; 
        <script type="text/javascript">
        $(function(){
          $('#register').click(function(){
          Swal.fire({
  'title':'E-mail is already registered',
  'text': 'Please correct selected space',
  'type': 'no success'
        })
        });
         });

      </script>
   <?php 
     }
}
else//pw match
 {
 $query="SELECT * FROM users WHERE email = '".$email."'";
    $result=mysqli_query($link, $query);
    //echo "mysqli_num_rows($result)";
    if(mysqli_num_rows($result)>0)
      {
      ?>
      <script type='text/javascript'>
        document.getElementById("email").style.backgroundColor = "red"; </script>
<?php 
      }
    else 
      {
        $pw=password_hash($pw,PASSWORD_DEFAULT);
      $query = "INSERT INTO users (email, user_pw,premium) 
    VALUES('".$email."','".$pw."',0)";
    if(mysqli_query($link, $query))
          {
      ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript">
        $(function(){
          $('#register').click(function(){
          Swal.fire({
  'title':'You successfully registered!',
  'text': 'You will be redirected to main page soon',
  'type': 'success'
        })
        });
         });
      

      </script>
      <?php
      
      header("Location: index.php");
        }
 
      }
}
}  
session_destroy()
?>   

      
   

  
</div>

</body>
</html>