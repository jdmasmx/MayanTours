<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Dashboard Admin Panel - Cozumel Mayan Tours</title>
  
  <link rel="stylesheet" href="http://cozumelmayantours.com/adminer/css/layout.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="http://cozumelmayantours.com/adminer/css/prints.css" type="text/css" media="print" />
  
</head>
<style type="text/css">


#mainpdf {

  width: 940px;
  min-height: 200px;
  margin: 0 auto 0 auto;
}

#headerpdf {
  width: 940px;
  float: left;
}

.col1 {
  width: 270px;
  min-width: 270px;
  float: left;
  
}

.col2 {
  width: 400px;
  float: left;
  
}

.col3 {
  width: 450px;
  float: left;
  
}

.col4 {
  width: 750px;
  float: left;
}

.col5 {
  width: 150px;
  float: left;

  
}

.titulo {
  color: #000;
  font-size: 18px;
  margin-top: 30px;
  float: left;
}

.mardi {
  color: #000;
  font-size: 12px;
  margin-top: 20px;
  float: left;
}

#infopdf {
  width: 940px;
  margin-top: 20px;
  float: left;
}



.datapdf {
  font-weight: bold;
  font-size: 14pt;

}

.textopdf { 
  font-size: 12px;
  text-align: justify;
  
}

.textopdfd {  
  font-size: 12px;
  text-align: justify;
  padding: 50px;
}

.imgright {
  float: left;

}


</style>

<body>

  <table>

    <tr>
      <td>Hola</td><td>dude</td>
    </tr>

  </table>
  <?php

  foreach($query->result() as $foo){

    $fechas  = $foo->date_tour;
    $code = explode("-", $fechas);

    $iva =  $foo->paid * 0.11; 
    $total = $foo->paid * 1.11; 

    ?>

    <div id="mainpdf"> <!-- main pdf-->
      <div id="headerpdf"> <!-- header -->
        <div class="col1">
          <img src="http://upload.wikimedia.org/wikipedia/commons/2/2a/Junonia_lemonias_DSF_upper_by_Kadavoor.JPG" width="200">
        </div>
        <div class="col2">
          <span class="titulo">RESERVATION VOUCHERS</span>
        </div>
        <div class="col1">
         <img src="http://localhost/Reservations/images/st.png" width="150">
       </div>
     </div> <!-- Header -->
     <div id="infopdf"> <!-- infopdf -->
      <div class="col3">
        <span class="datapdf">Name: <?php echo $foo->name.' '.$foo->lastname; ?></span><br />
        <span class="datapdf">Country: <?php echo $foo->country; ?></span><br />
        <span class="datapdf">Hotel or Ship: <?php echo $foo->hotel_cruise; ?></span><br />
        <span class="datapdf">E-mail: <?php echo $foo->email; ?></span><br />
      </div>
      <div class="col3">
        <span class="datapdf">Reservation Code: <?php echo $code[1].''.$code[2].'CMRR'.$foo->service;?></span><br />
        <span class="datapdf">Reserved On: <?php echo $foo->date_reservation; ?></span><br />
        <span class="datapdf">Reserved By: <?php echo $foo->reserverby; ?></span><br />
        <span class="datapdf">Tour Date: <?php echo $foo->date_tour; ?></span><br />
      </div>

    </div> <!-- infopdf-->
    <div id="infopdf"> <!-- infopdf -->

      <span class="datapdf">Tour reserved:</span> <span>Cozumel Mayan Route & Roots</span>
      <span class="datapdf">Tour Time:</span>
      <?php if ($foo->tour_time == "1"){
        echo "<span>08:00 am</span>"; 

      }
      else {
       echo "<span>09:00 am</span>";
     }
     ?>
     <br />
     <span class="datapdf">Tour Operator: </span> <span>Safe Tours Cozumel</span>
     <br />
     <span class="datapdf">Meeting Location: </span> <span>Outside the 7 eleven store next to the gas station</span>
     <br />
     <span class="datapdf">Meeting Time: </span> <span>*Remember you’ll be on Cozumel time!</span>
   </div> <!-- infopdf-->
   <div id="infopdf"> <!-- infopdf -->
    <div class="col5">
      ---
    </div>
    <div class="col4">
      <span class="datapdf">Good for: <?php echo $foo->passengers; ?> Passengers</span> <span></span>
      <br /><br />
    </div>
  </div> <!-- infopdf-->
  <div id="infopdf"> <!-- infopdf -->
    <div class="col2">

      <?php


      if ($foo->method_paid == "Cash"){
        echo "<span class='datapdf'>CASH [ X ] </span><span class='datapdf'><img src='http://cozumelmayantours.com/adminer/images/paypal.png' width='100'> [ ] </span>"; 

      }
      else {
       echo "<span class='datapdf'>CASH [  ] </span><span class='datapdf'><img src='http://cozumelmayantours.com/adminer/paypal.png' width='100'> [ X ] </span>"; 
     }


     ?>



   </div>
   <div class="col2">


    <table>
      <tr>
        <td>Balance Due</td>
        <td>$ <?php echo $foo->paid; ?></td>
      </tr>
      <tr>
        <td>(11%IVA) Tax: </td>
        <td>$ <?php echo $iva; ?></td>
      </tr>
      <tr>
        <td>Total:  </td>
        <td>$ <?php echo $total; ?></td>
      </tr>

    </table>

  </div>
</div> <!-- infopdf-->
<div id="infopdf"> <!-- infopdf -->
  <span class="datapdf">Reminders:</span> <br />
  <p class="textopdf">
    <?php echo $foo->commentsadmin; ?>
  </p>
  <span class="datapdf">Tour Includes:</span> <br />
  <p class="textopdf">
  </p>
  <span class="datapdf">Tour Does Not Include: </span>
  <br />
  <div class="col3">
  <p class="textopdf">
      <strong>For further assistance, contact us from 8 am to 5 pm (Central time)</strong>
      USA & CAN call toll free at <strong>1(855)552-6986 / 1(855)55-COZUMEL</strong>
      While in Cozumel call <strong>857-0601</strong> from other cities in México 01(987)857-0601
      To speak with a tour representative, call our cell number <strong>044(987)117-1592</strong> <br />
      By Skype: <strong>safetourscozumel</strong>     By E-mail:  <a href="mailto:info@safetourscozumel.com">info@safetourscozumel.com</a>
  </p>
</div>
  
   <div class="col3">
    This reservation was promptly made and reported by:
   <img src="<?php echo base_url(); ?>images/mardi.png" width="150">
 </div> 


</div> <!-- infopdf-->


</div> <!-- main PDF-->

<?php
}
?>




</body>

</html>