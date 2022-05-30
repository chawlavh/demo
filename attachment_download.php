<?
include_once("include_files.php");
include_once(FILENAME_BODY);
ini_set('display_errors','0');
//print_r($_GET);
$file_name="";
$file_name1="";
if(check_login("recruiter"))
{
 if(isset($_GET['query_string']) && $_GET['query_string']!='')
 {
  $query_string=$_GET['query_string'];
  $file_name=check_data1($query_string,"@#^#@","temp_attachment","attachment");
 }
 elseif(isset($_GET['query_string1']) && $_GET['query_string1']!='')
 {
  $query_string=$_GET['query_string1'];
  $file_name1=check_data1($query_string,"@#^#@","mail_attachment","attachment");
 }
}
else
{
 if(!check_login("jobseeker"))
 {
  $messageStack->add_session(LOGON_FIRST_MESSAGE, 'error');
  tep_redirect(FILENAME_JOBSEEKER_LOGIN);
 }
 if(isset($_GET['query_string']) && $_GET['query_string']!='')
 {
  $query_string=$_GET['query_string'];
  $file_name=check_data1($query_string,"@#^#@","temp_attachment","attachment");
 }
 elseif(isset($_GET['query_string1']) && $_GET['query_string1']!='')
 {
  $query_string=$_GET['query_string1'];
  $file_name1=check_data1($query_string,"@#^#@","mail_attachment","attachment");
 }
}
if($file_name!='')
{
 if(is_file(PATH_TO_MAIN_PHYSICAL_TEMP.$file_name))
 {//print_r($row);
  header('Content-Type: application/force-download' );
  header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
  header('Content-Disposition: attachment; filename="'. stripslashes(stripslashes(substr($file_name,14))) . '"');
  readfile(PATH_TO_MAIN_PHYSICAL_TEMP.$file_name);
  header('Pragma: no-cache');
 }
 else
 {
  header("location:./");
  exit;
 }
}
elseif($file_name1!='')
{ 
 $file_directory=get_file_directory($file_name1);
 if(is_file(PATH_TO_MAIN_PHYSICAL_RECRUITER_EMAIL_ATTACHMENT.$file_directory.'/'.$file_name1))
 {//print_r($row);
  header('Content-Type: application/force-download' );
  header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
  header('Content-Disposition: attachment; filename="'. stripslashes(stripslashes(substr($file_name1,14))) . '"');
  readfile(PATH_TO_MAIN_PHYSICAL_RECRUITER_EMAIL_ATTACHMENT.$file_name1);
  header('Pragma: no-cache');
 }
 else
 {
  header("location:./");
  exit;
 }
}
else
{
 header("location:./");
 exit;
}
?>