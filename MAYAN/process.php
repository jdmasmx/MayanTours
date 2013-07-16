<?php
/* 
 *	Project: Simple Math Captcha
 *	Author: Laith Sinawi
 *	Author website: Website: http://www.SinawiWebDesign.com
 *  	Purpose: Server-side form validation for Simple Math Captcha
 */

require_once('classes/Validation.class.php');

sleep(2);
define('TO', 'reservations@cozumelmayantours.com');
define('FROM', 'reservations@cozumelmayantours.com');
define('SUBJECT', 'NEW RESERVATION');

if ( count($_GET) ) {
 $_POST = $_GET;
   //echo var_dump($_POST);
} 

$isValid = true;
$return = array("error" => "false");

// If request method is post, then user has JS disable - do server-side validation
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
//if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

        // Do server-side validation
    $fname = isset($_POST['firstName']) ? $_POST['firstName'] : "";
    $lname = isset($_POST['lastName']) ? $_POST['lastName'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phones = isset($_POST['phones']) ? $_POST['phones'] : "";
    $hotel_cruise = isset($_POST['hotel_cruise']) ? $_POST['hotel_cruise'] : "";
    $filter_date_in = isset($_POST['filter_date_in']) ? $_POST['filter_date_in'] : "";
    $country = isset($_POST['country']) ? $_POST['country'] : "";
    $tourtime = isset($_POST['tourtime']) ? $_POST['tourtime'] : "";
    $passengers = isset($_POST['passengers']) ? $_POST['passengers'] : "";
    $message = isset($_POST['message']) ? $_POST['message'] : "";


    $num1 = isset($_POST['num1']) ? $_POST['num1'] : "";
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : "";
    $total = isset($_POST['captcha']) ? $_POST['captcha'] : "";

    $form = new Validation('post');

    $fname_error = $form->name_validation($fname, 'First name');
    $lname_error = $form->name_validation($lname, 'Last name');
    $email_error = $form->email_validation($email, 'E-mail');
    $phone_error = $form->email_validation($phones, 'Phone');
    $message_error = $form->message_validation($message, 'Message');
    $captcha_error = $form->captcha_validation($num1, $num2, $total);

    $error = $fname_error.$lname_error.$email_error.$message_error.$captcha_error;
    if($error == null) {
      $result = sendEmail();

      if( $result['error'] == 'false' ) {
        echo "Message sent successfully!";
    }
    else {
        echo "Problem sending mail!";
    }

}
else {
  $isValid = false;
  echo $error;
}
}

// Otherwise, JS has already validated form
// If script comes to this line, then JS is enabled and form was validated first
if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    global $return;
    if ( sendEmail() ) {
        //return "Message sent successfully!";
        echo json_encode($return);
    }
    else {
        echo json_encode($return);
    }
}


/*

$fname = isset($_POST['firstName']) ? $_POST['firstName'] : "";
    $lname = isset($_POST['lastName']) ? $_POST['lastName'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $hotel_cruise = isset($_POST['hotel_cruise']) ? $_POST['hotel_cruise'] : "";
    $filter_date_in = isset($_POST['filter_date_in']) ? $_POST['filter_date_in'] : "";
    $country = isset($_POST['country']) ? $_POST['country'] : "";
    $tourtime = isset($_POST['tourtime']) ? $_POST['tourtime'] : "";
    $passengers = isset($_POST['passengers']) ? $_POST['passengers'] : "";
    $message = isset($_POST['message']) ? $_POST['message'] : "";
*/




    function sendEmail() {
        global $return;
        $body = "";
        $body .= "From: ".$_POST['email']."\nSubject: Reservation Tour";
        $body .= "\nFirst Name: ".$_POST['firstName'];
        $body .= "\nLast Name: " .$_POST['lastName'];
        $body .= "\nPhone: " .$_POST['phones'];
        $body .= "\nHotel / Cruise " .$_POST['hotel_cruise'];
        $body .= "\nDate Tour: " .$_POST['filter_date_in'];
        $body .= "\nCountry: " .$_POST['country'];
        $body .= "\nTour Time: " .$_POST['tourtime'];
        $body .= "\nPassengers: " .$_POST['passengers'];
        $body .= "\nMessage: " .$_POST['message'];

        $name = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $email = $_POST['email'];
        $telefono = $_POST['phones'];
        $hotel = $_POST['hotel_cruise'];
        $fecha = $_POST['filter_date_in'];
        $country = $_POST['country'];
        $time = $_POST['tourtime'];
        $passengers = $_POST['passengers'];
        $msg = $_POST['message'];
        $dater = date("Y-m-d"); 
        
        $status = "Reserved";
        $por = "Cozumel Mayan Tours";



        $link=mysql_connect("db473804472.db.1and1.com","dbo473804472","50p0r731and1");
        mysql_select_db("db473804472",$link);
        $sql="insert into reservations (name, lastname, email, hotel_cruise, phone, date_tour, date_reservation, country, tour_time, passengers, commentsvisitor, reserverby, estatus) values ('$name', '$lastname', '$email', '$hotel','$telefono', '$fecha', '$dater', '$country', '$time', '$passengers', '$msg', '$por', '$status')";
        $resultado=mysql_query($sql);
        mysql_close($link);
    

        if ( @mail( TO, SUBJECT, $body ) ) {
        //if(true) {
            $return['error'] = 'false';
        }
        else {
            $return['error'] = 'true';
        }
        return $return;
    }
