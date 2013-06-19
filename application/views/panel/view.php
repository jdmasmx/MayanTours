<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Dashboard Admin Panel - Cozumel Mayan Tours</title>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/layout.css" type="text/css" media="screen" />
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
  <script type="text/javascript">
  $(document).ready(function() 
  { 
    $(".tablesorter").tablesorter(); 
  } 
  );
  $(document).ready(function() {

  //When page loads...
  $(".tab_content").hide(); //Hide all content
  $("ul.tabs li:first").addClass("active").show(); //Activate first tab
  $(".tab_content:first").show(); //Show first tab content

  //On Click Event
  $("ul.tabs li").click(function() {

    $("ul.tabs li").removeClass("active"); //Remove any "active" class
    $(this).addClass("active"); //Add "active" class to selected tab
    $(".tab_content").hide(); //Hide all tab content

    var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
    $(activeTab).fadeIn(); //Fade in the active ID content
    return false;
  });

});
  </script>
  <script type="text/javascript">
  $(function(){
    $('.column').equalHeight();
  });
  </script>
  
</head>


<body>

  <header id="header">
    <hgroup>
      <h1 class="site_title"><a href="<?php echo base_url(); ?>">Reservations Admin</a></h1>
      <h2 class="section_title">Cozumel Mayan Tours</h2><div class="btn_view_site"><a href="http://cozumelmayantours.com/" target="_blank">View Site</a></div>
    </hgroup>
  </header> <!-- end of header bar -->
  
  <section id="secondary_bar">
    <div class="user">
      <p>User Current</p>
      <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
    </div>
    <div class="breadcrumbs_container">
      <article class="breadcrumbs">
        <a href="">Admin</a> 
        <div class="breadcrumb_divider"></div> 
        <a href="">Reservations</a>
        <div class="breadcrumb_divider"></div> 
        <a class="current">View Info</a>
      </article>
    </div>
  </section><!-- end of secondary bar -->
  
  <aside id="sidebar" class="column">
   <?php
   //Options for Admin
   include('options.php');
   ?>

   <footer>
    <hr />
    <p><strong>Cozumel Mayan Tours</strong></p>
  </footer>
</aside><!-- end of sidebar -->


<section id="main" class="column">
  <h4 class="alert_info">View Reservation.</h4>


  <div class="clear"></div>



  <article class="module width_3_quarter">
    <header><h3 class="tabs_involved">View Reservation</h3>
    </header>

    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div class="module_content">




         <?php 
         foreach($query->result() as $foo){

          ?>
          <span class="datapdf">Status: <?php echo $foo->estatus; ?></span>
          <br /><br />
          <span class="datapdf">Name: <?php echo $foo->name; ?> </span> 
          <br /><br />
          <span class="datapdf">LastName:   <?php echo $foo->lastname; ?> </span>
          <br /><br />
          <span class="datapdf">Email: <?php echo $foo->email; ?></span>
          <br /><br />
          <span class="datapdf">Hotel or CruiseShip: <?php echo $foo->hotel_cruise; ?> </span>
          <br /><br />
          <span class="datapdf">Phone: <?php echo $foo->phone; ?> </span>
          <br /><br />
          <span class="datapdf">Date Tour: <?php echo $foo->date_tour; ?> </span>
          <br /><br />
          <span class="datapdf">Country: <?php echo $foo->country; ?> </span>
          <br /><br />
          <span class="datapdf">Tour Time: <?php echo $foo->tour_time; ?> </span>
          <br /><br />
          <span class="datapdf">Meeting Time: <?php echo $foo->meeting_time; ?> </span>
          <br /><br />
          <span class="datapdf">Passengers:  <?php echo $foo->passengers; ?> </span>
          <br /><br />
          <span class="datapdf">Service: <?php echo $foo->service; ?> </span>
          <br /><br />
          <span class="datapdf">Paid: <?php echo $foo->paid; ?> </span>
          <br /><br />
          <span class="datapdf">Donation: <?php echo $foo->donation; ?> </span>
          <br /><br />
          <span class="datapdf">Method Paid: <?php echo $foo->method_paid ?></span>
          <br /><br />
          <span class="datapdf">Add Comments: <?php echo $foo->commentsadmin; ?></span>
          <br /><br />
          <span class="datapdf">Comments by Visitor: <?php echo $foo->commentsvisitor; ?></span>
          <br /><br />
          <span class="datapdf">Reserved by: <?php echo $foo->reserverby; } ?></span>
          
        </div>
      </div>
      <br />
    </div><!-- end of .tab_container -->

  </article><!-- end of content manager article -->


  <!-- end of styles article -->
  <div class="spacer"></div>
</section>


</body>

</html>