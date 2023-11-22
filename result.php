<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Result</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['color'])) {
        $color = $_SESSION['color'];
        switch ($color) {
            case "zold":
                echo '<style>body { background-image: url(green.jpg);background-repeat: no-repeat;
                    background-position: center;
                    margin: 0;
                    padding: 0;
                    height: 100vh; /* Az oldal teljes magassága */
                    display: flex;
                    align-items: center;
                    justify-content: center;}</style>';
                break;
            case "piros":
                echo '<style>body { background-image: url(red.png);background-repeat: no-repeat;
                        background-position: center;
                        margin: 0;
                        padding: 0;
                        height: 100vh; /* Az oldal teljes magassága */
                        display: flex;
                        align-items: center;
                        justify-content: center;}</style>';
                break;
            case "fekete":
                echo '<style>body { background-image: url(black.jpg);background-repeat: no-repeat;
                    background-position: center;
                    margin: 0;
                    padding: 0;
                    height: 100vh; /* Az oldal teljes magassága */
                    display: flex;
                    align-items: center;
                    justify-content: center;}</style>';
                break;
            case "feher":
                echo '<style>body { background-image: url(white.jpg);background-repeat: no-repeat;
                    background-position: center;
                    margin: 0;
                    padding: 0;
                    height: 100vh; /* Az oldal teljes magassága */
                    display: flex;
                    align-items: center;
                    justify-content: center;}</style>';
                break;
            case "sarga":
                echo '<style>body { background-image: url(yellow.jpg);background-repeat: no-repeat;
                    background-position: center;
                    margin: 0;
                    padding: 0;
                    height: 100vh; /* Az oldal teljes magassága */
                    display: flex;
                    align-items: center;
                    ustify-content: center;}</style>';
                break;
            case "kek":
                echo '<style>body { background-image: url(blue.jpg);background-repeat: no-repeat;
                    background-position: center;
                    margin: 0;
                    padding: 0;
                    height: 100vh; /* Az oldal teljes magassága */
                    display: flex;
                    align-items: center;
                    justify-content: center;}</style>';
                break;
        }



        unset($_SESSION['color']);
    } else {
        echo "Nincs elérhető szín információ";
    }
    ?>
</body>

</html>