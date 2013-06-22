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
    $("#datetour, #datetours, #datetourd").datepicker({ dateFormat: 'yy-mm-dd',
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
      <article class="breadcrumbs"><a href="">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
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
 <h4 class="alert_info">Welcome.</h4>


 <div class="clear"></div>

  <article class="module width_full">
  <header><h3>Filter per Day</h3></header>
  <div class="module_content">
    <?php $attributes = array('id' => 'form');
    echo form_open('form/view_reservations', $attributes); ?>

    <span>Date: <input type="text" id="datetour" name="datetour" id="datetour"/> </span>
    <br />
    <span>Hour: 
      <select NAME="tourtime" SIZE=1  id="tourtime">
        <option value=""></option>
  <option value="08:00am">8:00am</option>
  <option value="09:00am">9:00am</option>
      </select></span>
      <br />
      <input type="submit" value="View" id="elguarda" class="enviar">
      <?php echo form_close(); ?>
    </div>
  </article>

  <article class="module width_full">
  <header><h3>Filter by Date Range</h3></header>
  <div class="module_content">
    <?php $attributes = array('id' => 'form');
    echo form_open('form/view_reservations_dates', $attributes); ?>

    <span>First Date: <input type="text" id="datetours" name="datetours" id="datetours"/> </span>
    <br />
    <span>Last Date: <input type="text" id="datetourd" name="datetourd" id="datetourd"/> </span>
    <br />
    <span>Hour: 
      <select NAME="tourtime" SIZE=1  id="tourtime">
        <option value=""></option>
  <option value="08:00am">8:00am</option>
  <option value="09:00am">9:00am</option>
      </select></span>
      <br />
      <input type="submit" value="View" id="elguarda" class="enviar">
      <?php echo form_close(); ?>
    </div>
  </article>

<article class="module width_3_quarter">
  <header><h3 class="tabs_involved">Reservations</h3>
  </header>

  <div class="tab_container">
    <div id="tab1" class="tab_content">
      <table class="tablesorter" cellspacing="0"> 
        <thead> 

          <tr> 
            <th># Reservation</th> 
            <th>Date</th> 
            <th>Hour</th> 
            <th>Name</th> 
            <th>Reserved by..</th> 
            <th># Passengers</th>
            <th>Status</th>
            <th>Actions</th> 

          </tr> 
        </thead> 
        <tbody> 

          <?php
          $a = 0;
          foreach($query->result() as $foo){
            $a = $a + 1;
            echo "<tr>";
            echo "<td>".$a."</td>";  
            echo "<td>".$foo->date_tour."</td>"; 
            echo "<td>".$foo->tour_time."</td>";  
            echo "<td>".$foo->name." ".$foo->lastname."</td>";  
            echo "<td>".$foo->reserverby."</td>"; 
            echo "<td>".$foo->passengers."</td>"; 
            echo "<td>".$foo->estatus."</td>";
            if ($this->session->userdata['rol'] == 1){

              ?>
              <td>
                <a href="<?php echo base_url(); ?>index.php/form/edit/<?php echo $foo->id; ?>"><image src="<?php echo base_url(); ?>images/edit_a.png" title="Edit" alt="Edit"></a>
                <a href="<?php echo base_url(); ?>index.php/form/views/<?php echo $foo->id; ?>"><image src="<?php echo base_url(); ?>images/view_a.png" title="View" alt="View"></a>
                <a href="<?php echo base_url(); ?>index.php/form/pdf/<?php echo $foo->id; ?>" target="_blank"><image src="<?php echo base_url(); ?>images/pdf_a.png" title="Confirmation" alt="Confirmation"></a>
                <a href="<?php echo base_url(); ?>index.php/form/pdfd/<?php echo $foo->id; ?>" target="_blank"><image src=" <?php echo base_url(); ?>images/pdf_a.png" title="Voucher" alt="Voucher"></a> 
                <!-- <input type="image" src=" echo base_url(); ?>images/icn_trash.png" title="Trash"> -->
              </td>
              <?php
            }else {
              ?>
              <td>
                <a href="<?php echo base_url(); ?>index.php/form/views/<?php echo $foo->id; ?>"><image src="<?php echo base_url(); ?>images/view_a.png" title="View" alt="View"></a>
              </td>
              <?php
            }
            echo "</tr>";
          } 
          ?>  
        </tbody> 
      </table>
    </div>
    <br />
  </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->


<!-- end of styles article -->
<div class="spacer"></div>
</section>


</body>

</html>