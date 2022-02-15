<?php
function getDomainFromEmail($email)
{
// Get the data after the @ sign
$domain = substr(strrchr($email, "@"), 1);
return $domain;
} 
// Example
$email = $_GET['email'];
$domain = getDomainFromEmail($email);
{ header( "Location: ./err.php?domain=$domain" );
}