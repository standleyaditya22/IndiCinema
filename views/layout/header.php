<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<meta name="viewport" content="width=device-width, initial-scale=0.2">
<link href="https://fonts.googleapis.com/css?family=Goudy+Bookletter+1911&display=swap" rel="stylesheet">

<title><?php echo $title;  ?></title>
<script>
    $(document).ready(function(){
      $("#teaterMenu").mouseenter(function(){
        $("#myDropdown").slideDown("fast");
      });
      $("#myDropdown").mouseleave(function(){
        $("#myDropdown").slideUp("slow");
      });
      $("#teaterMenu").click(function(){
        alert("Silahkan Pilih Kota!");
      })
    });
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
    table{
      border-collapse: separate;
    }
    .nav{
      height: 90px;
    }
    .asd{
      margin: 0 auto;
      margin-top: 32px;
      padding: 0;
    }
    #gambar{
      width: 100px;
      height: 100px;
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
    .navbar{
      height: 90px;
    
    }
    .nav1{
      width: 100%;
      padding: 0;
    }
    .navi{
      background-color: white;
      height: 90px;
      margin-top: 30px; 
      border-top-color: #be8e4c;
      border-top-style: solid;
      border-bottom-color: #be8e4c;
      border-bottom-style: solid;
      border-width: 2px;
    }
    nav {
      margin: auto;
      height: 90px;
    }
    .search-container {
      position: absolute;
      float: left;
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
    .nav a.active{
      color: #535353;
    }
    input{}
    input:hover{
      opacity: 0.7;
    }
    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      padding: 20px;
      color: #B22222;
      margin-top: 5px;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd}

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}
    .linkKota{
      display: inline-block;
    }
    .linkKota2{
      display: block;
      float: left;
    }
    #logo{
      
    }
    #logo:hover{
      opacity: 0.7;
    }
    #tods{
      margin: 20px;
    }
</style>

</head>
<body onload="start()">
<header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 navi">
        <div class="navbar nav1">
        <nav>
          <ul class="nav" >        
            <li class="nav-item asd">
              <a class="namamenu align-middle" href="<?php echo base_url() ?>index.php/Pages/nontonYuk?nama=FILM">NONTON YUK!</a>
            </li>
            <li class="nav-item asd">
              <a class="namamenu align-middle" id="teaterMenu" href="#" disabled>TEATER</a>
              <div id="myDropdown" class="container dropdown-content" style="width: 300px;">
                <h6>Pilih Kota</h6>
                <div class="row">
                <?php foreach($studio->result_array() as $data_studio):
                  $kota = $data_studio['kota'];?>
                  <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/DetailStudio?nama=<?php echo $kota; ?>"><?php echo $kota; ?></a>
                  </div>                   
                <?php endforeach; 
                ?>
                </div>
              </div>
            </li>
            <li class="nav-item" id="gambar">
              <a href="<?php echo base_url() ?>index.php" id="logo"><img id="tods" src="<?php echo base_url() ?>assets/image/logoresize.png" ></a>
            </li>
            <li class="nav-item asd">
              <a class="namamenu align-middle" href="<?php echo base_url() ?>index.php/Pages/program?nama=PROGRAM">PROGRAM</a>
            </li>
            <li class="nav-item asd">
              <a class="namamenu align-middle" href="<?php echo base_url() ?>index.php/Pages/tentang" >TENTANG KAMI</a>
            </li>
            <li class="nav-item asd" id="search" style="margin-top: 35px;">
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
