<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
  <title>CoinNewHistories.com
  </title>
</head>
<body>
  <?php 

session_start();
$link=mysqli_connect("localhost", "root", "", "coinnewhistories");
?>
  <script type="text/javascript">
    Number.prototype.formatMoney = function (fractionDigits, decimal, separator) {
fractionDigits = isNaN(fractionDigits = Math.abs(fractionDigits)) ? 2 : fractionDigits;

decimal = typeof (decimal) === "undefined" ? "." : decimal;

separator = typeof (separator) === "undefined" ? "," : separator;

var number = this;

var neg = number < 0 ? "-" : "";

var wholePart = parseInt(number = Math.abs(+number || 0).toFixed(fractionDigits)) + "";

var separtorIndex = (separtorIndex = wholePart.length) > 3 ? separtorIndex % 3 : 0;

return neg +

(separtorIndex ? wholePart.substr(0, separtorIndex) + separator : "") +

wholePart.substr(separtorIndex).replace(/(\d{3})(?=\d)/g, "$1" + separator) +

(fractionDigits ? decimal + Math.abs(number - wholePart).toFixed(fractionDigits).slice(2) : "");

};
function formatMoney (raw) {

return Number(raw).formatMoney(2, ',', '.');

}
  </script>
  <div id="overall"> <h5 > BTC: xx ETH: xx DOM: xx </h5></div>
  <script type="text/javascript">
    var xhReq= new XMLHttpRequest();
  
  xhReq.open("GET","https://api.coingecko.com/api/v3/coins/bitcoin", false);
  xhReq.send(null);
  var data = JSON.parse(xhReq.responseText)
  var btc_price="$"+ data.market_data.current_price.usd.toFixed(2);
  var btc_cap = data.market_data.market_cap.usd;


  xhReq.open("GET","https://api.coingecko.com/api/v3/coins/ethereum", false);
  xhReq.send(null);
  var data = JSON.parse(xhReq.responseText);
  var eth_price= "$"+data.market_data.current_price.usd.toFixed(2);
  xhReq.open("GET","https://api.coingecko.com/api/v3/global", false);
  xhReq.send(null);
  var data = JSON.parse(xhReq.responseText);
  var m_cap= data.data.total_market_cap["usd"].toFixed(2);
  var m_dom = (btc_cap/m_cap).toFixed(2);
  xhReq.open("GET","https://api.coingecko.com/api/v3/global", false);
  xhReq.send(null);
  var data = JSON.parse(xhReq.responseText);
  var m_vol= data.data.total_volume.usd.toFixed(2);
  document.getElementById("overall").innerHTML = "BTC:     "+ btc_price+ " ETH: "+ eth_price + " BTC DOMINANCE: %" + m_dom + " TOTAL MARKET CAP: $"+formatMoney(m_cap)+" TOTAL VOLUME: $"+ formatMoney(m_vol);
  </script>
   
  
<div>

<div class="sitewelcome">
    
    <a id="logo" href="index.php"> <img src="logos/logo.jpg"> <a/>
      
      <a class="welcome" href="index.php">Significant cryptocurrency news and events <br>& past events analysis<a/>
        <?php
          if(isset($_SESSION['current'])){
            ?>
            <a class="link" href="donateus.html"> DONATE US <a/>
            <a class="link" href="logout.php"> LOGOUT </a>
            
            <?php }
            else{
              ?>
          <a class="link" href="donateus.html"> DONATE US <a/>
          <a class="link" href="login.php"> LOGIN </a>
          <a class="link" href="signup.php">SIGN UP </a>
          <?php 
           }  
            ?>
          
        
   
</div>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">CoinNewHistories</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="news.php">News</a>
        <a class="nav-link" href="coins.php">Coins</a>
        <a class="nav-link" href="exchanges.php">Exchanges</a>
        
      </div>
    </div>
  </div>
</nav>

