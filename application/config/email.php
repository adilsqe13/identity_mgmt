<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = 587; // TLS
$config['smtp_user'] = 'mdadil.bitpastel@gmail.com';
$config['smtp_pass'] = 'hoid pzel ikqb ilwp'; // Replace with your actual app password
$config['mailtype']  = 'html';
$config['charset']   = 'iso-8859-1';
$config['wordwrap']  = TRUE;
$config['newline']   = "\r\n"; // Use double quotes to comply with RFC 822 standard
$config['smtp_crypto'] = 'tls'; // Add this line for TLS



// $config['protocol'] = 'smtp';
// $config['smtp_host'] = 'ssl://smtp.googlemail.com';
// $config['smtp_port'] = 465;
// $config['smtp_user'] = 'mdadil.bitpastel@gmail.com';
// $config['smtp_pass'] = 'hoid pzel ikqb ilwp';
// $config['mailtype']  = 'html';
// $config['charset']   = 'iso-8859-1';
// $config['wordwrap']  = TRUE;
// $config['newline']   = "\r\n"; // Use double quotes to comply with RFC 822 standard

?>


