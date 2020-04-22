	<script>
		function start(){};
		function getStudio(){
		    var kota = document.getElementById("kotaS").value;
		    console.log(kota);
		    $.ajax({
		      type:'POST',
		      url:'<?php echo base_url()."index.php/DetailFilm/fetch_studio?kota="?>'+kota,
		      dataType: 'json',
		      success: function(result){
		        console.log(result);
		        var pilihan='';
		        pilihan += '<option value="">Pilih Studio</option>';
		        for (var i = 0; i < result.length; i++) {
		          pilihan += '<option value="'+ result[i].id_theater +'">'+ result[i].namatheater +'</option>';
		        }
		        $('#kotaT').html(pilihan);
		      }
		    });
		}
		function getTanggal(){
		    var idstudio = document.getElementById("kotaT").value;
		    var	idfilm = <?php echo $idfilm; ?>;	
		    console.log(idstudio);    
		    $.ajax({
		      type:'POST',
		      url:'<?php echo base_url()."index.php/DetailFilm/getTanggal2?idfilm="?>'+idfilm+'&idstudio='+idstudio,
		      dataType: 'json',
		      success: function(result){
		      	console.log(result);
		      	var pilihan = '';
		      	if (result == ""){
		      		pilihan += '<td><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>';
		      		$('#target').html(pilihan);
		      	}
		      	else{
			      	pilihan += '<td><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>';
			      	pilihan += '<td><input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=40px; style="padding-right: 10px;" onclick="prev1()"></td>';
			        for (var i = 0; i < result.length; i++) {
			          var tgl = "'"+result[i].tanggal.toString()+"'";
			          pilihan += '<td><button class="tanggal" onclick="getDetail('+ result[i].idjadwal +')" value="'+ result[i].tanggal +'">'+ result[i].tanggal +'</button></td>';
			        }
			        pilihan += '<td><input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="padding-left: 20px; transform: rotate(180deg);" onclick="next1()"></td>';
			        $('#target').html(pilihan);
			        now();
		      	}		      	
		      }
		    });
		}
		function getDetail(idjadwal){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url()."index.php/DetailStudio/fetch_detail2?idjadwal="?>'+idjadwal,
				dataType: 'json',
				success: function(result){
					console.log(result);
					var pilihan='';
					for (var i = 0; i < result.length; i++) {
						pilihan += '<tr class="jadwalll"><td><h4 style="float: left;">'+ result[i].theater +'</h4></td></tr>';
						pilihan += '<tr class="jadwalll"><td>'+result[i].alamat +'</td></tr>'
						pilihan += '<tr class="jadwalll"><td><div class="jdwl" id="a'+result[i].idjadwal+'"></div></td></tr>';
						getDate(result[i].idjadwal);
					}
					$('#jadwall').html(pilihan);
				}
				});
			}
		function getDate(id){
			console.log(id);
				$.ajax({							
					type:'POST',
					url:'<?php echo base_url()."index.php/DetailStudio/fetch_jam?idjadwal="?>'+id,
					dataType: 'json',
					success: function(results){
						pil = "";
						for (var j = 0; j < results.length; j++) {
							pil += '<button class="jamtayang" value="">'+ results[j].jam +'</button>';
						}
						$('#a'+id).html(pil);
					}
				})
			}	
		var i;
		var k;
		var x = document.getElementsByClassName("tanggal");
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
	<?php
			foreach($filmm->result_array() as $film):
				$judul = $film['judulfilm'];
				$score = $film['score'];
				$durasi = $film['durasi'];
				$usia = $film['usia'];
				$tanggal = $film['tanggal'];
				$genre = $film['genre'];
				$sutradara = $film['sutradara'];
				$penulis = $film['penulis'];
				$pemeran = $film['pemeran'];
				$url = $film['url'];
				$trailer = $film['urltrailer'];
				$banner = $film['urlbanner'];
				$jurnal = $film['jurnal'];
				$sinopsis = $film['sinopsis']; 
	?>
	<div class="container" style="min-width: 800px;">
		<div class="row">
			<div class="col-sm-12">
				<center><img style="content: url(<?php echo $film['urlbanner']; ?>); animation: fadeEffect 1.5s;" width="950px"></center>
			</div>
		</div>
		<center><div class="row" style="width: 950px; height: 80px; animation: fadeEffect 1.5s;">
			<div class="col-sm-12" style="background-color: white;">
				<h3 style="float: left; display: inline; line-height: 80px; margin-left: 15px;"><?php echo $judul; ?></h3>
				<table style="float: right; line-height: 80px; border-collapse: separate; border-spacing: 20px 0px;">
					<tr>
						<td>
							<img src="<?php echo base_url() ?>assets/image/imdb.png" width="50px;"> <?php echo $score ?>/10
						</td>
						<td>
							<span style="background-color: #B22222; color: white; padding: 10px; border-radius: 8px;"><?php echo $durasi ?> Minutes</span>
						</td>
						<td>
							<span style="background-color: #006aaf; color: white; padding: 10px; border-radius: 8px;"><?php echo $usia ?>+</span>
						</td>
					</tr>
				</table>			
			</div>
		</div></center>
			<center><div class="row" style="margin-top: 60px; width: 950px; height: 80px; background-color: #B22222; border-top-left-radius: 40px; border-top-right-radius: 40px;">
				<div class="col-sm-12">
					<h3 id="submenux">TENTANG FILM</h3>
				</div>
			</div></center>
			<center><div class="row" style="width: 950px; min-height: 80px;  border-top-style: solid; border-top-color: gold;">
				<div class="col-sm-3" style="background-color: white; padding: 20px;">
					<img style="content: url(<?php echo $url ?>); width:200px; height:300px; float: left;">
				</div>
				<div class="col-sm-5" style="background-color: white; padding: 20px;">					
					<h4 style="float: left;">Sinopsis</h4>
					<p style="float: left; text-align: justify;"><?php echo $sinopsis ?></p>
					<a href="" data-toggle="modal" data-target="#trailer" style="float: left;"><button class="btn btn-primary">Lihat Trailer</button></a>
				</div>
				<div class="col-sm-4" style="background-color: #B22222; padding: 0px 20px;">
					<table style="float: left; color: white; border-collapse: separate; border-spacing: 0px 20px;">
						<tr>
							<td><span style="font-weight: bold;">Tanggal Release</span><br><?php echo $tanggal ?></td>
						</tr>
						<tr>
							<td><span style="font-weight: bold;">Jenis Film</span><br><p><?php echo $genre ?></p></td>
						</tr>
						<tr>
							<td><span style="font-weight: bold;">Director</span><br><?php echo $sutradara ?></td>
						</tr>
						<tr>
							<td><span style="font-weight: bold;">Penulis</span><br><?php echo $penulis ?></td>
						</tr>
						<tr>
							<td><span style="font-weight: bold;">Cast</span><br><?php echo $pemeran ?></td>
						</tr>
					</table>
				</div>
			</div></center>		
		<center><div class="row" id="kota">
			<div class="col-sm-5">
				<h3 id="kotaH">KOTA & TEATER</h3>
			</div>
			<div class="col-sm-7" style="float: left;">
				<form>
					<table style="border-spacing: 10px 1px;">
						<tr>
							<td>
								<label>Pilih Kota</label><br>
							</td>
							<td>
								<label>Pilih Teater</label><br>
							</td>
						</tr>
						<tr>
							<td>
								<select onchange="getStudio()" id="kotaS">
				                  <option selected="true" disabled>Pilih Kota</option>
				                  <?php 
				                  	foreach ($studio->result_array() as $teater) :
				                  		$kota = $teater['kota'];
				                  ?>
				                  <option value="<?php echo $kota; ?>"><?php echo $kota; ?></option>
				                  <?php endforeach; ?>
				                </select>
							</td>
							<td>
								<select name="" id="kotaT">
				                  <option selected="true" disabled>Pilih Studio</option>
				                </select>
							</td>
							<td>
								<button id="" onclick="getTanggal()" class="btn-primary" type="button" name="" style="background-color: #DA272B; border:none;margin: 0;height: 30px;box-shadow: none;border: none; text-shadow: none;background-repeat: repeat-x;min-width: 50px;border-radius: 10px;">Go!</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div></center>
		<center><div class="row" style="background-color: #B22222; color: white; height: 90px; width: 950px; border-bottom-color: gold; border-bottom-style: solid;">
			<div class="col-sm-12">
				<center><table style="border-spacing: 10px 0px; height: 80px;">
					<tr id="target">
						<td><h5 style="padding-right: 15px;">JADWAL FILM</h5></td>
				</table></center>
			</div>
		</div></center>
		<center><div class="row" style="min-height: 300px;width: 950px;">
			<div class="col-sm-12 movie" style="background-color: white; color: black;">
				<table  id="jadwall" style="margin-top: 20px;">
					
				</table>
			</div>			
		</div></center>
		<CENTER><div class="row" style="margin-top: 60px; width: 950px; height: 80px; background-color: #B22222; border-top-left-radius: 40px; border-top-right-radius: 40px;">
			<div class="col-sm-12">
				<h3 id="submenux">JURNAL INDICINEMA</h3>
			</div>
		</div></CENTER>
		<center><div class="row" style="width: 950px; min-height: 350px;  border-top-style: solid; border-top-color: gold;   margin-bottom: 100px;">
			<div class="col-sm-12" style="background-color: white; padding: 20px;">
				<h4 style="margin: 0 auto;">Review Film</h4><br>
				<p style="float: left; text-align: justify;"><?php echo $jurnal ?></p>
			</div>
		</div></center>
	</div>
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
	<div class="modal fade" id="trailer" role="dialog" style="position: fixed;">
    <div class="modal-dialog modal-dialog-centered">      
     	<div class="modal-content" style="width: 1000px;">
        	<div class="modal-header">
	        	<h4 class="modal-title" style="float: left;">Trailer</h4>
	          	<button type="button" aria-hidden="true" class="close" data-dismiss="modal" style="float: right;">&times;</button>          
        	</div>
	        <div class="modal-body">
	          	<center><iframe id="cartoonVideo" width="800" height="500" src="<?=$film['urltrailer'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
	        </div>
      </div>
    </div>     
   </div>
   <script type="text/javascript">
	$(document).ready(function(){
	    /* Get iframe src attribute value i.e. YouTube video url
	    and store it in a variable */
	    var url = $("#cartoonVideo").attr('src');
	    
	    /* Assign empty url value to the iframe src attribute when
	    modal hide, which stop the video playing */
	    $("#trailer").on('hide.bs.modal', function(){
	        $("#cartoonVideo").attr('src', '');
	    });
	    
	    /* Assign the initially stored url back to the iframe src
	    attribute when modal is displayed again */
	    $("#trailer").on('show.bs.modal', function(){
	        $("#cartoonVideo").attr('src', url);
	    });
	});
	</script><?php endforeach; ?>
	<style type="text/css">
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
	    .nama{
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
	    .nama:hover {
	      opacity: 1.0;
	      text-decoration: none;
	      color: #535353;
	    }
		#submenux{
	      text-align: center;
	      line-height: 80px;
	      color: white;
	    }
	    .gambar1{
		  height: 20px;
		  display: inline-block;
		}
		#kota{
			border-top-color: gold;
			border-top-style: solid;
			border-bottom-color: gold;
			border-bottom-style: solid;
			height: 90px; 
			margin-top: 60px;
			background-color: white; 
			width: 950px;
			border-top-left-radius: 40px; 
			border-top-right-radius: 40px;
			padding-top: 10px;
		}

		#kotaH{
			font-size: 31.5px;
			font-weight: normal;
			line-height: 80px;
			float: left;
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
		    background: transparent;
		    color: white;
		    border:none;
		    padding-bottom: 3px;
		    font-size: 20px;
		    display: none;
		}
		.tanggal:hover{
		    color: #be8e4c;
		    text-decoration: none;
		}
		#jadwall{
            border-spacing: 10px 20px;
            float: left;
	    }
	    .jadwalll{
	    	vertical-align: top;
	    }
	    .star{
	    	height: 20px;
	    	float: left;
	    	margin-top: 5px;
	    }
	    @keyframes fadeEffect {
	      from {opacity: 0;}
	      to {opacity: 1;}
	    }
	</style>
</body>
</html>