<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=0.2">
	<title><?php echo $judul; ?></title>
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
	    table {
		  border-collapse: separate;		  
		}​​​​​​​​​​​​​			    
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
	      border-top-color: gold;
	      border-top-style: solid;
	      border-bottom-color: gold;
	      border-bottom-style: solid;
	      border-width: 2px;
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
	    .asd {
	      margin-top: 20px;
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

	    }
	    .tanggal:hover{
	    	color: gold;
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
	    .nav a.active{
	    	color: #535353;
	    }
	</style>
</head>
<body>
	<header>
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-lg-12 navi">
	        <div class="navbar nav1">
	        <nav>
	          <ul class="nav" >        
	            <li class="nav-item asd">
	              <a class="nama" href="<?php echo base_url() ?>index.php/Pages/nontonYuk">NONTON YUK!</a>
	            </li>
	            <li class="nav-item asd">
	              <a class="nama" href="<?php echo base_url() ?>index.php/Pages/teater">TEATER</a>
	            </li>
	            <li class="nav-item" id="gambar" style="margin-top: 10px; margin-left: 10px">
	              <a href="<?php echo base_url() ?>index.php"><img  src="<?php echo base_url() ?>assets/image/logoresize.png" ></a>
	            </li>
	            <li class="nav-item asd">
	              <a class="nama" href="<?php echo base_url() ?>index.php/Pages/program">PROGRAM</a>
	            </li>
	            <li class="nav-item asd">
	              <a href="<?php echo base_url() ?>index.php/Pages/tentang" class="nama">TENTANG KAMI</a>
	            </li>
	            <li class="nav-item asd">
	            <div class="search-container">
		            <form action="/action_page.php">
				      <input type="text" placeholder="Cari Film.." name="search">
				      <button type="submit"><i class="fa fa-search"></i></button>
				    </form>
	            </div>	              
	            </li> 
	          </ul>  
	           
	        </nav>
	        
	      </div>

	      </div>
	    </div>      
	  </div>
	</header>
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
				<center><img style="content: url(<?php echo $film['urlbanner']; ?>);" width="950px"></center>
			</div>
		</div>
		<center><div class="row" style="width: 950px; height: 80px;">
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
</body>
</html>