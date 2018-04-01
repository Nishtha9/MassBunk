<?php
require 'includes/common.php';
include 'includes/Credentials.php';

$Duration=$_POST['Duration'];
$Reason=$_POST['Reason'];
$Deadline=$_POST['Deadline'];
$Roll=$_POST['Roll'];
$x=0;
$q="SELECT ROLLNO FROM STUDENT;";
$r=mysqli_query($con,$q);
while ($rows= mysqli_fetch_array($r))
{
    if ($rows[0]==$Roll)
    {
        $x++;
    }
}
if($x == 0)
{
    die('You are not listed as a student of IT 2nd year. 
Please contact the admin to add your name into the database.');

}
else  {
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPAuth= true;
$mail->SMTPSecure='ssl';
$mail->Port='587';
$mail->isHTML();
$mail->Username="$email";
$mail->Password="$pass";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$otp=rand(10000,99999);

$query="Select email from student where rollno=$Roll;";
$result= mysqli_query($con, $query);
$row= mysqli_fetch_array($result);
$mail->setFrom("IT2");
$mail->Subject="You created a poll for GG";
$mail->Body="Duration: $Duration, Deadline to vote: $Deadline. Please confirm that this poll has been created by you by entering the otp $otp.";
$mail->addAddress($row[0]);
if(!$mail->send()) {
  echo 'Mail was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else{ 


?>
<html>
    <head>
         <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <title>Confirmation </title>
    </head>
    <body>
        <div class="col-xs-4 col-xs-offset-2">
            <h4>Please enter the OTP sent to your registered email to create this poll.</h4>
            <form method="post" action="cnfcreate.php">
                <div class="form-group">
                    <input type="number" name="otp" class="form-control" placeholder="OTP">
                    <input type="number" name="otp2" value="<?php echo $otp; ?>" style="display:none">
                    <input type="text" name="dur" value="<?php echo $Duration; ?>" style="display:none">
                    <input type="text" name="reas" value="<?php echo $Reason; ?>" style="display:none">
                    <input type="time" name="dead" value="<?php echo $Deadline; ?>" style="display:none">
                    <input type="number" name="roll" value="<?php echo $Roll; ?>" style="display:none">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
<?php 
}
}
?>