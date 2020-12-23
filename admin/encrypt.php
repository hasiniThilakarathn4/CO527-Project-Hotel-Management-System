<?php

set_magic_quotes_runtime(0);
$con=mysqli_connect("localhost","cus","cus_pass","hotel") or die(mysql_error());

$q = "SELECT ".FLD_PASS.",".FLD_USER." FROM ".TBL_USERS."";
$result = mysql_query($q, $con);
$total=0;
$enc=0;
$doencrypt=false;
if(@$_REQUEST["do"]=="encrypt")
 $doencrypt=true;
while($data = mysql_fetch_array($result))
{
 if($doencrypt)
 {
  $total++;
  if(!encrypted($data[0]))
  {
   $q="UPDATE ".TBL_USERS." SET ".FLD_PASS."='".md5($data[0])."' where ".FLD_USER."='".
   str_replace("'","''",$data[1])."'";
   mysql_query($q, $connection);
  }
  $enc++;
 }
 else
 {
  $total++;
  if(encrypted($data[0]))
   $enc++;
 }
} function encrypted($str)
{
 if(strlen($str)!=32)
  return false;
 for($i=0;$i<32;$i++)
   if((ord($str[$i])<ord('0') || ord($str[$i])>ord('9')) && (ord($str[$i])<ord('a') 
     || ord($str[$i])>ord('f')))
   return false;
 return true;
}
?>
<html>
<head><title>Encrypt passwords</title></head>
<body>
Total passwords in the table - <?php echo $total; ?><br>
<?php if($enc==$total && $total>0) { ?>
All passwords are encrypted.
<?php } else if($total>0) { ?>
Unencrypted - <?php echo $total-$enc; ?><br><br>
Click "GO" to encrypt <?php echo $total-$enc; ?> passwords.<br>
WARNING! There will be no way to decipher the passwords.<br>
<input type=button value="GO" onclick="window.location='encrypt.php?do=encrypt';">
<?php } ?>
</body>
</html>