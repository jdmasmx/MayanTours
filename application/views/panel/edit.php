<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Dashboard I Admin Panel</title>
  
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
  <script>
  $(function() {
    // $( "" ).datepicker();
    //$("#datetour").datepicker({ beforeShowDay: $.datepicker.noWeekends })
    $("#datetour").datepicker({ dateFormat: 'yy-mm-dd',
      beforeShowDay: $.datepicker.noWeekends
    })
    
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
        <a class="current">Edit</a>
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
  <h4 class="alert_info">Edit Reservation.</h4>


  <div class="clear"></div>



  <article class="module width_3_quarter">
    <header><h3 class="tabs_involved">Edit Reservation</h3>
    </header>

    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div class="module_content">




         <?php $attributes = array('id' => 'form');
         echo form_open('form/update', $attributes); 
         foreach($query->result() as $foo){

          ?>
          <span>Status: </span><br />
          <select NAME="estatus" SIZE=1  id="estatus">
            <option value="<?php echo $foo->estatus; ?>"><?php echo $foo->estatus; ?></option>
            <option value="Confirmed">Confirmed</option>
            <option value="Reserved">Reserved</option>
            <option value="Cancel">Cancel</option>
          </select>
          <br /><br />
          <span>Name:</span><br />
          <input type="text" name="names" id="names" value="<?php echo $foo->name; ?>"  /> 
          <br /><br />
          <span>LastName:</span><br />
          <input type="text" name="lastname" id="lastname" value="<?php echo $foo->lastname; ?>" />
          <br /><br />
          <span>Email:</span><br />
          <input type="text" name="email" id="email" value="<?php echo $foo->email; ?>"  />
          <br /><br />
          <span>Hotel or CruiseShip:</span><br />
          <input type="text" name="hotel" id="hotel" value="<?php echo $foo->hotel_cruise; ?>"  />
          <br /><br />
          <span>Phone:</span><br />
          <input type="text" name="phone" id="phone" value="<?php echo $foo->phone; ?>"/>
          <br /><br />
          <span>Date Tour:</span><br />
          <input type="text" id="datetour" name="datetour" id="datetour" value="<?php echo $foo->date_tour; ?>"  />
          <br /><br />
          <span>Country:</span><br />
          <input type="text" name="country" id="country" value="<?php echo $foo->country; ?>"  />
          <br /><br />
          <span>Tour Time: </span><br />
          <input type="text" name="tourtime" id="tourtime" value="<?php echo $foo->tour_time; ?>"  />
          <br /><br />
          <span>Meeting Time: </span><br />
          <input type="text" name="meetingtime" id="meetingtime" value="<?php echo $foo->meeting_time; ?>"  />
          <br /><br />
          <span>Passengers: </span><br />
          <input type="text" name="passengers" id="passengers" value="<?php echo $foo->passengers; ?>"  />
          <br /><br />
          <span>Service: </span><br />
          <input type="text" name="service" id="service" value="<?php echo $foo->service; ?>"  />
          <br /><br />
          <span>Paid: </span><br />
          <input type="text" name="paid" id="paid" value="<?php echo $foo->paid; ?>"  />
          <br /><br />
          <span>Donation: </span><br />
          <input type="text" name="donation" id="donation" value="<?php echo $foo->donation; ?>"  />
          <br /><br />
          <span>Method Paid: </span><br />
          <input type="text" name="methodpaid" id="methodpaid" value="<?php echo $foo->method_paid; ?>"  />
          <br /><br />
          <span>Add Comments: </span><br />
          <textarea cols="25" rows="10" id="commentsadmin" name="commentsadmin" ><?php echo $foo->commentsadmin; ?></textarea>
          <br /><br />
          <span>Comments by Visitor: </span><br />
          <textarea cols="25" rows="10" id="commentsvisitor" name="commentsvisitor" ><?php echo $foo->commentsvisitor; ?></textarea>
          <br /><br />
          <input type="hidden" value="<?php echo $foo->id; ?>" id="elid" name="elid">
          <input type="hidden" value="diego mas" id="reserverby" name="reserverby">
          <input type="submit" value="Update" id="elguarda" class="enviar"> <a href="<?php echo base_url(); ?>" class="boton">Cancel</a>
          <?php }  echo form_close(); ?>
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