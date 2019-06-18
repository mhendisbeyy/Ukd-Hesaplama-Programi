<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Ukd Hesaplama</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="ccontainer-fluid">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 border border-primary mt-3">
      <h3>baslık</h3>
  <form action="#"  method="post">
    <div class="form-group form-inline">
      <label class="form-control-label" for="ukdoyuncu"><b>Oyuncu UKD&nbsp;:</b></label>
      <input type="text" name="ukdoyuncu" id="ukdoyuncu" class="form-control ml-1 border border-primary" placeholder="oyuncu ukd giriniz">
    </div>
    <div class="form-group form-inline">
      <label class="form-control-label" for="ukdoyuncu"><b>Rakip UKD&nbsp;&nbsp;&nbsp;&nbsp;:</b></label>
      <input type="text" name="ukdoyuncu" id="ukdoyuncu" class="form-control ml-1 border border-primary" placeholder="oyuncu ukd giriniz">
    </div>
    <div class="form-group form-inline">
      <label class="form-control-label" for="ukdoyuncu"><b>Sonuç&nbsp; <b class="ml-5">:</b></b></label>
      <select id="heard" class="form-control ml-1 border border-primary" name="sonuc" required>
                  <option value="1" >1</option>
                  <option value="0,5" >0,5</option>
                  <option value="0" >0</option>
                
      </select>
    </div>
             
    <div class="form-group ">
              <div align="left" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 ml-5">
                <button type="submit" name="ukdhesapla" class="btn btn-primary">Hesapla</button>
                <button type="submit" name="ukdsifirla" class="btn btn-primary">Sıfırla</button>
              </div>
    </div>
<div class="">
  <h5>MAÇ ÖNCESİ UKD</h5>
  <span>Oyuncu UKD&nbsp;: </span>
  <span>Rakip UKD&nbsp;&nbsp;&nbsp;: </span>

  
</div>



  </form>


    </div>
    <div class="col-md-3"></div>
  </div>
  
</div>

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>