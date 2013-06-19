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
      <p>Login</p>
      <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
    </div>
    <div class="breadcrumbs_container">
      <article class="breadcrumbs"><a href="">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Login</a></article>
    </div>
  </section><!-- end of secondary bar -->
  



  <section id="main" class="column">


    <div class="login">
      <?php echo form_open('auths/registro'); ?>
      <h2>Username:</h2>
      <?php
      if (empty($usuario)) { ?>
      <input type='text' name='username' value='' /><br />
      <?php
    }
    else {
      ?>
      <input type='text' name='username' value='<?php echo $usuario; ?>' /><br />
      <?php
    }
    ?>

    <h2>Password:</h2> 
    <input type='password' name='password'/>
    <br /><br />   <br />   
    <input type='submit' value='Log In' class="enviar" /><br /><br />   
    <?php echo form_close(); ?> 
    <?php
    if (!empty($sMsjError)) {
     echo "<div class='div_error'><label>*".$sMsjError."</label></div>";
   } ?>
   <label class='errores'>   <?php echo validation_errors(); ?></label><br />

 </div>
 <div class="spacer"></div>
</section>



</body>
</html>
