<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Authorizenet Payment Process</TITLE>
<?php
include_once("include_files.php");
include(PATH_TO_MAIN_PHYSICAL_MODULE.'payment/authorizenet.php');
$payment_modules = new authorizenet();
$p_status = $payment_modules->before_process1();
if($p_status )
 echo '<meta http-equiv="refresh" content="0;url='.tep_href_link(FILENAME_CHECKOUT_PROCESS).'"> ';
 else
 echo '<meta http-equiv="refresh" content="0;url='.tep_href_link(FILENAME_CHECKOUT_PAYMENT).'"> ';
?>
</head>
<body>
<?php

 echo "If the redirect process does not begin automatically within 15 second, please ";
 if($p_status )
 echo '<a href="'.tep_href_link(FILENAME_CHECKOUT_PROCESS).'">click here</a> ';
 else
 echo '<a href="'.tep_href_link(FILENAME_RECRUITER_CONTROL_PANEL).'">click here</a> ';
?>
</body>
</html>
