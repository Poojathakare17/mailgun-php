<?php
$email   = "poojatusharpatil43@gmail.com";
$homeUrl = '/index.php';
$subject = "Enquiry Regarding Offplan-Properties for ".$_POST['country'];
$msg = '<p>Name : '.@$_POST["name"].'</p><p>Email : '.@$_POST["email"].'</p><p>Phone : '.@$_POST["phone"].'</p><p>Property Name : '.@$_POST["country"].'</p><p>Message : '.@$_POST["subject"].'</p>';
send_mail($email,$subject,$msg);
function send_mail($email,$subject,$msg) {
  $api_key="key-577219c50a48fc187b166aa96a949dda";/* Api Key got from https://mailgun.com/cp/my_account */
  $domain ="amanfiroz.com";/* Domain Name you given to Mailgun */
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.$domain.'/messages');
  curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'from' => 'Open <no-reply@me-properties.com>',
    'to' => $email,
    'subject' => $subject,
    'html' => $msg
  ));
  $result = curl_exec($ch);
  curl_close($ch);
  header('Location: ./index.php');
  return $result;

}
?>

