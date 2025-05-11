<?php
session_start();
session_unset();
session_destroy();


header("Location: /UEB24_Gr26/index.php");
exit();
