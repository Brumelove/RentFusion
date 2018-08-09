
<?php
	/**
	 * 
	 */

	class Subscribe
	{
		
		public static function process($param) {
			date_default_timezone_get("Africa/Lagos");

			// Open or Create contact.csv If not existing
			$file = fopen('subscription.csv', 'a');

			// Create CSV Columns (Run this Once)
			fputcsv($file, array('Name', 'Email', 'Date'));

			// Append Contact details to CSV File
			fputcsv($file, array($param['name'], $param['email'], date("Y-m-d h:i:sa")));

			// Close File Stream
			fclose($file);

			// Prepare email Message and Send to User
			//$message = "Hi ".$param['name'].",\n\nYou have subscribed to our weekly Newsletters!\n\nThank you.\n\nAdmin";
			//$headers = "Reply-To: Rentfusion <rentfusion@gmail.com>\r\n";
			//$headers = "Return-Path: Rentfusion <rentfusonr@gmail.com>\r\n";
			//$headers = "From: Rentfusion <rentfusion@gmail.com>\r\n";

			//Send email
			mail($param['email'], "Newsletter subscription", $message, $headers);


			/*
			 |----------------------------------
			 | Read Information From CSV File
			 |----------------------------------
			*/
			 $csv = array_map('str_getcsv', file('subscription.csv'));
		}
	}

	//Get Variables from index form
	$name = $_POST['name'];
	$email = $_POST['email'];

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'nawtywendywilly@gmail.com';                 // SMTP username
	    $mail->Password = 'april221996';                           // SMTP password
	    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 465;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('nawtywendywilly@gmail.com', 'Admin');
	    $mail->addAddress($email, $name);     // Add a recipient

	    //Body content
	    $body = '<p><strong>Hi</strong>, '.$name.'.<br><br>You have subscribed to the our Newsletters!<br><br>Thank you.</p>' ;

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Newsletter subscription';
	    $mail->Body    = $body;
	    $mail->AltBody = strip_tags($body);

	    $mail->send();

	} catch (Exception $e) {
		echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo.'<br>';
	}
	
?>
