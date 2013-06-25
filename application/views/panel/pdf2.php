<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
 <title><?php echo $code[1].''.$code[2].'CMRR'.$foo->service;?> -  RESERVATION VOUCHERS Cozumel Mayan Tours</title>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/layout.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/prints.css" type="text/css" media="print" />
  <!--[if lt IE 9]>
  <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  <script src="<?php echo base_url(); ?>js/hideshow.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/jquery.tablesorter.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate-rules.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.equalHeight.js"></script>
  
</head>


<body>




  <?php

  foreach($query->result() as $foo){

    $fechas  = $foo->date_tour;
    $code = explode("-", $fechas);

    $iva =  $foo->paid * 0.11; 
    $total = $foo->paid * 1.11; 

    ?>

    <div id="mainpdf"> <!-- main pdf-->
      <div id="headerpdfs"> <!-- header -->
        <div class="col25">
         <img src="<?php echo base_url(); ?>images/mayan.png" width="250">
       </div>
       <div class="coltitulo">
        <span class="titulo">RESERVATION VOUCHERS</span>
      </div>
      <div class="col25">
       <img src="<?php echo base_url(); ?>images/st.png" width="200">
     </div>
   </div> <!-- Header -->


   <div class="cuarenta">
    <span class="datapdf">Name: </span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->name.' '.$foo->lastname; ?></span>
  </div>
  <br />
  <div class="cuarenta">
    <span class="datapdf">Country: </span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->country; ?></span>
  </div>
  <br />
  <div class="cuarenta">
    <span class="datapdf">Hotel or Ship:</span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->hotel_cruise; ?></span>
  </div><br />
  <div class="cuarenta">
    <span class="datapdf">E-mail: </span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->email; ?></span>
  </div><br />

  <div class="cuarenta">
    <span class="datapdf">Reservation Code:</span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $code[1].''.$code[2].'CMRR'.$foo->service;?></span>
  </div><br />
  <div class="cuarenta">
    <span class="datapdf">Reserved On: </span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->date_reservation; ?></span>
  </div><br />
  <div class="cuarenta">
    <span class="datapdf">Reserved By:</span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->reserverby; ?></span>
  </div><br />
  <div class="cuarenta">
    <span class="datapdf">Tour Date:</span>
  </div>
  <div class="cuarenta">
    <span class="colors"><?php echo $foo->date_tour; ?></span>
  </div><br />
  <div class="cuarenta">
    <span class="datapdf"> Time:</span>
  </div>
  <div class="cuarenta">
    <span class="colors"> <?php echo $foo->tour_time; ?> </span>
  </div>
  <br />
  <div class="cuarenta">
   <span class="datapdf"> Tour Reserved </span>
 </div>
 <div class="cuarenta">
  <span class="colors"> Cozumel Mayan Route n Roots </span>
</div>
<br />
<div class="cuarentas">
  <span class="datapdf">Tour Operator: </span>
</div>
<div class="cuarentas">
  <span class="colors"> Safe Tours Cozumel</span>
</div><br />
<div class="cuarentas">
  <span class="datapdf">Meeting Location: </span>
</div>
<div class="cuarentas">
  <span class="colors"> Outside the 7 eleven store next to the gas station</span>
</div><br />
<div class="cuarentas">
  <span class="datapdf">Good for: </span> 
</div>
<div class="cuarentas">
  <span class="colors"> <?php echo $foo->passengers; ?> Passengers</span> 
</div>
<br />

<div class="cuarentas">
  <span class="datapdf">Meeting Time:</span> 
</div>
<div class="cuarentas">
 <span class="colors"><?php echo $foo->meeting_time; ?></span>
</div>
<br /><br />
<div class="cuarenta">
 <span class="colors">*Remember you’ll be on Cozumel time!</span>
</div> 




<div id="infopdf"> <!-- infopdf -->
  <div class="cuarenta">

    <?php


    if ($foo->method_paid == "Cash"){
      echo "<span class='datapdf'>CASH [ X ] </span><span class='datapdf'><img src='http://cozumelmayantours.com/manager/images/paypal.png' width='100'> [ ] </span>"; 

    }
    else {
     echo "<span class='datapdf'>CASH [  ] </span><span class='datapdf'><img src='http://cozumelmayantours.com/manager/paypal.png' width='100'> [ X ] </span>"; 
   }


   ?>



 </div>
 <div class="cuarenta">


  <table>
    <tr>
      <td><span class="datapdf">Balance Due</span></td>
      <td><span class="colors">$ <?php echo $foo->paid; ?></colors></td>
    </tr>
    <tr>
      <td><span class="datapdf">(11%IVA) Tax: </span></td>
      <td><span class="colors">$ <?php echo $iva; ?></span></td>
    </tr>
    <tr>
      <td><span class="datapdf">Total:  </span></td>
      <td><span class="colors">$ <?php echo $total; ?></span></td>
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
   <br /><br /> 
 </p>
 <span class="datapdf">Tour Does Not Include: </span>
 <p class="textopdf">
   <br /><br /> 
 </p>
 <br />
 <hr /
 <p class="textopdf">
  <strong>For further assistance, contact us from 8 am to 5 pm (Central time)</strong>
  USA & CAN call toll free at <strong>1(855)552-6986 / 1(855)55-COZUMEL</strong>
  While in Cozumel call <strong>857-0601</strong> from other cities in México 01(987)857-0601
  To speak with a tour representative, call our cell number <strong>044(987)117-1592</strong> <br />
  By Skype: <strong>safetourscozumel</strong>     By E-mail:  <a href="mailto:info@safetourscozumel.com">info@safetourscozumel.com</a>
</p>


<div class="infopdf">
  <strong>This reservation was promptly made and reported by:</strong>
  <img src="<?php echo base_url(); ?>images/mardi.png" width="50">
</div> 


</div> <!-- infopdf-->
<div id="bottoms"> <!-- infopdf -->
  <div class="col4">
    <p class="textopdfb"><strong>Help save our planet! Don’t print this document just keep a copy for informational purposes with your e-mail <img src="<?php echo base_url(); ?>images/flor.png" width="50"></strong></p>
  </div>
  <div class="col5">

  </div>
</div> <!-- infopdf-->


</div> <!-- main PDF-->

<?php
}
?>




</body>

</html>