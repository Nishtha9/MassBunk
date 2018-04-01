<?php
 
include 'includes/common.php';

$sno=$_GET['id'];
$q1="Select yes,no from polls where sno=$sno;";
$res1= mysqli_query($con, $q1);
$row1= mysqli_fetch_array($res1);
if (($row1[0]+$row1[1])==0)
{
    $q2="Update polls set Result='No GG' where sno=$sno;";
    $res2= mysqli_query($con, $q2);
}
else if (($row1[0]/($row1[0]+$row1[1]))>=0.8 )
{
    $q2="Update polls set Result='GG' where sno=$sno;";
    $res2= mysqli_query($con, $q2);
}
else
{
    $q2="Update polls set Result='No GG' where sno=$sno;";
    $res2= mysqli_query($con, $q2);
}

require 'PHPMailerAutoload.php';
$q="Select email from student;";
$res= mysqli_query($con, $q);
$q2="Select Result,PollDuration from polls where SNo=$sno;";
$res2=mysqli_query($con,$q2);
$row2= mysqli_fetch_array($res2);

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPAuth= true;
$mail->SMTPSecure='ssl';
$mail->Port='587';
$mail->isHTML();
$mail->Username="nish0349@gmail.com";
$mail->Password="topper@fan";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->setFrom("nish0349@gmail.com");


$mail->Subject="$row2[0]";
$mail->Body="$row2[0], Duration: $row2[1]";
while ($row= mysqli_fetch_array($res))
    $mail->addAddress($row[0]);
if(!$mail->send()) {
  echo 'Mail was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
}

//Mail to Sir
$sub= explode(",", $row2[1]);
$q5="Select email from Faculty where subject='$sub[0]';";
$res5= mysqli_query($con, $q5);
$row5= mysqli_fetch_array($res5);
$q2="Select Result,PollDuration from polls where SNo=$sno;";
$res2=mysqli_query($con,$q2);
$row2= mysqli_fetch_array($res2);
if ($row2[0]=='GG')
{
$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPAuth= true;
$mail->SMTPSecure='ssl';
$mail->Port='587';
$mail->isHTML();
$mail->Username="nish0349@gmail.com";
$mail->Password="topper@fan";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->setFrom("nish0349@gmail.com");


$mail->Subject="GG by IT 2nd year";
$mail->Body="Respected sir, this is to inform you that we will not be attending your class sceduled on $row2[1]";
    $mail->addAddress($row5[0]);
if(!$mail->send()) {
  echo 'Mail was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Mail sent to professor.';
}
}

$q="Delete from polls where sno=$sno;";
$res= mysqli_query($con, $q);
if (!$res)
{
    echo "Error occurred in deletion.";
}

