<?php
$cookiename = "sample cookies";
$cookievalue = "summa cookies"
    ?>
<html>

<body>
    <?php

    if (!isset($cookiename)) {
        echo ("cookie name" . $cookiename . " not set");
    } else {
        echo ("cookie " . $cookiename . " setted");
    }
    ?>
</body>

</html>