<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Галактический вестник</title>
    <link rel="stylesheet" href="layout.css">
</head>

<body class="bodyWorksNews">

<?php
    $servername = "localhost";
    $username = "myUser";
    $password = "q20fNz_IPm1Wq5Cv";
    $dbname = "myuser";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT date, title, announce, content, image FROM news ORDER BY date DESC";
    $sqlDate = "SELECT *, DATE_FORMAT(date, '%d.%m.%Y') as new_date FROM news";
    $result = $conn->query($sql);
    $resultDate = $conn->query($sqlDate);

    while($row = $result->fetch_assoc()){
        if ($result->num_rows > 0) {
        $title[] = $row['title'];
        $announce[] = $row['announce'];
        $content[] = $row['content'];
        $image[] = $row['image'];
        } else {
        echo "0 результатов";
        }
    }

    while($row = $resultDate->fetch_assoc()){
        if ($resultDate->num_rows > 0) {
        $date[] = $row['new_date'];
        } else {
        echo "0 результатов";
        }
    }

    $conn->close();

    $num = count($title);

    $current = 0;
?>

<?php

    foreach($_POST as $key=>$value)
    {
        $keyNews=$key;
        $valueNews=$value;
    }

    if ($valueNews == "Подробнее →")
    {
        $currentNews = array();
        switch($keyNews)
        {
            case "sendId1": 
            $currentNews[0] = $date[0];
            $currentNews[1] = $title[0];
            $currentNews[2] = $announce[0];
            $currentNews[3] = $content[0];
            $currentNews[4] = $image[0];
            break;

            case "sendId2": $currentNews[0] = $date[1];
            $currentNews[1] = $title[1];
            $currentNews[2] = $announce[1];
            $currentNews[3] = $content[1];
            $currentNews[4] = $image[1];
            break;

            case "sendId3": $currentNews[0] = $date[2];
            $currentNews[1] = $title[2];
            $currentNews[2] = $announce[2];
            $currentNews[3] = $content[2];
            $currentNews[4] = $image[2];
            break;

            case "sendId4": $currentNews[0] = $date[3];
            $currentNews[1] = $title[3];
            $currentNews[2] = $announce[3];
            $currentNews[3] = $content[3];
            $currentNews[4] = $image[3];
            break;

            case "sendId5": $currentNews[0] = $date[4];
            $currentNews[1] = $title[4];
            $currentNews[2] = $announce[4];
            $currentNews[3] = $content[4];
            $currentNews[4] = $image[4];
            $id = 1;
            break;

            case "sendId6": $currentNews[0] = $date[5];
            $currentNews[1] = $title[5];
            $currentNews[2] = $announce[5];
            $currentNews[3] = $content[5];
            $currentNews[4] = $image[5];
            $id = 1;
            break;

            case "sendId7": $currentNews[0] = $date[6];
            $currentNews[1] = $title[6];
            $currentNews[2] = $announce[6];
            $currentNews[3] = $content[6];
            $currentNews[4] = $image[6];
            $id = 1;
            break;

            case "sendId8": $currentNews[0] = $date[7];
            $currentNews[1] = $title[7];
            $currentNews[2] = $announce[7];
            $currentNews[3] = $content[7];
            $currentNews[4] = $image[7];
            $id = 1;
            break;

            case "sendId9": $currentNews[0] = $date[8];
            $currentNews[1] = $title[8];
            $currentNews[2] = $announce[8];
            $currentNews[3] = $content[8];
            $currentNews[4] = $image[8];
            $id = 2;
            break;

            case "sendId10": $currentNews[0] = $date[9];
            $currentNews[1] = $title[9];
            $currentNews[2] = $announce[9];
            $currentNews[3] = $content[9];
            $currentNews[4] = $image[9];
            $id = 2;
            break;

            case "sendId11": $currentNews[0] = $date[10];
            $currentNews[1] = $title[10];
            $currentNews[2] = $announce[10];
            $currentNews[3] = $content[10];
            $currentNews[4] = $image[10];
            $id = 2;
            break;

            case "sendId12": $currentNews[0] = $date[11];
            $currentNews[1] = $title[11];
            $currentNews[2] = $announce[11];
            $currentNews[3] = $content[11];
            $currentNews[4] = $image[11];
            $id = 2;
            break;

            case "sendId13": $currentNews[0] = $date[12];
            $currentNews[1] = $title[12];
            $currentNews[2] = $announce[12];
            $currentNews[3] = $content[12];
            $currentNews[4] = $image[12];
            $id = 3;
            break;

            case "sendId14": $currentNews[0] = $date[13];
            $currentNews[1] = $title[13];
            $currentNews[2] = $announce[13];
            $currentNews[3] = $content[13];
            $currentNews[4] = $image[13];
            $id = 3;
            break;

            case "sendId15": $currentNews[0] = $date[14];
            $currentNews[1] = $title[14];
            $currentNews[2] = $announce[14];
            $currentNews[3] = $content[14];
            $currentNews[4] = $image[14];
            $id = 3;
            break;

            case "sendId16": $currentNews[0] = $date[15];
            $currentNews[1] = $title[15];
            $currentNews[2] = $announce[15];
            $currentNews[3] = $content[15];
            $currentNews[4] = $image[15];
            $id = 3;
            break;

            case "sendId17": $currentNews[0] = $date[16];
            $currentNews[1] = $title[16];
            $currentNews[2] = $announce[16];
            $currentNews[3] = $content[16];
            $currentNews[4] = $image[16];
            $id = 4;
            break;
        };
    }
?>

    <header>
        <div class="logo">
            <div class="section_logo_img">
                <img src="Images/logo1.png" />
            </div>
            <div class="logo_text">Галактический вестник</div>
        </div>
    </header>

    <div class="logoLine"> </div>

    <div class="homeBlock">
        <div> <a href="index.php" class="homeTextLink"> Главная </a> / <?php  
        echo $currentNews[1];
        ?> 
        </div> 
    </div>

    <div class="newsBlockWorks">
        <div class="newsWorksDate"> <?php echo $currentNews[0];?> </div>
        <div class="newsWorksAnnounce" style="top:69px;"> <?php echo $currentNews[2];?> </div>
        <div class="newsWorksContent" style="top:341px;"> <?php echo $currentNews[3];?> </div>
        <img class="newsWorksImg" style="top: 455px;" src="Images/<?php echo $currentNews[4];?>">
        
        <?php
            if($keyNews == "sendId1" || $keyNews == "sendId2"|| $keyNews == "sendId3"|| $keyNews == "sendId4")
            {
                echo "
                <form action=\"index.php\" method=\"POST\">
                    <button class=\"newsButtonHome\" style=\"top:1195px;\" style=\"top:69px;\" type=\"submit\" name=\"sendHome\" value = \"← Назад к новостям\"> ← Назад к новостям </button>;
                </form>";
            }
            elseif($keyNews == "sendId5" || $keyNews == "sendId6"|| $keyNews == "sendId7"|| $keyNews == "sendId8")
            {
                echo "
                <form action=\"index.php?id=$id\" method=\"POST\">
                    <button class=\"newsButtonHome\" style=\"top:1195px;\" style=\"top:69px;\" type=\"submit\" name=\"sendHome\" value = \"← Назад к новостям\"> ← Назад к новостям </button>;
                </form>";
            }
            elseif($keyNews == "sendId9" || $keyNews == "sendId10"|| $keyNews == "sendId11"|| $keyNews == "sendId12")
            {
                echo "
                <form action=\"index.php?id=$id\" method=\"POST\">
                    <button class=\"newsButtonHome\" style=\"top:1195px;\" style=\"top:69px;\" type=\"submit\" name=\"sendHome\" value = \"← Назад к новостям\"> ← Назад к новостям </button>;
                </form>";
            }
            elseif($keyNews == "sendId13" || $keyNews == "sendId14"|| $keyNews == "sendId15"|| $keyNews == "sendId16")
            {
                echo "
                <form action=\"index.php?id=$id\" method=\"POST\">
                    <button class=\"newsButtonHome\" style=\"top:1195px;\" style=\"top:69px;\" type=\"submit\" name=\"sendHome\" value = \"← Назад к новостям\"> ← Назад к новостям </button>;
                </form>";
            }
            elseif($keyNews == "sendId17")
            {
                echo "
                <form action=\"index.php?id=$id\" method=\"POST\">
                    <button class=\"newsButtonHome\" style=\"top:1195px;\" style=\"top:69px;\" type=\"submit\" name=\"sendHome\" value = \"← Назад к новостям\"> ← Назад к новостям </button>;
                </form>";
            }
        ?>
    </div>

    <div class="footerLine"> </div>

    <div class="footerText">© 2023 — 2412 «Галактический вестник» </div>

</body>
</html>