<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Email Configuration - Gmail SMTP
|--------------------------------------------------------------------------
*/

$config['protocol']     = 'smtp';

$config['smtp_host']    = 'smtp.gmail.com';
$config['smtp_port']    = 587;
$config['smtp_crypto']  = 'tls';

$config['smtp_user']    = 'desaterpadu1@gmail.com';
$config['smtp_pass']    = 'wioh vlgm qjgn pfbh';

$config['smtp_timeout'] = 30;

$config['mailtype']     = 'html';
$config['charset']      = 'utf-8';

$config['wordwrap']     = TRUE;

$config['newline']      = "\r\n";
$config['crlf']         = "\r\n";

$config['validate']     = TRUE;