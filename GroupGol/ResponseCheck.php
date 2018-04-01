<?php
$Sno=$_POST['sno'];
$Roll=$_POST['roll'];
$Response=$_POST['Resp'];
include 'includes/common.php';

$q0="Select voted,yes,no from polls where Sno=$Sno;";
$res0= mysqli_query($con, $q0);
$row0= mysqli_fetch_array($res0);
$voted= explode(",", $row0[0]);
$x=0;
while ($x<($row0[1]+$row0[2]))
{
    if ($voted[$x]==$Roll)
    {
        die ('Your response has already been recorded');
    }
    $x++;
}
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
if ($Response == 'Yes')
{
    $q="Select voted from polls where Sno=$Sno;";
    $q1="Update polls set yes=yes+1 where Sno=$Sno;";
    $res1= mysqli_query($con, $q);
    $row1= mysqli_fetch_array($res1);
    $res2= mysqli_query($con, $q1);
    if ($row1[0=='NULL'])
        $row1[0]="$Roll";
    else
    $row1[0]="$row1[0],$Roll";
    $q3="Update polls set voted='$row1[0]' where Sno=$Sno;";
    $res3= mysqli_query($con, $q3);
}
else 
{
  $q="Select voted from polls where Sno=$Sno;";
    $q1="Update polls set no=no+1 where Sno=$Sno;";
    $res1= mysqli_query($con, $q);
    $row1= mysqli_fetch_array($res1);
    $res2= mysqli_query($con, $q1);
     if ($row1[0=='NULL'])
        $row1[0]="$Roll";
    else
    $row1[0]="$row1[0],$Roll";
    $q3="Update polls set voted='$row1[0]' where Sno=$Sno;";
    $res3= mysqli_query($con, $q3);
}
header ('location:ongoing-polls.php');

?>