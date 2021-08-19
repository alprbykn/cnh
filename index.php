<?php
include("header.php"); 
?>

<div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Coin</th>
      <th scope="col"></th>
      <th scope="col">Price</th>
      <th scope="col">24h/1d change</th>
      <th scope="col">Market Cap</th>
      <th scope="col">Next Event</th>
      <th scope="col">Last Event</th>
      <th scope="col">Last Event Details</th>
      <th scope="col">More Events</th>
    </tr>
  </thead>
  <tbody>

<?php 
$index = 0;
if(mysqli_connect_errno()){
  echo "failed to connet to ymsql". mysqli_connect_error();
}
?>
<?php 
$sql = "SELECT * FROM coins";
$result = mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0){

  while($row = mysqli_fetch_assoc($result)){
$index+=1;
?>
    <tr>
    <?php echo '<th scope="row">'.  $index.'</th>'?>
      <td><a id="logo" href="<?php echo $row['coin_name']?>.php"> <img class="minilogo" src="<?php echo $row['coin_logo_path'];?>" alt="..."></a></td>
      <td><?php echo strtoupper($row['coin_name'])." (".strtoupper($row['coin_title']).")";?></td>
      <td id="cp<?php echo $index;?>"></td>
      <td id="ch<?php echo $index;?>"><?php echo $row['coin_name'];?></td>
      <td id="cap<?php echo $index;?>"><?php echo $row['coin_title'];?></td>
  </tr>

<script type="text/javascript">
  
  var xhReq= new XMLHttpRequest();
  
  xhReq.open("GET","https://api.coingecko.com/api/v3/coins/<?php echo $row['coin_name'];?>", false);

  xhReq.send(null);
  var data = JSON.parse(xhReq.responseText)
  console.log(data);
  document.getElementById("cp<?php echo $index;?>").innerHTML = "$"+ data.market_data.current_price.usd.toFixed(2);
  document.getElementById("ch<?php echo $index;?>").innerHTML = data.market_data.price_change_percentage_1h_in_currency.usd.toFixed(2)+"% "+"/ "+data.market_data.price_change_percentage_24h.toFixed(2)+"% ";
  document.getElementById("cap<?php echo $index;?>").innerHTML = "$"+formatMoney(data.market_data.market_cap.usd);
  
  
</script>

  <?php }}?>
  </tbody>
</table>
</div>

</body>
</html>

