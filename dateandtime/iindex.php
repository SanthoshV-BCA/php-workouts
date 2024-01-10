<html>


<?php
echo ("today is " . date("D / M / Y"));
echo ("<br>today is " . date("d / m / y"));
//print only day
echo ("<br>todya is " . date("l"));
//print only year
echo ("<br>year is" . date("Y"));
//time
echo ("<br>time is " . date("h:i:sa"));

date_default_timezone_set("America/New_York");
echo ("<br>time is " . date("h:i:sa"));
?>

</html>