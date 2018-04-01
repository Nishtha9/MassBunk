<?php
$otp=$_POST['otp2'];
$otp2=$_POST['otp'];
$Duration=$_POST['dur'];
$Reason=$_POST['reas'];
$Deadline=$_POST['dead'];
$Roll=$_POST['roll'];

include 'includes/Credentials.php';
include 'includes/common.php';
require 'PHPMailerAutoload.php';
if ($otp==$otp2)
{
    
$q1="Insert into polls(PollDuration, Reason, Deadline,Rollno,yes,no,voted) values ('$Duration','$Reason','$Deadline','$Roll',1,0,'$Roll');";
$Result= mysqli_query($con, $q1);    
    
$mail1 = new PHPMailer;

$mail1->isSMTP();
$mail1->Host = 'tls://smtp.gmail.com:587';
$mail1->SMTPAuth= true;
$mail1->SMTPSecure='ssl';
$mail1->Port='587';
$mail1->isHTML();
$mail1->Username="$email";
$mail1->Password="$pass";
$mail1->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail1->setFrom("IT2");

$q="Select email from student;";
$r= mysqli_query($con, $q);

$mail1->Subject="New request for GG";
$mail1->Body="Duration: $Duration, Deadline to vote: $Deadline. Created by: $Roll. Reason for gg: $Reason";
while ($row1= mysqli_fetch_array($r))
$mail1->addAddress($row1[0]);
if(!$mail1->send()) {
  echo 'Mail1 was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'A new poll has been created.';
}
}
else {
    echo 'Wrong OTP.';
}

?>