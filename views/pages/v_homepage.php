<script>
  function getMovie(){
    var id = document.getElementById("teater").value;
    $.ajax({
      type:'POST',
      url:'<?php echo base_url()."index.php/Pages/fetch_film?idStudio="?>'+id,
      dataType: 'json',
      success: function(result){
        console.log(result);
        var pilihan='';
        pilihan += '<option value="">Pilih Film</option>';
        for (var i = 0; i < result.length; i++) {
          pilihan += '<option value="'+ result[i].idfilm +'">'+ result[i].judulfilm +'</option>';
        }
        $('#film').html(pilihan);
      }
    });
  }
  function getJam(){
    var idteater = document.getElementById("teater").value;
    var idfilm = document.getElementById("film").value;
    $.ajax({
      type:'POST',
      url:'<?php echo base_url()."index.php/Pages/fetch_jam?idteater="?>'+idteater+'&idfilm='+idfilm,
      dataType: 'json',
      success: function(result){
        console.log(result);
        var pilihan='';
        pilihan += '<option value="">Pilih Tanggal</option>';
        for (var i = 0; i < result.length; i++) {
          pilihan += '<option value="'+ result[i].idjadwal +'">'+ result[i].tanggal +'</option>';
        }
        $('#jam').html(pilihan);
      }
    });
  }
</script>
<div class="container-fluid" style="min-height: 490px; width: 100%; margin-top: 30px; margin-bottom: 30px;">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for($i=0; $i < count($carousel); $i++){?>
            <?php if($i == 0){$active = 'active';}else{$active = '';}?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php echo $active;?>"></li>
            <?php if($i>3){ break;}}?>
        </ol>

        <div class="carousel-inner">
          <?php $count=0;
            foreach($carousel as $data_carousel):
              $count++;
              $id = $data_carousel['id'];
              $nama = $data_carousel['nama'];
              $gambar = $data_carousel['gambar'];
              $deskripsi = $data_carousel['detail'];
              $keterangan = $data_carousel['keterangan'];
              if ($count==1){
                $class = 'active';
              }
              else{
                $class = '';
              }
          ?>
           
          <div class="carousel-item <?php echo $class?>"> 
             <center><img class="first-slide img-responsive poster" src="<?= $gambar ?>"alt="First slide"></center>
              <div class="carousel-caption text-left" id="carousel-caption" style="margin-left: auto; margin-right: auto; width: 950px; height: 50%;">
                <h1><?php echo $nama?></h1><br>
                <p><?php echo $deskripsi?></p><br>
                <!-- <a class="" href="dilan1991.php" role="">Baca Lebih Lanjut</a> -->
              </div>
          </div>
          <?php if ($count==5) {
          break; }
          endforeach; ?>

          <!-- <div class="carousel-item">
            <center><img class="second-slide img-responsive poster" src="<?php echo base_url() ?>assets/image/terlalutampan.jpg" alt="Second slide"></center>            
              <div class="carousel-caption text-left" id="carousel-caption" style="margin-left: auto; margin-right: auto;  width: 950px; height: 50%;">
               <h1>Terlalu Tampan</h1><br>
                <p>Director: Sabrina Rochelle Kalangie<br>Writers: Nurita Anandia W, Sabrina Rochelle Kalangie<br><br>Witing Tresno Jalaran Soko Kulino alias KULIN (Ari Irham). Selama belasan tahun, Kulin yang terlahir terlalu tampan menghindari masuk ke sekolah reguler dan memilih menghabiskan hampir 100% hidupnya di dalam rumah...</p>
                <a class="" href="#" role="">Baca Lebih Lanjut</a>
              </div>
          </div>
          <div class="carousel-item">
            <center><img class="third-slide img-responsive poster" src="<?php echo base_url() ?>assets/image/gundala.jpg" alt="Third slide"></center>
              <div class="carousel-caption text-left" id="carousel-caption" style="margin-left: auto; margin-right: auto;  width: 950px; height: 50%;">
                <h1>Gundala (2019)</h1><br>
                <p>Director: Joko Anwar<br>Writer: Joko Anwar<br><br>Kerja keras penelitian dan eksperimen yang dilakukan oleh ilmuwan terkemuka Ir. Sancoko (Teddy Purba) untuk menciptakan serum anti-petir membuahkan hasil luar biasa dan membuat tubuhnya menjadi tahan terhadap arus listrik.</p>
                <a class="" href="#" role="">Baca Lebih Lanjut</a>
            </div>
          </div> -->
    </div>
  </div>
</div>
  
<br>
<div class="container-fluid" id="konten">
<div class="row content all-over quick-links">
  <div class="quick-links-container" class="container" style="padding: 15px 0px; margin: 0px auto;">
    <div class="row">
      <div class="span2" style="width: 140px;">
        <h3 style="color: #B22222; margin: 8px 45px 0 60px;line-height: 28px;text-align: center; font-weight: normal;font-size: 31.5px;">Mau Nonton?</h3>
      </div>
      <div class="span10" style="width: 780px;">
        <form method="post" accept-charset="utf-8" action="<?php echo base_url() ?>index.php/Pages/pesan">
          <div class="row" style="margin-left: 60px; color: #B22222;">
            <div class="span3" style="width: 220px;">
              <label style="vertical-align: top;padding-top: 5px ;display: block;margin-bottom: 5px;">Ya, saya mau ke</label>
              <div class="selectpicker select-icon-select" style="background-color: #fff;background-image: none;border: 1px solid #a6a6a6;border-radius: 5px;width: 200px;height: 28px;margin-right: 6px;overflow: hidden;vertical-align: middle;position: relative;">
                <select id="teater" onchange="getMovie()" name="teater" style="background: transparent; border: 0;width: 200px;line-height: 1.1 font-size: 13px;height: 28px;" value="">
                  <option selected="true" disabled>Pilih Studio</option>
                  <?php  
                    foreach ($studio->result_array() as $studioo) :
                      $teaterini = $studioo['namatheater'];
                      $idtheater = $studioo['id_theater'];                    
                  ?>
                  <option value="<?php echo $idtheater; ?>"><?php echo $teaterini; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="span3" style="width: 220px;">
              <label style="vertical-align: top;padding-top: 5px ;display: block;margin-bottom: 5px;">
                Untuk Melihat 
              </label>
              <div class="selectpicker select-icon-select" style="background-color: #fff;background-image: none;border: 1px solid #a6a6a6;border-radius: 5px;width: 200px;height: 28px;margin-right: 6px;overflow: hidden;vertical-align: middle;position: relative;">
                <select onchange="getJam()" id="film" name="film" style="background: transparent; border: 0;width: 200px;line-height: 1.1 !important;font-size: 13px;height: 28px;" value="">
                  <option selected="true" disabled>Pilih Film</option>
                </select>
              </div>              
            </div>
            <div class="span3" style="width: 220px;">
              <label style="vertical-align: top;padding-top: 5px ;display: block;margin-bottom: 5px;">
                Pada Tanggal
              </label>
              <div class="selectpicker select-icon-select" style="background-color: #fff;background-image: none;border: 1px solid #a6a6a6;border-radius: 5px;width: 200px;height: 28px;margin-right: 6px;overflow: hidden;vertical-align: middle;position: relative;">
                <select id="jam" name="tanggal" style="background: transparent; border: 0;width: 200px;line-height: 1.1 !important;font-size: 13px;height: 28px;">
                  <option selected="true" disabled>Pilih Tanggal</option>
                </select>
              </div>              
            </div>   
            <div class="span1" style="width: 60px;">
              <input type="submit" value="GO!" class="btn-primary disabled" style="background-color: #be8e4c; border:none;margin: 0;height: 30px;box-shadow: none;border: none; text-shadow: none;background-repeat: repeat-x;min-width: 50px;margin-top:32px; border-radius: 10px;">              
            </div>         
          </div>  
        </form>
        
      </div>
    </div>
  </div>
  
</div>
</div>
<br>
<div class="container-fluid" style="margin-top: 100px;">
  <center><div class="row" style="width: 1150px; height: 100px;">
    <div class="col-sm-12">
      <h3 class="submenux">SEDANG TAYANG</h3>
    </div>
  </div></center>
  <center><div class="row contentFilm" style="">
    <div class="col-lg-12">
        <input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="float: left; margin-top: 200px;" onclick="prev1()">
        <input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="transform: rotate(180deg); float: right; margin-top: 200px;" onclick="next1()">
        <div style="width: 100%; height: 500px; padding: 0;">
        <center><ul style="">
          <?php
            foreach($sedang->result_array() as $data_tayang):
              $poster = $data_tayang['url'];
              $id = $data_tayang['idfilm'];
              $judul = $data_tayang['judulfilm'];
          ?>
          <li class="aaa">
            <div>
              <img class="posterfilm" style="content: url(<?php echo $poster ?>);" width="200px"><br>
              <a href="<?php echo base_url() ?>index.php/DetailFilm/getfilm?id1=<?php echo $id; ?>&nama=<?php echo $judul;?>"><button class="btn-danger btnn" style="">Lihat jadwal</button></a>
            </div>
          </li>
          <?php endforeach; ?>
        </ul></center>
        </div>
    </div>
  </div></center>
</div>

<div class="container-fluid" style="margin-top: 100px;" >
  <center><div class="row" style="width: 1150px; height: 100px;">
    <div class="col-sm-12">
      <h3 class="submenux">AKAN DATANG</h3>
    </div>
  </div></center>
  <center><div class="row contentFilm" style="">
    <div class="col-lg-12">
        <input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="float: left; margin-top: 200px;" onclick="prev2()">
        <input type="image" src="<?php echo base_url() ?>assets/image/arr.png" width=50px; style="transform: rotate(180deg); float: right; margin-top: 200px;" onclick="next2()">
        <div style="width: 100%; height: 500px;">
        <ul style="">
          <?php
            foreach($nanti->result_array() as $data_nanti):
              $poster2 = $data_nanti['url'];
              $id2 = $data_nanti['idfilm'];
          ?>
          <li class="aaaa">
            <div>
              <img class="posterfilm" style="content: url(<?php echo $poster2 ?>);" width="200px"><br>
              <a href="<?php echo base_url() ?>index.php/DetailFilm/getfilm2?id1=<?php echo $id2; ?>"><button class="btn-danger btnn" style="">Lihat Informasi</button></a>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
        </div>
    </div>
  </div></center>
</div>
<br>
<br>
<div class="container-fluid">
  <center><div class="row" style="width: 1150px; height: 100px; margin-top: 100px;">
    <div class="col-sm-12">
      <h3 class="submenux">PROMO & MEDIA SOSIAL</h3>
    </div>
  </div>
  <div class="row" style="width: 1150px; margin-top: 30px;">
    <div class="col-lg-12" id="promo">    
      <table  style="border-spacing: 40px 20px; float: left;">
        <tr>
        <td style="vertical-align: text-top;">
            <div id="twitter">
            <h5 style="color: black; font-family: 'Arvo', serif;">TWITTER INDICINEMA</h5>            
            <a class="twitter-timeline" href="https://twitter.com/indicinemaBdg?ref_src=twsrc%5Etfw" data-width="300" data-height="252" data-chrome="nofooter noborders">Tweet oleh indicinemaBdg</a><a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </a>
          </div>
        </td>
          <td style="vertical-align: text-top;">
            <div class="promo1">
              <center><h5 style="color: black; font-family: 'Arvo', serif;">PROMO HARI INI</h5></center>
              <a href="#" class="promot"><img style="display: inline; height: 200px;" src="<?php echo base_url() ?>assets/image/promo1.jpg"></a>
              <a href="#" class="promot"><img style="display: inline; height:200px;" src="<?php echo base_url() ?>assets/image/promo2.jpg"></a>
              <a href="#" class="promot"><img style="display: inline; height:200px;" src="<?php echo base_url() ?>assets/image/promo2.jpg"></a>
          </div>
        </td>
      </tr>
      </table>
    </div>
  </div></center>
</div>
  
    <div class="col-md-12">

    </div>
  </div>  
</div>
<br>

<footer>
<div class="container-fluid" style="margin-top: 100px; background-color: #ffffff;">
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
<script>
  var i;
  var ii;
  var k;
  var kk;
  var x = document.getElementsByClassName("aaa");
  var xx = document.getElementsByClassName("aaaa");
  function start(){
    if (x.length < 4){
      for (j = 0; j < x.length; j++) {
        x[j].style.display = "inline-block";
      }
    }
    else {
      for (j = 0; j < 4; j++) {
        x[j].style.display = "inline-block";
        k = 3;
        i = 0;
      }
    }
    if (xx.length < 4){
      for (j = 0; j < xx.length; j++) {
        xx[j].style.display = "inline-block";
      }
    }
    else {
      for (j = 0; j < 4; j++) {
        xx[j].style.display = "inline-block";
        kk = 3;
        ii = 0;
      }
    }    
  }
  function next1(){
    if (x.length > 4){
      if (k+1 < x.length){
        x[i].style.display = "none";
        k = k+1;
        i = i+1;
        for (j = i; j <= k; j++){
          x[j].style.display = "inline-block";
        }
      }
      else if (k+1 >= x.length){
        for (j = 0; j < 4; j++) {
          x[j].style.display = "inline-block";
        }
        for (j = 4; j < x.length; j++) {
          x[j].style.display = "none";
        }
        k = 3;
        i = 0;
      }
    }
  }
  function prev1(){
    if (x.length > 4){
      if (i > 0){
        x[k].style.display = "none";
        k = k-1;
        i = i-1;
        for (j = i; j <= k; j++){
          x[j].style.display = "inline-block";
        }
      }
      else if (i <= 0){
        for (j = x.length-4; j < x.length; j++) {
          x[j].style.display = "inline-block";
        }
        for (j = 0; j < x.length-4; j++) {
          x[j].style.display = "none";
        }
        k = x.length-1;
        i = k-3;
      }
    }
  }
  function next2(){
    if (xx.length > 4){
      if (kk+1 < xx.length){
        xx[ii].style.display = "none";
        kk = kk+1;
        ii = ii+1;
        for (j = ii; j <= kk; j++){
          xx[j].style.display = "inline-block";
        }
      }
      else if (kk+1 >= xx.length){
        for (j = 0; j < 4; j++) {
          xx[j].style.display = "inline-block";
        }
        for (j = 4; j < xx.length; j++) {
          xx[j].style.display = "none";
        }
        kk = 3;
        ii = 0;
      }
    }
  }
  function prev2(){
    if (xx.length > 4){
      if (ii > 0){
        xx[kk].style.display = "none";
        kk = kk-1;
        ii = ii-1;
        for (j = ii; j <= kk; j++){
          xx[j].style.display = "inline-block";
        }
      }
      else if (ii <= 0){
        for (j = xx.length-4; j < xx.length; j++) {
          xx[j].style.display = "inline-block";
        }
        for (j = 0; j < xx.length-4; j++) {
          xx[j].style.display = "none";
        }
        kk = xx.length-1;
        ii = kk-3;
      }
    }
  }
</script>
<style type="text/css">
    .film {
      width:250px; 
      background-color: lightgrey; 
      margin-top: 30px; 
      display: inline-block;
      border-radius: 40px;
      margin-right: 10px;
    }
    .posterfilm {
      border-radius: 20px; 
      margin-top: 40px;
      margin-bottom: 10px;  
      width: 200px;
      height: 300px;
    }
    #carousel-caption{    
      top: 0px;
      height: 290px;
      width: 800px;
      background:rgba(0,0,0,0.6);
      padding:10px;
      margin-top: auto;
      margin-left: 256px;
    }
    .poster{
      width: 950px;
      height: 550px;
      margin-left: auto; 
      margin-right: auto;
    }
    .arr {
      float: left;
      margin-top: 200px;
    }
    @keyframes fadeEffect {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    .arr:hover {
      opacity: 0.7;
    }
    .arr2 {
      margin-top: 200px;
      float: right;
    }
    .arr2:hover {
      opacity: 0.7;
    }
    .submenux{
      color: #be8e4c; font-family: 'Goudy Bookletter 1911', serif;
      text-align: center;
      font-size: 50px;
      line-height: 100px;
      text-shadow: 2px 2px 4px rgb(0,0,0);
    }
    .movie{

    }
    .movie:hover{
      opacity: 0.7;
    }
    .card{
      background-color: white;
    }
    .link1{
      color: #DA272B;
    }
    .link1:hover{
      text-decoration: none;
      color: #535353;
    }
    #kentang{
      background-image: linear-gradient(0deg,#DA272B,#C00000,#DA272B);
      color: #FFF;
      border-radius: 10px;
    }
    #idcol{
        border-left: 3px solid #FFFFFF;
    }
    #promo{
      background-color: white;
      height: auto;
      border-top-color: #be8e4c;
      border-top-style: solid;
      border-bottom-color: #be8e4c;
      border-bottom-style: solid;
      padding-top: 20px;
    }
    .scrollbar
    {
      margin-left: 30px;
      float: left;
      height: 200px;
      min-width: 700px;
      max-width: 700px;
      width: auto;
      background-image: linear-gradient(to left,#373737,#373737,#373737,black);
      overflow-y: scroll;
      margin-bottom: 25px;
      border-radius: 7px;
    }

    .force-overflow
    {
      min-height: 450px;
    }
    .uye{
      margin-left: 25px;
      color: white;
      margin-top: 5px;
    }
    .promot1{
      margin-top: 10px;
      margin-left: 10px;
      margin-bottom: 10px;
      color: white;
    }
    .more{
      text-align: right;
    }
    #twitter{
      width: 300px;
      margin-top: 10px;
      margin-left: 20px;
    }
    .gambar1{
      height: 20px;
      display: inline-block;
    }
    #konten{
      background: white;
      width: 100%;
      height: 100px;
      border-top-color: #be8e4c;
      border-top-style: solid;
      border-bottom-color: #be8e4c;
      border-bottom-style: solid;
      border-width: 2px;
    }
    .aaa{
      display: none;
      margin-left: 20px;
      animation: fadeEffect 1s;
    }
    .aaaa{
      display: none;
      margin-left: 20px;
      animation: fadeEffect 1s;
    }
    .btnn{
      background-color: #be8e4c; 
      border-radius: 20px;
      border: none;
      color: white;
    }
    .promot{

    }
    .promot:hover{
      opacity: 0.7;
    }
    .contentFilm{
      margin-top: 30px; width: 1150px; height: 450px; border-top-style: solid; border-top-color: #be8e4c;
      border-bottom-style: solid; border-bottom-color: #be8e4c;
    }
  </style>
</body>
</html>