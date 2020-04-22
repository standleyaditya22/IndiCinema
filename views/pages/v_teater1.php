	<br>
	<div class="container" >
		<center><div class="row"  id="back1">
			<div class="col-sm-12">
				<div class="caption">
					<h5 style="color: #DA272B; float: left;">STUDIO INDICINEMA</h5><br><br>
					<p style="float: left;">Studio Indicinema berkapasitas 56 orang, menggunakan proyektor 100 lumens, dan suara Dolby Atmos dengan 7 titik suara.</p>
				</div>
			</div>
		</div></center>
	</div>
	<div class="container">
		<center><div class="row" id="kota">
			<div class="col-sm-5">
				<h3 id="kotaH"><?php echo $kota; ?></h3>
			</div>
			<div class="col-sm-7">
				<form action="<?php echo base_url() ?>index.php/DetailJadwal/getTanggal" method="post">
					<table style="border-spacing: 10px 1px; float: left;">
						<tr>
							<td>
								<label>Pilih Teater</label><br>
							</td>
						</tr>
						<tr>
							<td>
								<select name="teater" id="kotaT">
				                    <option selected="true" disabled>Pilih</option>
				                    <?php foreach($studio->result_array() as $data_studio):
                						$namastudio = $data_studio['namatheater'];
                						$kota = $data_studio['kota'];?>				                    
				                    <option class="<?php echo $kota; ?>"><?php echo $namastudio; ?></option>
				              		<?php endforeach; ?>
				                </select>
							</td>
							<td>
								<button type="submit" id="submitbtn" class="btn-primary" type="button" name="" style="background-color: #DA272B; border:none;margin: 0;height: 30px;box-shadow: none;border: none; text-shadow: none;background-repeat: repeat-x;min-width: 50px;border-radius: 10px;">Go!</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<script type="text/javascript">
				function rsax(){
					$.ajax({
						type:'POST',
						url:'<?php echo base_url()."index.php/DetailJadwal/getAll"  ?>',
						dataType: 'json',
						success: function(result){
							console.log(result);
							var baris='';
							for (var i = 0; i < result.length; i++) {
								baris += '<tr>' +
											'<td>'+ result[i].judulfilm +'<td>' +
										  '</tr>';
							}
							$('#jadwal1').html(baris);
						}
					});
				}
				
			</script>
		</div></center>
		<center><div class="row" style="background-color: #B22222; color: white; border-bottom-color: #be8e4c; border-bottom-style: solid; height: 90px; width: 1150px;">
			<div class="col-sm-12">
				<center><table style="border-spacing: 10px 0px; height: 80px;">
					<tr>
						<td><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>
						<td><input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=40px; style="padding-right: 10px;" onclick="prev1()"></td>
						<?php foreach($tanggal->result_array() as $row):
                			$tgl = $row['tanggal'];
                			$newDate = date("d-M", strtotime($tgl));
                			$idbaru = $row['idjadwal']?>
                			<td><button onclick="rsax()" class="tanggal" id="<?php echo $idbaru; ?>"><?php echo $newDate; ?></button></td>
				        <?php endforeach; ?>
						<td><input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="padding-left: 20px; transform: rotate(180deg);" onclick="next1()"></td>
					</tr>
				</table></center>
			</div>
		</div></center>
		<center><div class="row" style="min-height: 600px; width: 1150px;">
			<div class="col-sm-12 movie" style="background-color: white; color: black;">
				<button onclick="rsax()">next</button>
				<span id="jadwall"></span>
				<table id="jadwal1"   style="margin-top: 20px;">
					
				</table>
			</div>			
		</div></center>
	</div>
<script type="text/javascript">
	
</script>
<footer>
<div class="container-fluid" style="margin-top: 30px; background-color: #ffffff;">
  <div class="row">
    <div class="col-lg-2"><img src="<?php echo base_url() ?>assets/image/logoresize.png" width="60px" style="display: inline; float: right; margin-top: 20px;"></div>
    <div class="col-lg-4" style="padding-top: 20px;">          
      <h6 style=" color: #DA272B">TENTANG INDICINEMA</h6>
      <P style="text-align: justify; font-size: 12px;">Indicinema adalah bioskop alternatif yang menayangkan kembali film yang sudah turun layar, film indi, dan film festival, dan film dokumenter. -56 Kursi - Proyektor 1000 lumens - Suara 7 titik - Ruangan kedap suara</P>
    </div>
     <div class="col-lg-1"></div>
    <div class="col-lg-3" style="padding-top: 20px; margin-bottom: 10px; ">
      <table>
          <h6 style="color: #DA272B;">KONTAK KAMI</h6>
          <tr>
            <td><img src="<?php echo base_url() ?>assets/image/whatsapp.png" style="padding-right: 20px;" class="gambar1"></td>
            <td style="font-size: 12px;">(0628) 18964521</td>            
          </tr>
          <tr>
            <td> </td>
          </tr>
          <tr>  
            <td><img src="<?php echo base_url() ?>assets/image/email.png" class="gambar1"></td> 
            <td style="font-size: 12px;">indicinema@blabla.com</td>
          </tr>
      </table> 
    </div>
    <div class="col-lg-2"></div>
  </div>
  <div class="row" style="background-color: #B22222; padding-top: 10px;">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <center><p style="color: white; font-size: 12px;">Copyright &#169; 2019 Indicinema | All Right Reserved</p></center>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
</footer>
<script type="text/javascript">
	var i;
    var k;
    var x = document.getElementsByClassName("tanggal");
	function start(){
	if (x.length < 9){
		for (j = 0; j < x.length; j++) {
	      x[j].style.display = "block";
	    }
	}
	else{
		for (j = 0; j < 10; j++) {
	      x[j].style.display = "block";
		}
		k = 9;
		i = 0;
	}
	}
    
  function next1(){
  	if (x.length < 9){
	    if (k+1 < x.length){
	      x[i].style.display = "none";
	      k = k+1;
	      i = i+1;
	      for (j = i; j <= k; j++){
	        x[j].style.display = "block";
	      }
	    }
	    else if (k+1 >= x.length){
	      for (j = 0; j < 10; j++) {
	        x[j].style.display = "block";
	      }
	      for (j = 10; j < x.length; j++) {
	        x[j].style.display = "none";
	      }
	      k = 9;
	      i = 0;
	    }
	}
  }
  function prev1(){
  	if (x.length < 9){
	    if (i > 0){
	      x[k].style.display = "none";
	      k = k-1;
	      i = i-1;
	      for (j = i; j <= k; j++){
	        x[j].style.display = "block";
	      }
	    }
	    else if (i <= 0){
	      for (j = x.length-10; j < x.length; j++) {
	        x[j].style.display = "block";
	      }
	      for (j = 0; j < x.length-10; j++) {
	        x[j].style.display = "none";
	      }
	      k = x.length-1;
	      i = k-9;
	    }
	}
  }
</script>
<style type="text/css">
	body {
		background-image: url(<?php echo base_url() ?>assets/image/back.png);
		background-color: #B22222;
		background-size: cover;
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		width: 100%;
		min-height: 980px; 
	}
    .navbar{
	    height: 90px;    
	}
	.nav1{
		width: 100%;
	}
	.navi{
	    background-color: white;
	    height: 90px;
	    margin-top: 30px;
	    border-top-color: #be8e4c;
		border-top-style: solid;
		border-bottom-color: #be8e4c;
		border-bottom-style: solid;
	}
	.asd {
	    margin-top: 20px;
	}
	.namamenu{
	    font-style: normal;
	    font-weight: normal;
	    font: bold 15px "Verdana";
	    font-size: 17px;
	    line-height: 14px;
	    padding-left:17px; 
	    text-decoration: none;
	    color: #DA272B;
	    margin-right: 30px;
	}
	.namamenu:hover {
	    opacity: 1.0;
	    text-decoration: none;
	    color: #535353;
	}
	#gambar{
	    height: 100px;
	    width: 100px;
	    border-radius: 10px;
	    display: inline-block;
	}
	nav {
	    margin: 0 auto;
	}
	.search-container {
		position: absolute;
		right: 0;
	}
	.navbar input[type=text] {
	    padding: 6px;
	    font-size: 17px;
		border: none;
	}
	.navbar .search-container button {
	    float: right;
	    padding: 6px 10px;
	    margin-right: 16px;
		background: #ddd;
		font-size: 17px;
		border: none;
		cursor: pointer;
	}
	#back1{
		background-image: url(<?php echo base_url() ?>assets/image/studio.jpg); 
		background-size: cover; 
		position: relative;
		background-repeat: no-repeat;
		height: 550px; width: 1150px;
	}
	.caption {
		color: white; 
		background-color: rgb(0,0,0,0.7); 
		height: 40%;
		width: 100%;  
		position: absolute;
		bottom: 0px;
		right: 0px;
		left: 0px;
		padding: 30px;
		margin: 0 auto;
	}
	#kota{
		border-top-color: #be8e4c;
		border-top-style: solid;
		border-bottom-color: #be8e4c;
		border-bottom-style: solid;
		height: 90px; 
		margin-top: 30px; 
		background-color: white; 
		width: 1150px;
		border-top-right-radius: 30px;
		border-top-left-radius: 30px;
		padding: 10px 20px;
	}
	#kotaH{
		font-size: 31.5px;
		font-weight: normal;
		line-height: 80px;
		float: right;
		text-transform: uppercase;
	}
	#kotaS{
		background: transparent; 
		width: 200px;
		font-size: 14px;
		height: 28px; 
		border: 1px solid black; 
		border-radius: 6px;
	}
	#kotaT{
		background: transparent; 
		width: 200px;
		font-size: 14px;
		height: 28px; 
		border: 1px solid black; 
		border-radius: 6px;
	}
	table {
	    border-collapse: separate;	  
	}​​​​​​​​​​​​​
	.jadwal{
		height: 90px;
		width: 950px;
	}
	.arr {
	   	line-height: 90px;
	}
	.arr:hover {
	    opacity: 0.7;
	}
	.arr2 {
	    line-height: 90px;
	}
	.arr2:hover {
	    opacity: 0.7;
	}
	.tanggal{
	    text-decoration: none;
	    color: white;
	    padding-bottom: 3px;
	    font-size: 20px;
	    display: none;
	    background: transparent;
	    border:none;
	}
	.tanggal:hover{
	    color: #be8e4c;
	    text-decoration: none;
	}
	.poster{
	    width: 140px;
      	height: 200px;
	}
	#jadwall{
        border-spacing: 10px 20px;
        float: left;
	}
	    .jadwalll{
	    	vertical-align: top;
	    }
	    
		.gambar1{
		  height: 20px;
		  display: inline-block;
		}
		.movie{
			min-height: 500px;
		}
		.nav a.active{
	    	color: #535353;
	    }
	    .studio{
	    	display: none;
	    }
	</style>
</body>
</html>