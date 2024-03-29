<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adatok";
$table = "tabla";

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
        $keysindex++;
        if ($keysindex >= count($keys)) {
            $keysindex = 0;
        }
    }
}

$lines = explode("\n", $text);

foreach ($lines as $line) {
    if (empty($line)) { //ha jelenlegi sor üres, rálép a kövire
        continue;
    }
    $parts = explode("*", $line);
    $user = array('email' => $parts[0], 'password' => $parts[1]);
    $users[] = $user;
}
foreach ($users as $user) {
    echo $user['email'] . " " . $user['password'];
}



fclose($file);


//Űrlap ellenőrzés
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $foundUser = null;


    $sql = "SELECT * FROM $table WHERE Username = '$username'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // $row létrehozása
        $isPasswordCorrect = false;
        foreach ($users as $user) {
            if ($user['email'] == $row['Username'] && $user['password'] == $password) {
                $isPasswordCorrect = true;
                break;
            }
        }
        if ($isPasswordCorrect) {
            $foundUser = $row;
            session_start();
            $_SESSION['color'] = $foundUser["Titkos"];
            header("Location: result.php");
            exit();
        } else {
            header("Location: password.php");
        }
    } else {
        echo '<script>
        alert("There is no such user");
        window.location.href = "index.php";
    </script>';
    }
}



$conn->close();
