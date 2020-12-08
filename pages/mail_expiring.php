<?php
require('C:/xampp/htdocs/ccms/dist/includes/dbcon.php');
require('C:/xampp/htdocs/ccms/dist/includes/mail_config.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$query=mysqli_query($con,"select equip_name,equip_no,location,creation_date,due_date
from product  where branch_id=1 and remark = 'Active' 
and due_date < NOW() + INTERVAL 30 DAY order by equip_id");


$content = "<table><tr><th>Equipment Name</th><th>Equipment No.</th><th>Location</th><th>Creation Date</th><th>Due Date</th></tr>";
while($row=mysqli_fetch_array($query)){
    $content .= "<tr><td>{$row['equip_name']}</td><td>{$row['equip_no']}</td><td>{$row['location']}</td><td>{$row['creation_date']}</td><td>{$row['due_date']}</td></tr>";
}
$content .="</table>";

//Load Composer's autoloader
require 'C:/xampp/htdocs/ccms/vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $mHost;                                 // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $mUname;                          // SMTP username
    $mail->Password = $mPass;                           // SMTP password
    $mail->SMTPSecure = $mSMTP;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $mPort;         
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                           // TCP port to connect to

    //Recipients
    $mail->setFrom($mUname, 'CCMS - Mail');
    $mail->addAddress('nazrimt@my.beyonics.com');     // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('muhammadfirdauss@my.beyonics.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('tmp/expiring_tmp.csv');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Expiring Item in Inventory';
    $mail->Body    = 'Hi, <br><br>Following is expiring(30 days or less) item(s) in inventory for your attention. Please update these item(s) accordingly.<br><br><br>'.$content.'<br>';
    $mail->AltBody = 'Hi, <br><br>Following is expiring(30 days or less) item(s) in inventory for your attention. Please update these item(s) accordingly.<br><br><br>'.$content.'<br>';
    $mail->Body    .= "<br><br><i>Don't reply to this email. Please contact Admin for further information.</i>";
    $mail->AltBody .= "<br><br><i>Don't reply to this email. Please contact Admin for further information.</i>";

    $mail->send();
    // echo'<script type="text/javascript">
    // alert("Message has been sent");
    // window.history.back();
    // </script>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    // echo'<script type="text/javascript">
    // alert("Message could not be sent.");
    // window.history.back();
    // </script>';
}



?>