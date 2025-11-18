<?php
session_start();
session_destroy();
header("Location: /shop_mvc/index.php");
?>