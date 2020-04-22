  <br>
  <br>
  <div>
  <div>      
       <?php 
          foreach ($program->result_array() as $promo) :
            $nama = $promo['namaprogram'];
            $deskripsi = $promo['deskripsi'];
            $gambar = $promo['urlbanner'];
            $idp = $promo['idprogram'];
        ?>
        <h3 class="submenux"><?php echo $nama; ?></h3>
        <br>
        <div class="container" style="">
          <div class="row">
            <div class="col-lg-12 bann">
              <center><img style="content: url(<?php echo $gambar; ?>); animation: fadeEffect 1.5s;"width="100%"></center>
            </div>
            <div class="col-lg-12 konten1">
              <span class="kontext">
                <?php echo $deskripsi; ?>
              </span>
            </div>
          </div>
        </div><br>
        <?php endforeach; ?>
  <footer>
  <div class="container-fluid" style="margin-top: 50px; background-color: #ffffff;">
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

</div>

</div>
<script type="">
  function start(){};
</script>
  <style type="text/css">
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
        padding-left:0px; 
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
    .bann{
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
    }
    .konten{
      background: white;
      width: 100%;
      height: 100px;
      border-top-color: gold;
      border-top-style: solid;
      border-bottom-color: gold;
      border-bottom-style: solid;
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
      margin-bottom: 10px;
      min-height: 300px;
      width: 97%;
      border-top-color: gold;
      border-top-style: solid;
      border-bottom-color: gold;
      border-bottom-style: solid;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
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
      color: black;
      padding-top: 50px;
      font-size: 15px;

    }
</style>
</body>
</html>