<?php

switch ($mail) {
case 0:

//mail to client confirmation commande
$to=$email;
$subject="Votre commande a bien ete effectuee";
$message= utf8_encode('
<p>Votre commande numero '.$no_commande.' a bien ete enregistree</p>');
$headers = "From: rainbow <rainbow-pen@alwaysdata.net>\r\n";
$headers .= "Reply-To: rainbow-pen@alwaysdata.net\r\n";
$headers .= "Content-type: text/html\r\n";
mail($to,$subject,$message,$headers);

//mail to admin confirmation commande 
$to="rainbow-pen@alwaysdata.net";
$subject="Une nouvelle commande a été effectuée";
$message=utf8_encode("<p>Le client ".$email." a effectué une nouvelle commande</p>");
$headers = "From: Rainbow <rainbow-pen@alwaysdata.net>\r\n";
$headers .= "Reply-To: rainbow-pen@alwaysdata.net\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
mail($to,$subject,$message,$headers);
mail($to,$subject,$message,$headers);

break;

case 1: 
//mail to client commande expédiée
$to=$email;
$subject="Votre commande est en route";
$message= utf8_encode('
<p>Votre commande '.$no_commande.' a bien ete enregistree</p>');
$headers = "From: rainbow <rainbow-pen@alwaysdata.net>\r\n";
$headers .= "Reply-To: rainbow-pen@alwaysdata.net\r\n";
$headers .= "Content-type: text/html\r\n";
mail($to,$subject,$message,$headers);

break;

case 2: 
//mail from user to admin 
$to="rainbow-pen@alwaysdata.net";
$message_utf8=utf8_encode("<p>".$message."</p>");
$headers = "From:<".$email.">\r\n";
$headers .= "Reply-To: ".$email.">\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
mail($to,$subject,$message_utf8,$headers);




}