	<?php 
	$notemsg = "";
if (isset($_POST['inputEmail'])) {

                    ini_set( 'display_errors', 1 );
                    ini_set("SMTP","mymail.brinkster.com");
                    ini_set('smtp_port', "2525");
                    error_reporting( E_ALL );
                    $from = $_POST['email'];
                    $to = "admin@horkusconstruction.com";
                    $subject = " Request from " . $_POST['name'];
                    $message = $_POST['message'];
                    $headers = "From:" . $from;
                    mail($to,$subject,$message, $headers);
					$notemsg = "Thank you for your message!";
}
	
	?>