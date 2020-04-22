  <br>
  <br>
  <div class="container" >
    <?php foreach($tod->result_array() as $row) :
            $poster = $row['url'];
            $judul = $row['judulfilm'];
            $durasi = $row['durasi'];
            $tanggal = $row['tanggal'];
            $theater = $row['theater'];
    ?>
    <center><div class="row" id="mainContent">
      <div class="col-lg-2">
        <img style="content: url(<?php echo $poster ?>);" class="posterFilm">
      </div>
      <div class="col-lg-2" style="border-right-style: solid; border-right-color: #be8e4c">
        <h5 style="float: left;"><?php echo $judul; ?></h5>
        <p style="float: left;">Durasi : <?php echo $durasi; ?></p>
      </div>
      <div class="col-lg-8">
        <h4 id="teater"><?php echo $theater; ?></h4>
        <h5 id="tanggalnya"> / <?php echo $tanggal; ?></h5><br><br>
        <label style="float: left; margin-top: 10px;">Pilih Jam :</label><br><br>
      <?php foreach($jam->result_array() as $row2) :
              $jam = $row2['jam'];
              $idJadwal = $row2["idJadwal"];
      ?>     
        <button class="jamtayang" id="jam" value="<?php echo $idJadwal; ?>" onclick="getPesanan('<?php echo $jam ?>')"><?php echo $jam; ?></button>
      <?php endforeach; ?>
      </div>
    </div></center>
  <?php endforeach; ?>
    <center><div class="row" id="target">
    </div></center>
  </div>
  <script>
    function getPesanan(jam){
    var idJadwal = document.getElementById("jam").value;
    console.log(jam);
    $.ajax({
      type:'POST',
      url:'<?php echo base_url()."index.php/Pages/pesanan?idJadwal="?>'+idJadwal,
      dataType: 'json',
      success: function(result){
        console.log(result);
        var pilihan='';
        for (var i = 0; i < result.length; i++) {
          pilihan += '<div class="col-lg-12" id="final">';
          pilihan += '<label>Judul Film : </label>'+ result[i].judulfilm +'<br>';
          pilihan += '<label>Studio     : </label>'+ result[i].theater +'<br>';
          pilihan += '<label>Tanggal    : </label>'+ result[i].tanggal +'<br>';
          pilihan += '<label>Jam        : </label>'+ jam +'<br>';
          pilihan += '<label>Durasi     : </label>'+ result[i].durasi +'<br>';
          pilihan += '<a href="https://wa.me/'+ result[i].telepon +'"><button id="wa">Alihkan ke Whatsapp <img src="<?php echo base_url() ?>assets/image/whatsapp.png" width=30px></button></a>';
          pilihan += '</div>'
        }
        $('#target').html(pilihan);
      }
    });
  }
  </script>
  <br>
  <br>
  <footer>
  <div class="container-fluid" style="position:absolute; bottom: 0; margin-top: 50px; background-color: #ffffff;">
    <div class="row" style="width: 100%; height: 150px;">
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
<script type="">
  function start(){};
</script>
  <style type="text/css">
    @keyframes rolldown {
      from {height: 0px;}
      to {height: 280px;}
    }
    @keyframes fadeEffect {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    #wa{
      background-color: #be8e4c;
      border: none;
      border-radius: 5px;
      color: white;
      padding: 5px;
      width: 200px; 
      font-size: 14px;
      height: 40px;
      float: right;
      animation: fadeEffect 0.6s;
    }
    #target{
      text-align: left;      
      background-color: white;
      width: 600px;
    }
    #final{
      padding-left: 100px;
      padding-right: 100px; 
      padding-top: 25px;
      padding-bottom: 50px;
      height: 280px;    
      animation: rolldown 0.6s;
    }
    #teater{
      display: inline-block;
      float: left;
    }
    #tanggalnya{
      float: left;
      display: inline-block;
      margin: 0;
      margin-left: 5px;
      margin-top: 3px;
      color: #535353;
    }
    #mainContent{
      background-color: white;
      padding: 20px;
      width: 1050px;
      border-top-color: #be8e4c;
      border-top-style: solid;
      border-bottom-color: #be8e4c;
      border-bottom-style: solid;
      border-width: 5px;
    }
    .posterFilm{
      width: 150px;
    }
    .submenux{
      color: #be8e4c; font-family: 'Goudy Bookletter 1911', serif;
      text-align: center;
      font-size: 50px;
      line-height: 100px;
      text-shadow: 2px 2px 4px rgb(0,0,0);
    }
    .gambars{
      width: 100px;
      height: 250px;
      padding: 0;
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
    .link1{
      color: #DA272B;
    }
    .link1:hover{
      text-decoration: none;
      color: #535353;
    }
    #idcol{
        border-left: 3px solid #FFFFFF;

    }
    .force-overflow
    {
      min-height: 450px;
    }
    .more{
      text-align: right;
    }
    .gambar1{
      height: 20px;
      display: inline-block;
    }
    #konten{
      background: white;
      width: 100%;
      height: 100px;
      border-top-color: gold;
      border-top-style: solid;
      border-bottom-color: gold;
      border-bottom-style: solid;
    }
    .konten1{
      background-color: white;
      color: white;
      margin-left: 20%;
      margin-right: 20%;
      margin-top: 10px;
      margin-bottom: 10px;
      min-height: 300px;
      width: auto;
      min-width: 700px;
      padding-bottom: 10px;
      padding-top: 5px;
    }
    .pro{
      margin: auto;
    }
    .gambarpromo{
      position: relative;
      max-height: 250px; width: auto; 
      margin-top: 20px;
    }
    .pro1{
      float: left;       
      margin-left: 40px;
      margin-top: 20px; 
      width: auto; 
      color: #B22222;
      padding: 0;
    }
    .konten2{
      width: 400px; 
      height: 200px;  
      float: left;
      padding: 0;
      text-align: left;
      margin-left: 50px;
    }
    .kontext{
      color: #535353;
    }
    .jamtayang{
    float: left;
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
</style>
</body>
</html>