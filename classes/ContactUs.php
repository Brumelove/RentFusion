<?php

class ContactUs
{
    public static function process($param){
        date_default_timezone_set("Africa/Lagos");

        $file = fopen('contact.csv', 'a');

        fputcsv($file, array('Name', 'Email', 'Message', 'Date'));

        fputcsv($file, array($param['name'], $param['email'], $param['message'], date("Y-m-d h:i:sa")));

        fclose($file);

        $message = "Hola!". $param['name']."\n\nThank you for reching out.\n\nChao.";
        $headers = "Reply-To: Rent Admin <brume@rentfusion.com>\r\n";
        $headers .= "Return-path: Rent Admin<bruem@rentfusion.com>\r\n";
        $headers .= "From: Rent Admin <brume@rentfusion.com>\r\n";

        mail($param['email'], "Booust Contact", $message, $headers);





        $csv = array_map('str_getcsv', file('contact.csv'));
        echo $csv[sizeof($csv)-1][0] . '<br>';
        echo $csv[sizeof($csv)-1][1] . '<br>';
        echo $csv[sizeof($csv)-1][2] . '<br>';
        echo $csv[sizeof($csv)-1][3] . '<br>';
    }

}
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
   //Server settings
   $mail->SMTPDebug = 0;                                 // Enable verbose debug output
   $mail->isSMTP();                                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                               // Enable SMTP authentication
   $mail->Username = 'nawtywendywilly@gmail.com';                 // SMTP username
   $mail->Password = 'april221996';                           // SMTP password
   $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 465;                                    // TCP port to connect to

   //Recipients
   $mail->setFrom('nawtywendywilly@gmail.com', 'Admin');
   $mail->addAddress($email,$name );     // Add a recipient
   //$mail->addAddress('contact@example.com');               // Name is optional
   //$mail->addReplyTo('info@example.com', 'Information');
   //$mail->addCC('cc@example.com');
   //$mail->addBCC('bcc@example.com');

   //Attachments
   //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

   //Body content
   $body = '<p><strong>Hello</strong>, '.$name.'.<br><br>Thank you for reaching out.<br><br>Regards.</p>' ;


   //Content
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = 'Contact Us';
   $mail->Body    = $body;
   $mail->AltBody = strip_tags($body);

   $mail->send();
   
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo.'<br>';
}


?>