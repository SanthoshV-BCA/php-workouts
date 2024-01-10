<?php
$sample = "<h2>this <p>is sample</p> text</h1>";
$sample1 = filter_var($sample, FILTER_SANITIZE_STRING);
echo $sample1;
$a = "sam";
if (!filter_var($a, FILTER_VALIDATE_INT)) {
    echo ("it's not a integer");
} else {
    echo ("it's a integer");
}
$ipaddress = "192.168.19.2";
if (!filter_var($ipaddress, FILTER_VALIDATE_IP) === false) {
    echo ("valid ip");
} else {
    echo ("invalid ip");
}
$email = "santhosh072002@gmail.com";
echo ("original email: " . $email);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

echo (" sanitize email: " . $email);
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo ("valid email");
} else {
    echo ("invalid email");
}
//filter advance
if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo("your email is sanitized");
}else{
    echo("your email is not sanitized");
}
if(filter_var($ipaddress, FILTER_FLAG_IPV4)){
    echo("your is valid ip");
    
}else{
    echo("invalid ip and not sanitized");
}



?>