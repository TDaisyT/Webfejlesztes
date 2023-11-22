<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url(ps.jpg);
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* Az oldal teljes magassága */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message {
            text-transform: uppercase;
            color: white;
            font-size: 60px;
            margin-bottom: 20px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php

    echo '<div class="message">Incorrect Password!</div>';
    header("Refresh:3; url=https://www.police.hu/");
    ?>
</body>

</html>