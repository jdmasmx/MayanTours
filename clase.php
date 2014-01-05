   <?php


   function sendEmail() {
        global $return;
        $body = "";
        $body .= "From: ".$_POST['email']."\nSubject: Reservation Cozumel Mayan Route and Roots";
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




        //$sDe =  "reservations@cozumelmayantours.com";
        $sDe =  $_POST['email'];
        //$sCC = "dmas@consultoresemkt.com";
        $sCabeceras = "From:".$sDe."\n"; 
        //$sCabeceras .= "Cc:  :".$sCC."\n"; 
        if ($name == ""){


        }else {

          $link=mysql_connect("db473804472.db.1and1.com","dbo473804472","50p0r731and1");
          mysql_select_db("db473804472",$link);
          $sql="insert into reservations (name, lastname, email, hotel_cruise, phone, date_tour, date_reservation, country, tour_time, passengers, commentsvisitor, reserverby, estatus) values ('$name', '$lastname', '$email', '$hotel','$telefono', '$fecha', '$dater', '$country', '$time', '$passengers', '$msg', '$por', '$status')";
          $resultado=mysql_query($sql);
          mysql_close($link);

          if ( @mail(TO, SUBJECT, $body, $sCabeceras) ) {
        //**if(true) {
            $return['error'] = 'false';
        }
        else {
            $return['error'] = 'true';
        }
        return $return;

    }


}

?>