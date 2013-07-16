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


    setTimeout(function(){
        var selectedEffect = 'blind';
        var options = {};
        $(".alert_success").hide(selectedEffect, options, 500)
     }, 3000);

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
        <a class="current">New</a>
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
  <h4 class="alert_info">Add New Reservations.</h4>


  <div class="clear"></div>

<article class="module width_full">
  <header><h3>Check Availabilty</h3></header>
  <div class="module_content">
   

   <span>Date: <input type="text" id="datetour" name="datetour" id="datetour"/> </span>
   <br />
   <span>Hour: 
    <select NAME="tourtime" SIZE=1  id="tourtime">
      <option value=""></option>
  <option value="08:30AM">8:30AM</option>
  <option value="10:30AM">10:30AM</option>
    </select></span>
    <br /><br />
    <a href="#" id="validate" class="boton">Check</a>

    <br /><br />
    <?php
          if (!empty($success)){

            echo "<h4 class='alert_success'>".$success."</h4>";
          }         
          ?>
    
  </div>
</article>

  <article class="module width_3_quarter">
    <header><h3 class="tabs_involved">Add Reservations</h3>
    </header>

    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div class="module_content" id="gets">


         

          
        </div>
      </div>
      <br />
    </div><!-- end of .tab_container -->

  </article><!-- end of content manager article -->


  <!-- end of styles article -->
  <div class="spacer"></div>
</section>
<script type="text/javascript">

$("#validate").click(function(event){

    var hora = document.getElementById('tourtime').value;
    var fecha = document.getElementById('datetour').value;
    var parametros = {
      "tourtime" : hora,
      "datetour" : fecha,
    };
    $.ajax({
      data:  parametros,
      url:   '<?php echo base_url(); ?>index.php/check/tour',
      type:  'post',
      beforeSend: function () {
        $("#gets").html("Geting Info.");
      },
      success:  function (response) {
        $("#gets").html(response);
      }
    });
 

  });

</script>

</body>

</html>