<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Dashboard Admin Panel - Cozumel Mayan Tours</title>
  
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
      <div id="headerpdf"> <!-- header -->
        <div class="col1">
         <img src="<?php echo base_url(); ?>images/st.png" width="250">
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
      <div class="cuarentas">
        <span class="datapdf">Name: </span>
      </div>
      <div class="sesentas">
        <span class="colors"><?php echo $foo->name.' '.$foo->lastname; ?></span>
      </div>
      <br /><br /><br /><br />
      <div class="cuarentas">
        <span class="datapdf">Country: </span>
      </div>
      <div class="sesentas">
        <span class="colors"><?php echo $foo->country; ?></span>
      </div>
      <br /><br /><br /><br />
      <div class="cuarentas">
        <span class="datapdf">Hotel or Ship:</span>
      </div>
      <div class="sesentas">
        <span class="colors"><?php echo $foo->hotel_cruise; ?></span>
      </div>
      <br /><br /><br /><br />
      <div class="cuarentas">
        <span class="datapdf">E-mail: </span>
      </div>
      <div class="sesentas">
        <span class="colors"><?php echo $foo->email; ?></span>

      </div>

    </div>
    <div class="col31">
      <div class="cuarenta">
        <span class="datapdf">Reservation Code:</span>
      </div>
      <div class="sesenta">
        <span class="colors"><?php echo $code[1].''.$code[2].'CMRR'.$foo->service;?></span>
      </div>
      <br /><br /><br /><br />
      <div class="cuarenta">
        <span class="datapdf">Reserved On: </span>
      </div>
      <div class="sesenta">
        <span class="colors"><?php echo $foo->date_reservation; ?></span>
      </div>
      <br /><br /><br /><br />
      <div class="cuarenta">
        <span class="datapdf">Reserved By:</span>
      </div>
      <div class="sesenta">
        <span class="colors"><?php echo $foo->reserverby; ?></span>
      </div>
      <br /><br /><br /><br />
      <div class="cuarenta">
        <span class="datapdf">Tour Date:</span>
      </div>
      <div class="sesenta">
        <span class="colors"><?php echo $foo->date_tour; ?></span>
      </div>

    </div>

  </div> <!-- infopdf-->
  <br /><br />
  <div id="infopdf"> <!-- infopdf -->
    <div class="col3">
      <div class="cuarentas">
       <span class="datapdf"> Tour Reserved</span>
     </div>
     <div class="sesentas">
      <span class="colors"> Cozumel Mayan Route & Roots</span>
    </div>
  </div>
  <div class="col31">
    <div class="cuarenta">
      <span class="datapdf"> Time:</span>
    </div>
    <div class="sesenta">
     <span class="colors"><?php echo $foo->tour_time; ?></span>
   </div>
 </div>

</div> <!-- infopdf-->
<div id="infopdf"> <!-- infopdf -->


  <span class="datapdf">Tour Operator: &nbsp;&nbsp;</span><span class="colors"> Safe Tours Cozumel</span>
  <br style="clear: left;" /><br />
  <span class="datapdf">Meeting Location: &nbsp;&nbsp;</span>&nbsp;<span class="colors"> Outside the 7 eleven store next to the gas station</span>
  <br style="clear: left;" /><br />
  <div class="cincuenta">
    <span class="datapdf">Meeting Time: &nbsp;&nbsp;</span>      <span class="colors"><?php echo $foo->meeting_time; ?></span>
  </div>
  <div class="cincuenta">
    <span class="colors">*Remember you’ll be on Cozumel time!</span>
  </div>


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