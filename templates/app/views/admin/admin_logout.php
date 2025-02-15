<?php
// logout.php
session_start();
session_unset();
session_destroy();
header("Location: admin_login.php"); // Or redirect to user login if applicable
exit;
