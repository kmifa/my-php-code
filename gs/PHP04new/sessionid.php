<?php
session_start();
//$nextWeek = time();
//echo  date('Y-m-d H:i:s', $nextWeek);
//echo session_id();
///echo md5("yamazaki");
echo password_hash("yamazaki", PASSWORD_DEFAULT);
?>