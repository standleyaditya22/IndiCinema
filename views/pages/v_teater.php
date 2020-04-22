	<script>
		var stud;
		function getTanggal(){
		    var id = document.getElementById("kotaT").value;		    
		    $.ajax({
		      type:'POST',
		      url:'<?php echo base_url()."index.php/DetailStudio/fetch_tanggal?idStudio="?>'+id,
		      dataType: 'json',
		      success: function(result){
		        var pilihan='';
		        if (result == ""){
		      		pilihan += '<td class="animated"><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>';
		      		$('#target').html(pilihan);
		      	}
		      	else {
		      		pilihan += '<td class="animated"><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>';
			        pilihan += '<td class="animated"><input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=40px; style="padding-right: 10px;" onclick="prev1()"></td>';
			        for (var i = 0; i < result.length; i++) {
			          var tgl = "'"+result[i].tanggal.toString()+"'";
			          pilihan += '<td class="animated"><button class="tanggal" onclick="getDetail('+ tgl +')" value="'+ result[i].tanggal +'">'+ result[i].tanggal +'</button></td>';
			        }
			        pilihan += '<td class="animated"><input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="padding-left: 20px; transform: rotate(180deg);" onclick="next1()"></td>';
			        $('#target').html(pilihan);
			        now();
		      	}		        
		      }
		    });
		  }
		  function getDetail(tanggal){
			var tgl = "'"+tanggal+"'";
			var stud = document.getElementById("kotaT").value;
			console.log(tgl);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url()."index.php/DetailStudio/fetch_detail?tanggal="?>'+tanggal+'&idteater='+stud,
				dataType: 'json',
				success: function(result){
					console.log(result);
					var pilihan='';
					for (var i = 0; i < result.length; i++) {
						pilihan += '<tr class="jadwalll"><td><img class="poster" style="content: url('+ result[i].url +');"></td>';
						pilihan += '<td><h5 class="judul">'+ result[i].judulfilm +'</h5><br><br><br><span class="usia">'+ result[i].usia +'+</span><br><br>';
						pilihan += '<div class="jdwl" id="a'+result[i].idjadwal+'"></div>';
						getDate(result[i].idjadwal, result[i].judulfilm);			
						pilihan += '</td></tr>';
					}
					$('#jadwall').html(pilihan);
				}
				});
			}
			function getDate(id, judul){
				$.ajax({							
					type:'POST',
					url:'<?php echo base_url()."index.php/DetailStudio/fetch_jam?idjadwal="?>'+id,
					dataType: 'json',
					success: function(results){
						pil = "";
						for (var j = 0; j < results.length; j++) {
							pil += '<button class="jamtayang">'+ results[j].jam +'</button>';
						}
						$('#a'+id).html(pil);
					}
				})		
			}
		  	var i;
		    var k;
		    var x = document.getElementsByClassName("tanggal");
			function start(){}
			function now(){
			if (x.length < 5){
				for (j = 0; j < x.length; j++) {
			      x[j].style.display = "block";
			    }
			}
			else{
				for (j = 0; j < 5; j++) {
			      x[j].style.display = "block";
				}
				k = 4;
				i = 0;
			}
			}
		    
		  function next1(){
		  	if (x.length > 5){
			    if (k+1 < x.length){
			      x[i].style.display = "none";
			      k = k+1;
			      i = i+1;
			      for (j = i; j <= k; j++){
			        x[j].style.display = "block";
			      }
			    }
			    else if (k+1 >= x.length){
			      for (j = 0; j < 5; j++) {
			        x[j].style.display = "block";
			      }
			      for (j = 5; j < x.length; j++) {
			        x[j].style.display = "none";
			      }
			      k = 4;
			      i = 0;
			    }
			}
		  }
		  function prev1(){
		  	if (x.length > 5){
			    if (i > 0){
			      x[k].style.display = "none";
			      k = k-1;
			      i = i-1;
			      for (j = i; j <= k; j++){
			        x[j].style.display = "block";
			      }
			    }
			    else if (i <= 0){
			      for (j = x.length-5; j < x.length; j++) {
			        x[j].style.display = "block";
			      }
			      for (j = 0; j < x.length-5; j++) {
			        x[j].style.display = "none";
			      }
			      k = x.length-1;
			      i = k-4;
			    }
			}
		  }
	</script>
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
				<form action="<?php echo base_url() ?>index.php/DetailJadwal/getTanggal?nama=<?php echo $title ?>" method="post">
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
                						$id = $data_studio['id_theater'];?>				                    
				                    <option value="<?php echo $id; ?>"><?php echo $namastudio; ?></option>
				              		<?php endforeach; ?>
				                </select>
							</td>
							<td>
								<button onclick="getTanggal()" id="qiuck-links-go-button" class="btn-primary" type="button" name="" style="background-color: #DA272B; border:none;margin: 0;height: 30px;box-shadow: none;border: none; text-shadow: none;background-repeat: repeat-x;min-width: 50px;border-radius: 10px;">Go!</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div></center>
		<center><div class="row" style="background-color: #B22222; color: white; border-bottom-color: #be8e4c; border-bottom-style: solid; height: 90px; width: 1150px;">
			<div class="col-sm-12">
				<center><table style="border-spacing: 10px 0px; height: 80px;">
					<tr id="target" >
						<td><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>
					</tr>
				</table></center>
			</div>
		</div></center>
		<center><div class="row" style="min-height: 600px; width: 1150px;">
			<div class="col-sm-12 movie" style="background-color: white; color: black;">
				<table  id="jadwall" style="margin-top: 20px;" >
					
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
<style type="text/css">
	.animated{
		animation: fadeEffect 1.3s;
	}
	@keyframes fadeEffect {
	    from {opacity: 0;}
	    to {opacity: 1;}
	}
	.jdwl{
		width: 900px;
		border-top-style: solid;
		border-top-color: #be8e4c;
		height: 80px;
		padding-bottom: 20px; 
	}
	.jamtayang{
		float: left;
		margin-top: 20px;
		background: transparent;
		border: none;
		font-size: 18px;
		border-right-style: solid;
		border-right-color: #be8e4c;
	}
	.jamtayang:hover{
		background: transparent;
		font-size: 18px;
		color: #be8e4c;
	}
	.usia{
		background-color: #006aaf; color: white;  border-radius: 8px;
		width: 35px; height: 35px;
		font-size: 14px;
		padding: 4px;
		float: left;
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
        border-spacing: 10px 40px;
        float: left;
	}
	    .jadwalll{
	    	vertical-align: top;
	    	animation: fadeEffect 1.5s;
	    }
	    
		.gambar1{
		  height: 20px;
		  display: inline-block;
		}
		.movie{
			min-height: 500px;
		}
	    .studio{
	    	display: none;
	    }
	    .poster{
	    	width: 140px;
      		height: 200px;
	    }
	    .judul{
	    	float: left;
	    	margin-bottom: 10px;
	    	margin-top: 10px;
	    }
	</style>
</body>
</html>