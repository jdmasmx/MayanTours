<!doctype html>
<html lang="en">
<?php

foreach($query->result() as $foo){

  $fechas  = $foo->date_tour;
  $code = explode("-", $fechas);


  ?>
  <head>
    <meta charset="utf-8"/>
    <title><?php echo $code[1].''.$code[2].'CMRR'.$foo->service;?> -  Reservation Confirmation Cozumel Mayan Tours</title>

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


  <div id="mainpdf"> <!-- main pdf-->
    <div id="headerpdf"> <!-- header -->
      <div class="col25">
        <img src="<?php echo base_url(); ?>images/mardi.png" width="200">
      </div>
      <div class="coltitulo">
        <span class="titulo">RESERVATION CONFIRMATION</span>
      </div>
      <div class="col25">
        <span class="mardi"><strong> MARDI, LLC</strong> <br />
        3923 West Willetta Street<br />
        Phoenix, AZ    85009<br />
        United States</span>
      </div>
    </div> <!-- Header -->
    <div id="contenedor"> <!-- infopdf -->

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

      <div class="cuarentas">
        <span class="datapdf">Good for: </span>
      </div>
      <div class="cuarentas">
        <span class="colors"> <?php echo $foo->passengers; ?> Passegers </span> 
      </div><br />
      <div class="cuarentas">
        <span class="datapdf"> Tour Reserved: </span>
      </div>
      <div class="cuarentas">
        <span class="colors"> Cozumel Mayan Route 'n Roots </span>
      </div><br />
      <div class="cuarentas">
        <span class="datapdf"> Reservation Paid in USD: </span>
      </div>
      <div class="cuarentas">
       <span class="colors"> $ <?php echo $foo->paid; ?> </span> 
     </div>
     <br />
     <div class="cuarenta">
      <span class="datapdf"> My Donation to the Cozumel Red Cross: </span>
    </div>
    <div class="cuarenta">
      <span class="colors"> $<?php echo $foo->donation; ?> </span>
    </div>
  </div> <!-- infopdf-->

<div class="espacio"></div>
  <div id="infopdf"> <!-- infopdf -->
    <span class="datapdf">Special comments:</span> <br /><br />
    <p class="textopdf">

      <strong>Cancellations Terms and Conditions</strong>
      <br /><br />
      Cancellations received 7 days prior to your tour allow you to change the date and/or nature of the tour, or to receive a 100% 
      refund. Cancellations within 72 hours (3 days) provide the option to change the date and/or nature of the tour, or receive a 50% 
      refund. <strong>NO cancellations honored 72 hours prior to a tour</strong> excluding unforeseeable circumstances, such as acts of nature.
      <br /><br />
      When a reservation is made for a group and one or more member must cancel, the same terms and conditions for cancellations 
      apply as stated above. Due to the change of number on your group, although any forthcoming refund cannot be applied to a 
      balance owed, it will promptly be remitted by MARDI, LLC and balances adjusted. Again, <strong>NO cancellations honored 72 hours prior </strong> to a tour.
      <br /><br />
      <strong>For Cruise Passengers Only: </strong> 100% refund if your ship fails to dock.
      <br /><br />
      <strong>MARDI, LLC and its representatives </strong>are solely intermediaries of parks, restaurants, entertainment, and transportation companies. 
      <strong>MARDI, LLC and its representatives</strong> are not responsible for any losses, injuries, delays, time changes, damages, items purchased or 
      any other circumstances that may occur before, during, or after tours and/or activities
    </p>

  </div> <!-- infopdf-->
  <div id="bottoms"> <!-- infopdf -->
    <div class="col4">
      <p class="textopdfb"><strong>The balance due of your reserved tour and all issues related will be managed and attended at Cozumel by: <img src="<?php echo base_url(); ?>images/logos.png" width="130"></strong></p>
    </div>
    <div class="col5">

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