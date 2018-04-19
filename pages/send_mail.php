<?php
session_start();
include('../dist/includes/mail_config.php');
include('../dist/includes/dbcon.php');
$branch = $_SESSION['branch'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$query=mysqli_query($con,"select * from product  where branch_id='$branch' and due_date <= DATE_ADD(CURDATE(),INTERVAL 30 DAY) order by equip_id");

while($row=mysqli_fetch_field($query)){
    echo($row->name);

}
while($row=mysqli_fetch_array($query)){
    for ($i = 0; $i < count($row); $i++) {
        //inser to sql
    }

}

/*

//Load Composer's autoloader
require '../vendor/autoload.php';
$receiverEmail = "muhammadfirdauss@my.beyonics.com";
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $mHost;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $mUname;                 // SMTP username
    $mail->Password = $mPass;                           // SMTP password
    $mail->SMTPSecure = $mSMTP;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $mPort;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($mUname, 'CCMS-Mail');
    $mail->addAddress($receiverEmail, $_SESSION['name']);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Overdue Item';
    $mail->Body    = 'This is the list of <b>overdue</b> item for your attention as of '.date('d-m-Y');
    $mail->AltBody = 'This is the list of overdue item for your attention as of '.date('d-m-Y');

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

*/



?>