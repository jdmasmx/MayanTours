
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate-rules.js"></script>

<script>
$(function() {
  $("#datetourd").datepicker({ dateFormat: 'yy-mm-dd',
    beforeShowDay: $.datepicker.noWeekends
  })
});
</script>

<?php

$confirmed = 0;
$reserved = 0;
$cancel = 0;

$maxim = 20;
$left = 0;

$tot_passengers = 0;
foreach($query->result() as $foo){

  if ($foo->estatus == "Confirmed"){
    $tot_passengers = $tot_passengers + $foo->passengers;
  }
  else if ($foo->estatus == "Reserved"){
    $reserved = $reserved + $foo->passengers;
  }
  else {


  }

}
$left = $maxim - $tot_passengers;

if ($left <= 0) {
  echo "<h4 class='alert_error'>There are no places available for this tour.</h4>";
}  else {
  echo "<h4 class='alert_warning'>Spaces confirmed: ".$tot_passengers.".</h4>";
  echo "<h4 class='alert_warning'>Spaces reserved: ".$reserved.".</h4>";

  $attributes = array('id' => 'form');
  echo form_open('form/salvar', $attributes);



  ?>

  



  <br /><br />
  <span>Names:</span><br />
  <input type="text" name="names" id="names"/> 
  <br /><br />
  <span>LastName:</span><br />
  <input type="text" name="lastname" id="lastname"/>
  <br /><br />
  <span>Email:</span><br />
  <input type="text" name="email" id="email"/>
  <br /><br />
  <span>Hotel or CruiseShip:</span><br />
  <input type="text" name="hotel" id="hotel"/>
  <br /><br />
  <span>Phone:</span><br />
  <input type="text" name="phone" id="phone"/>
  <br /><br />
  <span>Date Tour:</span><br />
  <input type="text" id="datetourd" name="datetour" id="datetourd"/>
  <br /><br />
  <span>Country:</span><br />
  <input type="text" name="country" id="country"/>
  <br /><br />
  <span>Tour Time: </span><br />
  <select NAME="tourtime" SIZE=1  id="tourtime">
    <option value=""></option>
    <option value="08:00am">8:00am</option>
    <option value="09:00am">9:00am</option>
  </select>
  <br /><br />
  <span>Meeting Time: </span><br />
  <input type="text" name="meetingtime" id="meetingtime" value=""  />
  <br /><br />
  <span>Paseengers: </span><br />
  <select NAME="passengers" SIZE=1  id="passengers">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
  </select>
  <br /><br />
  <span>Admin Comments: </span><br />
  <textarea cols="25" rows="10" id="commentsadmin" name="commentsadmin"></textarea>
  <input type="hidden" value="" id="commentsvisitor" name="commentsvisitor">
  <br /><br />
  <span>Service: </span><br />
  <input type="text" name="service" id="service" value=""  />
  <br /><br />
  <span>Method Paid: </span><br />
  <select NAME="methodpaid" SIZE=1  id="methodpaid">
    <option value=""></option>
    <option value="Cash">Cash</option>
    <option value="PayPal">PayPal</option>
  </select>
  <br /><br />
  <input type="hidden" value="<?php echo $this->session->userdata['name']?>" id="reserverby" name="reserverby">
  <input type="hidden" value="Confirmed" id="estatus" name="estatus">
  <br /><br />
  <input type="submit" value="Save" id="elguarda" class="enviar">
  <a href="<?php echo base_url(); ?>" class="boton">Cancel</a>

  <?php }
  echo form_close(); ?>