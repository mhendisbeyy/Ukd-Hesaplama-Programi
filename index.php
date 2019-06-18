<?php 

if(isset($_POST["ukdhesapla"])){
  $goukd=$_POST["ukdoyuncu"];
  $grukd=$_POST["ukdrakip"];
  $gmac=$_POST["gmacsonucu"];
}
if(isset($_POST["ukdsifirla"]))
{
  header("Location:");
}
?>

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
      <div class="col-md-4"></div>
      <div class="col-md-4 border border-primary rounded mt-3">
        <div class="ml-5">
         <h3 style=" text-align: center;" class="mt-3 mb-3">Ukd Hesaplama</h3>
         <form action="index.php"  method="post">
          <div class="form-group form-inline">
            <label class="form-control-label" for="ukdoyuncu"><b>Oyuncu UKD&nbsp;:</b></label>
            <input type="number" name="ukdoyuncu" id="ukdoyuncu" min="1000" class="form-control ml-1 border border-primary" placeholder="oyuncu ukd giriniz" value="<?php echo $goukd; ?>" required="">
          </div>
          <div class="form-group form-inline">
            <label class="form-control-label" for="ukdrakip"><b>Rakip UKD&nbsp;&nbsp;&nbsp;&nbsp;:</b></label>
            <input type="number" name="ukdrakip" id="ukdrakip" min="1000" class="form-control ml-1 border border-primary" placeholder="Rakip ukd giriniz" value="<?php echo $grukd;?>" required="">
          </div>

          <div class="form-group form-inline">
            <label class="form-control-label" for="gmacsonucu"><b>Sonuç <b class="ml-5">:</b></b></label>
            <select id="gmacsonucu" class="form-control ml-1 border border-primary" name="gmacsonucu" required>

              <option value="1" <?php echo $gmac == '1' ? 'selected="1"' : ''; ?>>1</option>
              <option value="0.5" <?php echo $gmac == '0.5' ? 'selected="0.5"' : ''; ?>>0.5</option>
              <option value="0" <?php echo $gmac == '0' ? 'selected="0"' : ''; ?>>0</option>

            </select>
          </div>

          <div class="form-group ">
            <div align="left" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 ml-5">
              <button type="submit" name="ukdhesapla" class="btn btn-primary">Hesapla</button>
              <button type="submit" name="ukdsifirla" class="btn btn-primary">Sıfırla</button>
            </div>
          </div>
          <?php 
          if(isset($_POST["ukdhesapla"])){?>
           <?php 
  error_reporting(E_ALL);//tüm hata gösterimleri açılıyor. 
  set_time_limit(0);//max_execution_time değeri olabilecek en üst değere getirliyor 
  date_default_timezone_set('Europe/London');
  include 'Classes/PHPExcel/IOFactory.php';//kullandığımız kütüphane 
  $inputFileName = 'ukd.xlsx';//işlenecek dosya 
  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName); 
  $excel_satirlar = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);//excel dosyasındaki aktif sekme kullanılıyor 

  $i=0;//sayac 
  foreach($excel_satirlar as $excel_satir)
    { //foreach

      $veri_1 = $excel_satir['A'];
      $veri_2 = $excel_satir['B']; 
      $veri_3 = $excel_satir['C']; 
      $veri_4 = $excel_satir['D']; 
      $veri_5 = $excel_satir['E']; 
//Oyuncu puanı yüksek ise
      $fark=abs($goukd-$grukd);
      if (($fark)>=$veri_2 and ($fark)<=$veri_3) 
      {
        if ($fark<=350) {

         if($goukd>$grukd)
         {
          if($goukd<=1299)
          {
            if($gmac==1)
            {
             $sonuc=30*($gmac-$veri_4);
           }
           elseif ($gmac==0.5) {
             $sonuc=30*($gmac-$veri_4);
           }
           elseif ($gmac==0) {
            $sonuc=30*($gmac-$veri_4);
          }
        }

          elseif (($goukd>=1300)&($goukd<=1599)) {
            if($gmac==1)
            {
          $sonuc=25*($gmac-$veri_4);
           }
            elseif ($gmac==0.5) {
            $sonuc=25*($gmac-$veri_4);
          }
            elseif ($gmac==0) {
            $sonuc=25*($gmac-$veri_4);
          }

        }
      

      elseif (($goukd>=1600)and($goukd<=1999)) {
        if($gmac==1)
        {
          $sonuc=20*($gmac-$veri_4);
        }
        elseif ($gmac==0.5) {
         $sonuc=20*($gmac-$veri_4);
       }
       elseif ($gmac==0) {
        $sonuc=20*($gmac-$veri_4);
      }
    }
    elseif (($goukd>=2000)and($goukd<=2399)) {
      if($gmac==1)
      {
        $sonuc=15*($gmac-$veri_4);
      }
      elseif ($gmac==0.5) {
        $sonuc=15*($gmac-$veri_4);
      }
      elseif ($gmac==0) {
        $sonuc=15*($gmac-$veri_4);
      }
    }
    elseif ($goukd>=2400) {
      if($gmac==1)
      {
        $sonuc=10*($gmac-$veri_4);
      }
      elseif ($gmac==0.5) {
       $sonuc=10*($gmac-$veri_4);
     }
     elseif ($gmac==0) {
       $sonuc=10*($gmac-$veri_4);
     }
       }//oyuncu

       //rakip
       if($grukd<=1299)
       {
        if($gmac==1)
        {
         $rsonuc=30*(0-$veri_5);
       }
       elseif ($gmac==0.5) {
         $rsonuc=30*(0.5-$veri_5);
       }
       elseif ($gmac==0) {
        $rsonuc=30*(0-$veri_5);
      }
    }
    elseif (($grukd>=1300)and($grukd<=1599)) {
      if($gmac==1)
      {
       $rsonuc=25*(0-$veri_5);
     }
     elseif ($gmac==0.5) {
      $rsonuc=25*(0.5-$veri_5);
    }
    elseif ($gmac==0) {
      $rsonuc=25*(1-$veri_5);
    }

  }

  elseif (($grukd>=1600)and($grukd<=1999)) {
    if($gmac==1)
    {
      $rsonuc=20*(0-$veri_5);
    }
    elseif ($gmac==0.5) {
      $rsonuc=20*(0.5-$veri_5);
    }
    elseif ($gmac==0) {
      $rsonuc=20*(1-$veri_5);
    }
  }
  elseif (($grukd>=2000)and($grukd<=2399)) {
    if($gmac==1)
    {
      $rsonuc=15*(0-$veri_5);
    }
    elseif ($gmac==0.5) {
      $rsonuc=15*(0.5-$veri_5);
    }
    elseif ($gmac==0) {
      $rsonuc=15*(0-$veri_5);
    }
  }
  elseif ($grukd>=2400) {
    if($gmac==1)
    {
      $rsonuc=10*(0-$veri_5);
    }
    elseif ($gmac==0.5) {
     $rsonuc=10*(0.5-$veri_5);
   }
   elseif ($gmac==0) {
     $rsonuc=10*(1-$veri_5);
   }
 }

       //rakip

    }//$goukd>$grukd
    elseif ($goukd<$grukd) {
     if($goukd<=1299)
     {
      if($gmac==1)
      {
       $sonuc=30*($gmac-$veri_5);
     }
     elseif ($gmac==0.5) {
       $sonuc=30*($gmac-$veri_5);
     }
     elseif ($gmac==0) {
      $sonuc=30*($gmac-$veri_5);
    }
  }
  elseif (($goukd>=1300)and($goukd<=1599)) {
    if($gmac==1)
    {
     $sonuc=25*($gmac-$veri_5);
   }
   elseif ($gmac==0.5) {
    $sonuc=25*($gmac-$veri_5);
  }
  elseif ($gmac==0) {
    $sonuc=25*($gmac-$veri_5);
  }

}

elseif (($goukd>=1600)and($goukd<=1999)) {
  if($gmac==1)
  {
    $sonuc=20*($gmac-$veri_5);
  }
  elseif ($gmac==0.5) {
   $sonuc=20*($gmac-$veri_5);
 }
 elseif ($gmac==0) {
  $sonuc=20*($gmac-$veri_5);
}
}
elseif (($goukd>=2000)and($goukd<=2399)) {
  if($gmac==1)
  {
    $sonuc=15*($gmac-$veri_5);
  }
  elseif ($gmac==0.5) {
    $sonuc=15*($gmac-$veri_5);
  }
  elseif ($gmac==0) {
    $sonuc=15*($gmac-$veri_5);
  }
}
elseif ($goukd>=2400) {
  if($gmac==1)
  {
    $sonuc=10*($gmac-$veri_5);
  }
  elseif ($gmac==0.5) {
   $sonuc=10*($gmac-$veri_5);
 }
 elseif ($gmac==0) {
   $sonuc=10*($gmac-$veri_5);
 }
       }//oyuncu
         //rakip
       if($grukd<=1299)
       {
        if($gmac==1)
        {
         $rsonuc=30*(0-$veri_4);
       }
       elseif ($gmac==0.5) {
         $rsonuc=30*(0.5-$veri_4);
       }
       elseif ($gmac==0) {
        $rsonuc=30*(0-$veri_4);
      }
    }
    elseif (($grukd>=1300)and($grukd<=1599)) {
      if($gmac==1)
      {
       $rsonuc=25*(0-$veri_4);
     }
     elseif ($gmac==0.5) {
      $rsonuc=25*(0.5-$veri_4);
    }
    elseif ($gmac==0) {
      $rsonuc=25*(1-$veri_4);
    }

  }

  elseif (($grukd>=1600)and($grukd<=1999)) {
    if($gmac==1)
    {
      $rsonuc=20*(0-$veri_4);
    }
    elseif ($gmac==0.5) {
      $rsonuc=20*(0.5-$veri_4);
    }
    elseif ($gmac==0) {
      $rsonuc=20*(1-$veri_4);
    }
  }
  elseif (($grukd>=2000)and($grukd<=2399)) {
    if($gmac==1)
    {
      $rsonuc=15*(0-$veri_4);
    }
    elseif ($gmac==0.5) {
      $rsonuc=15*(0.5-$veri_4);
    }
    elseif ($gmac==0) {
      $rsonuc=15*(0-$veri_4);
    }
  }
  elseif ($grukd>=2400) {
    if($gmac==1)
    {
      $rsonuc=10*(0-$veri_4);
    }
    elseif ($gmac==0.5) {
     $rsonuc=10*(0.5-$veri_4);
   }
   elseif ($gmac==0) {
     $rsonuc=10*(1-$veri_4);
   }
 }

       //rakip
}


}
else{
 if ($goukd>$grukd) {
   if($goukd<=1299)
   {
    if($gmac==1)
    {
     $sonuc=30*($gmac-0.89);
   }
   elseif ($gmac==0.5) {
     $sonuc=30*($gmac-0.89);
   }
   elseif ($gmac==0) {
    $sonuc=30*($gmac-0.89);
  }

  elseif (($goukd>=1300)and($goukd<=1599)) {
    if($gmac==1)
    {
     $sonuc=25*($gmac-0.89);
   }
   elseif ($gmac==0.5) {
    $sonuc=25*($gmac-0.89);
  }
  elseif ($gmac==0) {
    $sonuc=25*($gmac-0.89);
  }

}
}

elseif (($goukd>=1600)and($goukd<=1999)) {
  if($gmac==1)
  {
    $sonuc=20*($gmac-0.89);
  }
  elseif ($gmac==0.5) {
   $sonuc=20*($gmac-0.89);
 }
 elseif ($gmac==0) {
  $sonuc=20*($gmac-0.89);
}
}
elseif (($goukd>=2000)and($goukd<=2399)) {
  if($gmac==1)
  {
    $sonuc=15*($gmac-0.89);
  }
  elseif ($gmac==0.5) {
    $sonuc=15*($gmac-0.89);
  }
  elseif ($gmac==0) {
    $sonuc=15*($gmac-0.89);
  }
}
elseif ($goukd>=2400) {
  if($gmac==1)
  {
    $sonuc=10*($gmac-0.89);
  }
  elseif ($gmac==0.5) {
   $sonuc=10*($gmac-0.89);
 }
 elseif ($gmac==0) {
   $sonuc=10*($gmac-0.89);
 }
       }//oyuncu
       //rakip
       if($grukd<=1299)
       {
        if($gmac==1)
        {
         $rsonuc=30*(0-0.11);
       }
       elseif ($gmac==0.5) {
         $rsonuc=30*(0.5-0.11);
       }
       elseif ($gmac==0) {
        $rsonuc=30*(0-0.11);
      }
    }
    elseif (($grukd>=1300)and($grukd<=1599)) {
      if($gmac==1)
      {
       $rsonuc=25*(0-0.11);
     }
     elseif ($gmac==0.5) {
      $rsonuc=25*(0.5-0.11);
    }
    elseif ($gmac==0) {
      $rsonuc=25*(1-0.11);
    }

  }

  elseif (($grukd>=1600)and($grukd<=1999)) {
    if($gmac==1)
    {
      $rsonuc=20*(0-0.11);
    }
    elseif ($gmac==0.5) {
      $rsonuc=20*(0.5-0.11);
    }
    elseif ($gmac==0) {
      $rsonuc=20*(1-0.11);
    }
  }
  elseif (($grukd>=2000)and($grukd<=2399)) {
    if($gmac==1)
    {
      $rsonuc=15*(0-0.11);
    }
    elseif ($gmac==0.5) {
      $rsonuc=15*(0.5-0.11);
    }
    elseif ($gmac==0) {
      $rsonuc=15*(0-0.11);
    }
  }
  elseif ($grukd>=2400) {
    if($gmac==1)
    {
      $rsonuc=10*(0-0.11);
    }
    elseif ($gmac==0.5) {
     $rsonuc=10*(0.5-0.11);
   }
   elseif ($gmac==0) {
     $rsonuc=10*(1-0.11);
   }
 }

       //rakip

}
elseif ($goukd<$grukd) {
 if($goukd<=1299)
 {
  if($gmac==1)
  {
   $sonuc=30*($gmac-0.11);
 }
 elseif ($gmac==0.5) {
   $sonuc=30*($gmac-0.11);
 }
 elseif ($gmac==0) {
  $sonuc=30*($gmac-0.11);
}
}
elseif (($goukd>=1300)and($goukd<=1599)) {
  if($gmac==1)
  {
   $sonuc=25*($gmac-0.11);
 }
 elseif ($gmac==0.5) {
  $sonuc=25*($gmac-0.11);
}
elseif ($gmac==0) {
  $sonuc=25*($gmac-0.11);
}

}

elseif (($goukd>=1600)and($goukd<=1999)) {
  if($gmac==1)
  {
    $sonuc=20*($gmac-0.11);
  }
  elseif ($gmac==0.5) {
   $sonuc=20*($gmac-0.11);
 }
 elseif ($gmac==0) {
  $sonuc=20*($gmac-0.11);
}
}
elseif (($goukd>=2000)and($goukd<=2399)) {
  if($gmac==1)
  {
    $sonuc=15*($gmac-0.11);
  }
  elseif ($gmac==0.5) {
    $sonuc=15*($gmac-0.11);
  }
  elseif ($gmac==0) {
    $sonuc=15*($gmac-0.11);
  }
}
elseif ($goukd>=2400) {
  if($gmac==1)
  {
    $sonuc=10*($gmac-0.11);
  }
  elseif ($gmac==0.5) {
   $sonuc=10*($gmac-0.11);
 }
 elseif ($gmac==0) {
   $sonuc=10*($gmac-0.11);
 }
       }//oyuncu
               //rakip
       if($grukd<=1299)
       {
        if($gmac==1)
        {
         $rsonuc=30*(0-0.89);
       }
       elseif ($gmac==0.5) {
         $rsonuc=30*(0.5-0.89);
       }
       elseif ($gmac==0) {
        $rsonuc=30*(0-0.89);
      }
    }
    elseif (($grukd>=1300)and($grukd<=1599)) {
      if($gmac==1)
      {
       $rsonuc=25*(0-0.89);
     }
     elseif ($gmac==0.5) {
      $rsonuc=25*(0.5-0.89);
    }
    elseif ($gmac==0) {
      $rsonuc=25*(1-0.89);
    }

  }

  elseif (($grukd>=1600)and($grukd<=1999)) {
    if($gmac==1)
    {
      $rsonuc=20*(0-0.89);
    }
    elseif ($gmac==0.5) {
      $rsonuc=20*(0.5-0.89);
    }
    elseif ($gmac==0) {
      $rsonuc=20*(1-0.89);
    }
  }
  elseif (($grukd>=2000)and($grukd<=2399)) {
    if($gmac==1)
    {
      $rsonuc=15*(0-0.89);
    }
    elseif ($gmac==0.5) {
      $rsonuc=15*(0.5-0.89);
    }
    elseif ($gmac==0) {
      $rsonuc=15*(0-0.89);
    }
  }
  elseif ($grukd>=2400) {
    if($gmac==1)
    {
      $rsonuc=10*(0-0.89);
    }
    elseif ($gmac==0.5) {
     $rsonuc=10*(0.5-0.89);
   }
   elseif ($gmac==0) {
     $rsonuc=10*(1-0.89);
   }
 }

       //rakip
}
}




   }//abs

//Oyuncu puanı yüksek ise

//Rakip Puanı Yüksek İse

//Rakip Puanı Yüksek ise


}//foreach



?> 
<div class="">
  <h5>MAÇ ÖNCESİ UKD</h5><br>
  <span>Oyuncu UKD &nbsp;<b class="ml-4">:</b>&nbsp;&nbsp; <?php echo $goukd; ?></span> <br> 
  <span>Rakip UKD<b class="ml-5">:</b>&nbsp;&nbsp; <?php echo $grukd; ?></span><br>
  <span>Maç Sonucu &nbsp;&nbsp;<b class="ml-4">:</b>&nbsp;&nbsp;<?php echo $gmac; ?></span><br>
  <hr>
  <h5>MAÇ SONRASI UKD</h5>
  <span>Oyuncu Son UKD  Durumu<b class="ml-1">: <?php echo $goukd+$sonuc; ?></b> 
    <?php 
    if($sonuc>0)
    {
     echo '<img src="up-icon.png">'; 
   }
   elseif ($sonuc<0) {
    echo '<img src="down-icon.png">'; 
  }

  ?>  
  <span class="ml-1">Değişim :</span> <b><?php echo $sonuc; ?></b></span><br>
  <span>Rakip Son UKD Durumu&nbsp;<b class="ml-3">: <?php   echo $grukd+$rsonuc; ?></b>
    <?php 
    if($rsonuc>0)
    {
     echo '<img src="up-icon.png">'; 
   }
   elseif ($rsonuc<0) {
    echo '<img src="down-icon.png">'; 
  }

  ?>  
  <span class="ml-1">Değişim :</span> <b><?php echo $rsonuc; ?></b></span>

  
</div>
<?php  } //isset
?>



</form>

</div>


</div>
<div class="col-md-4"></div>
</div>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>