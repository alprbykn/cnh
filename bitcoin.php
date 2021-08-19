<?php
include("header.php");
$coinnameapi='bitcoin';
$coinpage="'".$coinnameapi."'";
?>


<?php 
$link = mysqli_connect("localhost","root","","coinnewhistories");

if(mysqli_connect_errno()){
	echo "failed to connet to ymsql". mysqli_connect_error();
}
?>
<?php 
$sql = "SELECT * FROM coins WHERE coin_name=$coinpage";
$result = mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0){

	while($row = mysqli_fetch_assoc($result)){

?>


<div class="d-flex bd-highlight">
  <div class="p-2 flex-{grow|shrink}-1 bd-highlight">

  	<div class="card m-5" style="width: 32rem;">
  <img src="<?php echo $row['coin_logo_path'];?>" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo strtoupper($row['coin_name'])." (".strtoupper($row['coin_title']).")"; ?></h5>
    <p class="card-text"></p>
  </div>
  <ul class="list-group list-group-flush">
    <li id="cp" class="list-group-item">Current Price:     </li>
    <li id="ch" class="list-group-item">1h/1d change:    </li>
    <li id="cap" class="list-group-item">Market Cap:    </li>
     <li id="vol" class="list-group-item">Volume:     </li>
      <li id="sup" class="list-group-item">Max Supply:     </li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
</div>

  <script type="text/javascript">
	
	var xhReq= new XMLHttpRequest();
	
	xhReq.open("GET","https://api.coingecko.com/api/v3/coins/<?php echo $coinnameapi;?>", false);
	xhReq.send(null);
	var data = JSON.parse(xhReq.responseText)
	document.getElementById("cp").innerHTML += "     "+ data.market_data.current_price.usd.toFixed(3)+"$";
	document.getElementById("ch").innerHTML += data.market_data.price_change_percentage_1h_in_currency.usd.toFixed(3)+"% "+"/ "+data.market_data.price_change_percentage_24h.toFixed(3)+" % ";
	document.getElementById("cap").innerHTML += formatMoney(data.market_data.market_cap.usd)+"$";
	document.getElementById("vol").innerHTML += "     "+ formatMoney(data.market_data.total_volume.usd)+"$";
	document.getElementById("sup").innerHTML += data.market_data.max_supply;
	
</script>

		
<?php }} ?>

<div class="p-2 flex-{grow|shrink}-1 bd-highlight">
  	<div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Coin</th>
      <th scope="col">Last Event</th>
      <th scope="col">Last Event Details</th>
      <th scope="col">1 Hour Change</th>
      <th scope="col">1 Day Change</th>
      <th scope="col">3 Days Change</th>
      <th scope="col">7 Days Change</th>
      <th scope="col">30 Days Change</th>
    </tr>
  </thead>
  <tbody>
<?php 
$sql = "SELECT * FROM news where coin_name=$coinpage";
$result = mysqli_query($link,$sql);
$index =0;
if(mysqli_num_rows($result)>0){

	while($row = mysqli_fetch_assoc($result)){
$index=$index+1;
?>

  
  
    <tr>
      <?php echo '<th scope="row">'.  $index.'</th>'?>
      <td><?php echo $row['coin_name'];?></td>
      <td><?php echo $row['new_title'];?></td>
       <td><?php echo $row['coin_name']." were ".$row['new_title']."ed"."<br>". "	at"." ".$row['exchange']. " exchange(s)"."<br>"." on ".$row['event_date'];?></td>
       
       <td><?php 
       if($row['n_p_a_e_1h_min']!=0){echo "1 hour max: ".$row['n_p_a_e_1h_min']."USDT";}
       else echo "Sorry, we can not"."<br>"."provide this data for now" ;
   	   ?></td>

       <td><?php 
       if($row['n_p_a_e_1d_min']!=0){
       						echo "1 day max: ".$row['n_p_a_e_1d_max']." USDT"."<br>".
   								"1 day min: ".$row['n_p_a_e_1d_min']." USDT"."<br>";
   								if($row['n_p_a_e_1d_closing']!=0)
   								echo"1 day closing: ".$row['n_p_a_e_1d_closing']." USDT";}
       else echo "Sorry, we can not"."<br>"."provide this data for now" ;
       
   	   ?></td>
       <td><?php 
       if($row['n_p_a_e_3d_min']!=0){
       						echo "3 days max: ".$row['n_p_a_e_3d_max']." USDT"."<br>".
   								"3 days min: ".$row['n_p_a_e_3d_min']." USDT"."<br>";
   								if($row['n_p_a_e_3d_closing']!=0)
   								echo"3 days closing: ".$row['n_p_a_e_3d_closing']." USDT";}
       else echo "Sorry, we can not"."<br>"."provide this data for now" ;
   	   ?></td>
   	    <td><?php 
       if($row['n_p_a_e_1w_min']!=0){
       						echo "7 day max: ".$row['n_p_a_e_1w_max']." USDT"."<br>".
   								"7 day min: ".$row['n_p_a_e_1w_min']." USDT"."<br>";
   								if($row['n_p_a_e_1w_closing']!=0)
   								echo"7 day closing: ".$row['n_p_a_e_1w_closing']." USDT";}
       else echo "Sorry, we can not"."<br>"."provide this data for now" ;
   	   ?></td>
   	    <td><?php 
       if($row['n_p_a_e_1m_min']!=0){
       						echo "30 day max: ".$row['n_p_a_e_1m_max']." USDT ".($row['new_price_release']/$row['n_n_a_e_1m_min'])."<br>".
   								"30 day min: ".$row['n_p_a_e_1m_min']." USDT"."<br>";
   								if($row['n_p_a_e_1m_closing']!=0)
   								echo"30 day closing: ".$row['n_p_a_e_3d_closing']." USDT";}
       else echo "Sorry, we can not"."<br>"."provide this data for now" ;
   	   ?></td>

    </tr>

<?php }} ?>
  </tbody>
</table>
</div>
</div>
</div>