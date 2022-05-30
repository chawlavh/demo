<?
include_once("include_files.php");
ini_set('display_errors','0');
$n_id=$_GET['n_id'];
if(!$row=getAnyTableWhereData(NEWSLETTERS_HISTORY_TABLE." as nh "," nh.id='".tep_db_input($n_id)."' ","nh.attachment_file")) 
{ ///Hack attempt
 $messageStack->add_session("ATTACHMENT ERROR", 'error');
 tep_redirect(tep_href_link(FILENAME_ERROR));
}
header('Content-Type: application/force-download' );
header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Content-Disposition: attachment; filename="' . stripslashes(stripslashes(substr($row["attachment_file"],14))) . '"');
readfile(PATH_TO_MAIN_PHYSICAL_NEWSLETTER_HISTORY.$row["attachment_file"]);
header('Pragma: no-cache');
?>