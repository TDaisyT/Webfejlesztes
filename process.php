<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adatok";

$conn = new mysqli($servername, $username, $password, $dbname); //kapcsolat létrehozása

//kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
} else {
    echo ("Succeded in connecting." . "<br>");
}

$file = fopen("password.txt", "r");
//convert to hex
$getfile = file_get_contents("password.txt");
$bintohex = bin2hex($getfile);
//convert to dec and use keys
$hextodec = "";
$text = "";
$keys = array(5, -14, 31, -9, 3);
$keysindex = 0;
for ($i = 0; $i < strlen($bintohex); $i += 2) {
    $converter = hexdec(substr($bintohex, $i, 2)); //miből, mettől, mennyit

    if ($converter === 10) {
        $keysindex = 0;
        $text .= "\n";
    } else {
        $converter = $converter - $keys[$keysindex];
        $text = $text . chr($converter);
        $hextodec =  $hextodec . $converter . " ";
        $keysindex++;
        if ($keysindex >= count($keys)) {
            $keysindex = 0;
        }
    }
}

//echo "<pre>" . $text . "</pre>";
fclose($file);



$conn->close();
