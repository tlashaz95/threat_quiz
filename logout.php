<?php
session_start();
unset($_SESSION['sldr']);
session_destroy();

echo '<script type="text/javascript">location.href = "index.php";</script>';
?>