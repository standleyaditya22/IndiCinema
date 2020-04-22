	<div class="container-fluid" style="margin-top: 100px;">
	  <center><div class="row" style="width: 1150px; height: 100px;">
	    <div class="col-sm-12">
	      <h3 class="submenux st">SEDANG TAYANG</h3>
	      <h3 class="submenux sd">SEGERA TAYANG</h3>
	    </div>
	  </div></center>
	  <center><div class="row contentFilm" style="">
	    <div class="col-lg-12  st">
	        <div style="width: 100%; min-height: 500px; padding: 20px 30px;">
	        <ul>
	          <?php
	            foreach($sedang->result_array() as $data_tayang):
	              $poster = $data_tayang['url'];
	              $judul = $data_tayang['judulfilm'];
	              $id = $data_tayang['idfilm'];
	              $i = 0;
	                if ($i != 4) { ?>
	              	<li class="aaa">
			            <div>
			              <a href="<?php echo base_url() ?>index.php/DetailFilm/getfilm?id1=<?php echo $id; ?>&nama=<?php echo $judul;?>" class="posterr"><img class="posterfilm" style="content: url(<?php echo $poster ?>);" width="200px"></a>
			            </div>
			          </li>
	                <?php $i = $i+1; } else { ?>
	               	<li class="aaa">
					    <div>
					        <a href="<?php echo base_url() ?>index.php/DetailFilm/getfilm?id1=<?php echo $id; ?>&nama=<?php echo $judul;?>" class="posterr"><img class="posterfilm" style="content: url(<?php echo $poster ?>);" width="200px"></a>
					    </div>
					</li><br>
					<?php $i = 0; }; ?>
	          <?php endforeach; ?>
	        </ul>
	        </div>
	        <button class="buttonnext" id="page1" onclick="segeraTayang()">Segera Tayang <i class='fas fa-angle-double-right'></i></button>
	    </div>
	    <div class="col-lg-12 sd">
	        <div style="width: 100%; min-height: 500px; padding: 20px 30px;">
	        <ul>
	          <?php
	            foreach($nanti->result_array() as $row):
	              $poster = $row['url'];
	              $judul = $row['judulfilm'];
	              $id = $row['idfilm'];
	              $j = 0;
	                if ($j != 4) { ?>
	              	<li class="aaa">
			            <div>
			              <a href="<?php echo base_url() ?>index.php/DetailFilm/getfilm?id1=<?php echo $id; ?>&nama=<?php echo $judul;?>" class="posterr"><img class="posterfilm" style="content: url(<?php echo $poster ?>);" width="200px"></a>
			            </div>
			          </li>
	                <?php $j = $j+1; } else { ?>
	               	<li class="aaa">
					    <div>
					        <a href="<?php echo base_url() ?>index.php/DetailFilm/getfilm?id1=<?php echo $id; ?>&nama=<?php echo $judul;?>" class="posterr"><img class="posterfilm" style="content: url(<?php echo $poster ?>);" width="200px"></a>
					    </div>
					</li><br>
					<?php $j = 0; }; ?>
	          <?php endforeach; ?>
	        </ul>
	        </div>
	        <button class="buttonnext" id="page2" onclick="sedangTayang()"><i class='fas fa-angle-double-left'> Sedang Tayang </i></button>
	    </div>
	  </div></center>
	</div>
	<footer>
	<div class="container-fluid" style="margin-top: 200px; background-color: #ffffff;">
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
		function sedangTayang(){
			var x = document.getElementsByClassName("st");
			var y = document.getElementsByClassName("sd");
			for (j = 0; j < x.length; j++) {
		      x[j].style.display = "block";
		    }
		    for (j = 0; j < y.length; j++) {
		      y[j].style.display = "none";
		    }
		}
		function segeraTayang(){
			var x = document.getElementsByClassName("st");
			var y = document.getElementsByClassName("sd");
			for (j = 0; j < x.length; j++) {
		      x[j].style.display = "none";
		    }
		    for (j = 0; j < y.length; j++) {
		      y[j].style.display = "block";
		    }
		}
	</script>
	<style type="text/css">
		#page1{
			float: right;			
		}
		#page2{
			float: left;			
		}
		.buttonnext{
			font-size: 18px;
			color: #be8e4c;
			background: transparent;
			border:none;
			font-family: 'Goudy Bookletter 1911', serif;
		}
		.sd{
			display: none;
		}
		.contentFilm{
	      margin-top: 30px; width: 1150px; min-height: 450px; border-top-style: solid; border-top-color: #be8e4c;
	      border-bottom-style: solid; border-bottom-color: #be8e4c; padding-bottom: 30px;
	    }
	    .submenux{
	      color: #be8e4c; font-family: 'Goudy Bookletter 1911', serif;
	      text-align: center;
	      font-size: 50px;
	      line-height: 100px;
	      text-shadow: 2px 2px 4px rgb(0,0,0);
	      animation: fadeEffect 1s;
	    }
		#submenux{
	      text-align: center;
	      line-height: 80px;
	      color: white;
	    }
	    .tab button {
		  background-color: inherit;
		  color: white;
		  font-size: 20px;
		  font-weight: bold;
		  border: none;
		  outline: none;
		  cursor: pointer;
		  padding: 14px 16px;
		  transition: 0.3s;
		  font-family: 'Titillium Web', sans-serif;
		  line-height: 52px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		  color: grey;
		}

		/* Create an active/current tablink class */
		.tab button.active {
			color: grey;
		}
		/* Style the tab content */
		.tabcontent {
		  display: none;
		  animation: fadeEffect 1s;
		}
		@keyframes fadeEffect {
		  from {opacity: 0;}
		  to {opacity: 1;}
		}
		.aaa{
			  display: inline-block;	
		      margin-left: 20px;
		      animation: fadeEffect 1s;
		}
		.posterfilm {
	      border-radius: 20px; 
	      margin-top: 40px;
	      margin-bottom: 10px;  
	      width: 200px;
	      height: 300px;
	    }
	    .btnn{
		  background-color: #B22222; 
		  border-radius: 20px;
		}
		#kontenn{ 
			background-color: white; 
			width: 950px;
			min-height: 550px;
			padding-top: 20px;
			margin-bottom: 80px;			
		 	padding-bottom: 20px;
		}
		.gambar1{
	      height: 20px;
	      display: inline-block;
	    }
	    .posterr{

	    }
	    .posterr:hover{
	    	opacity: 0.7;
	    }
	    .nav a.active{
	    	color: #535353;
	    }
	</style>
</body>
</html>