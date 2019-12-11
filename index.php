<?php
/*
Plugin Name: Swift Mailer NO COMPOSER version
Plugin URI: turnonsocial.com
Description: Swift Mailer library with no composer installation.
Version: 5.4.1
*/
require("lib/swift_required.php");

require_once 'lib/autoload.php';

// Create the Transport
// using 2 step verification & app password generated from gmail account
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))->setUsername('sb.emagin@gmail.com')
  ->setPassword('emagin-pass');

/*
You could alternatively use a different transport such as Sendmail:

// Sendmail
$transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
*/

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('first mail'))
  ->setFrom(['IMAD@LASRI.ma' => 'IMAD LASRI'])
  ->setTo(['imadlasri@hotmail.fr' => 'hotmailIMAD'])
  ->setBody('client mail body')
  ;

$result = $mailer->send($message);


if($result){
	echo '_OK client mail sent';

}else{
	echo '_Failed';
}

//----------------(admin/user case)-------------2nd mail SAME TRANSPORTER-----------------

// sending 2nd mail
$mailer2 = new Swift_Mailer($transport);

// Create a message
$message2 = (new Swift_Message('second mail'))
  ->setFrom(['IMAD@SOFA.ma' => 'IMAD LASRI'])
  ->setTo(['lasri@emagin.ma' => 'emaginIMAD'])
  ->setBody('admin mail body');

$result2 = $mailer2->send($message2);

if($result2){
	echo '_OK admin mail sent';

}else{
	echo '_Failed';
}

?>
