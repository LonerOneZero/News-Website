<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Галактический вестник</title>
    <link rel="stylesheet" type="text/css" href="layout.css">
</head>

<body>

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
    $uri = $_SERVER['REQUEST_URI'];

    if($uri == '/news/index.php') $id=1;
    else {$id = $_GET['id']; $id++;}
?>
    
<?php 
    $articles = [
        [],
        [
            'dateInfoPage' => $nextDate = [$date[4], $date[5],$date[6],$date[7]],
            'titleInfoPage' => $nextTitle = [$title[4], $title[5],$title[6],$title[7]],
            'announceInfoPage' => $nextAnnounce = [$announce[4], $announce[5],$announce[6],$announce[7]],
            'buttonInfoPage' => $nextButton = ["sendId5", "sendId6", "sendId7", "sendId8"],
        ],
        [
            'dateInfoPage' => $nextDate = [$date[8], $date[9],$date[10],$date[11]],
            'titleInfoPage' =>$nextTitle = [$title[8], $title[9],$title[10],$title[11]],
            'announceInfoPage' =>$nextAnnounce = [$announce[8], $announce[9],$announce[10],$announce[11]],
            'buttonInfoPage' => $nextButton = ["sendId9", "sendId10", "sendId11", "sendId12"],
        ],
        [
            'frameNavPage' => ' <div class="frameBlock">
        <a href="index.php" class="frameNavButton" style="text-decoration:none;" type="submit" name="firstPage" value="1" > 1 </a>
        <a href="index.php?id=4" class="frameNavButton"  style="left: 111px; text-decoration:none;" type="submit" name="fourthPage" value="4"> 4 </a>
        <a href="index.php?id='.$id.'" class="frameNavPointerButton" style="left: 213px; text-decoration:none;" type="submit" name="nextPage"> → </a>
            </div>',
            'dateInfoPage' => $nextDate = [$date[12], $date[13],$date[14],$date[15]],
            'titleInfoPage' => $nextTitle = [$title[12], $title[13],$title[14],$title[15]],
            'announceInfoPage' =>$nextAnnounce = [$announce[12], $announce[13],$announce[14],$announce[15]],
            'buttonInfoPage' => $nextButton = ["sendId13", "sendId14", "sendId15", "sendId16"],
        ],
        [
        'frameNavPage' => ' <div class="frameBlock">
        <a href="index.php" class="frameNavButton" style="text-decoration:none;" type="submit" name="firstPage" value="1" > 1 </a>
        <a href="index.php?id=5" class="frameNavButton"  style="left: 111px; text-decoration:none;" type="submit" name="fourthPage" value="5"> 5 </a>
            </div>',
            'dateInfoPage' => $nextDate = [$date[16]],
            'titleInfoPage' => $nextTitle = [$title[16]],
            'announceInfoPage' => $nextAnnounce = [$announce[16]],
            'buttonInfoPage' => $nextButton = ["sendId17"],
        ]
    ];
?>

    <header>
        <div class="logo">
            <div class="section_logo_img">
                <img src="Images/logo1.png" />
            </div>
            <div class="logo_text">Галактический вестник</div>
        </div>
    </header>

    <img class="ban_image" src="Images/<?php echo $image[$num-1] ?>"/>

    <div class="ban_title"> <?php echo $title[$num-1] ?> </div>
    <div class="ban_announce"> <?php echo $announce[$num-1] ?> </div>


    <div class="newsText"> Новости </div>

    <?php 
        if($uri == '/news/index.php?id=4')
        {
            $tempId = $_GET['id'];
            $article = $articles[$tempId];
            $button = $article['buttonInfoPage'][0];
            $articleDate = $article['dateInfoPage'][0];
            $articleTitle = $article['titleInfoPage'][0];
            $articleAnnounce = $article['announceInfoPage'][0];
            echo"
            <div class=\"newsBlock\" style=\"top: 1007px;left: 201px;\">
                <div class=\"newsDate\">
                    $articleDate 
                </div>
        
                <div class=\"newsTitle\" style =\"top: 64px;\">     
                    $articleTitle
                </div>
        
                <div class=\"newsAnnounce\" style =\"top: 164px;\"> 
                    $articleAnnounce
                </div>
        
                <form action=\"works_news.php\" method=\"POST\">
                    <button class=\"newsButton\" style=\"top: 324px;\" type=\"submit\" name=\" $button \" value = \"Подробнее →\"> Подробнее → </button>;
                </form>  
            </div>
            ";
            $current++;
        }
    ?>

    <?php
        if(!isset($_GET['id']) || $_GET['id']==1 || $_GET['id']==2)
        {
        echo '<div class="frameBlock">
        <a href="index.php" class="frameNavButton" style="text-decoration:none; " type="submit" name="firstPage" value="1" > 1 </a>
        <a href="index.php?id=1" class="frameNavButton" style="left: 71px; text-decoration:none;" type="submit" name="secondPage" value="2"> 2 </a>
        <a href="index.php?id=2" class="frameNavButton" style="left: 142px; text-decoration:none;" type="submit" name="thirdPage"> 3 </a>
        <a href="index.php?id='. $id .'" class="frameNavPointerButton" style="left: 213px; text-decoration:none;" type="submit" name="nextPage"> → </a>
        </div>';
        }
        elseif(!isset($articles[$_GET['id']]))
        echo '<h1>Ошибка: страница не существует.</h1>';
        else
        {
        $article = $articles[$_GET['id']]; 
        $frameNavPage = $article['frameNavPage'];
        echo $frameNavPage;
        }
    ?>

    <div class="footerLine"> </div>

    <div class="footerText">© 2023 — 2412 «Галактический вестник» </div>
   
    <div class="newsBlock" style="top: 1007px;left: 201px; ">
        <div class="newsDate"> 
            <?php  
                if(!isset($_GET['id']))
                {
                    echo $date[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['dateInfoPage'][0];
                }
            ?> 
        </div>
        
        <div class="newsTitle" style ="top: 64px;"> 
            <?php
                if(!isset($_GET['id']))
                {
                    echo $title[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['titleInfoPage'][0];
                }
            ?> 
        </div>
        
        <div class="newsAnnounce" style ="top: 164px;"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $announce[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['announceInfoPage'][0];
                }
            ?> 
        </div>
        
        <form action="works_news.php" method="POST">
            <?php
                if(!isset($_GET['id']))
                {
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="sendId1" value = "Подробнее →"> Подробнее → </button>';
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']]; 
                    $button = $article['buttonInfoPage'][0];
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="' . $button . '" value = "Подробнее →"> Подробнее → </button>;';
                }
            ?>
        </form>

        <?php $current++?>
    </div>

    <div class="newsBlock" style="top: 1007px; left: 980px; display: <?php if($uri == '/news/index.php?id=4') echo none;?>;">
        <div class="newsDate"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $date[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    
                    $article = $articles[$_GET['id']];
                    echo $article['dateInfoPage'][1];
                   
                }
            ?> 
        </div>
        
        <div class="newsTitle" style ="top: 64px;"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $title[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['titleInfoPage'][1];
                }
            ?> 
        </div>
        
        <div class="newsAnnounce" style ="top: 164px;"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $announce[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['announceInfoPage'][1];
                }
            ?> 
        </div>
        
        <form action="works_news.php" method="POST">
            <?php
                if(!isset($_GET['id']))
                {
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="sendId2" value = "Подробнее →"> Подробнее → </button>';
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']]; 
                    $button = $article['buttonInfoPage'][1];
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="' . $button . '" value = "Подробнее →"> Подробнее → </button>;';
                }
            ?>
        </form>

        <?php $current++?>
    </div>
    
    <div class="newsBlock" style="top: 1422px; left: 201px;">
        <div class="newsDate"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $date[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['dateInfoPage'][2];
                }
            ?> 
        </div>

        <div class="newsTitle" style ="top: 64px;"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $title[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['titleInfoPage'][2];
                }
            ?> 
        </div>
        
        <div class="newsAnnounce" style ="top: 164px;"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $announce[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['announceInfoPage'][2];
                }
            ?> 
        </div>
        
        <form action="works_news.php" method="POST">
            <?php
                if(!isset($_GET['id']))
                {
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="sendId3" value = "Подробнее →"> Подробнее → </button>';
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']]; 
                    $button = $article['buttonInfoPage'][2];
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="' . $button . '" value = "Подробнее →"> Подробнее → </button>;';
                }
            ?>
        </form>
        
        <?php $current++?>
    </div>

    <div class="newsBlock" style="top: 1422px; left: 980px;">
        <div class="newsDate"> 
            <?php  
            if(!isset($_GET['id']))
                {
                    echo $date[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['dateInfoPage'][3];
                }
            ?> 
        </div>
        
        <div class="newsTitle" style ="top: 64px;" name="titleSend"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $title[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['titleInfoPage'][3];
                }
            ?> 
        </div>
        
        <div class="newsAnnounce" style ="top: 164px;"> 
            <?php 
                if(!isset($_GET['id']))
                {
                    echo $announce[$current];
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']];
                    echo $article['announceInfoPage'][3];
                }
            ?> 
        </div>
        
        <form action="works_news.php" method="POST">
            <?php
                if(!isset($_GET['id']))
                {
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="sendId4" value = "Подробнее →"> Подробнее → </button>';
                }
                elseif(!isset($articles[$_GET['id']]))
                    echo '<h1>Ошибка: страница не существует.</h1>';
                else
                {
                    $article = $articles[$_GET['id']]; 
                    $button = $article['buttonInfoPage'][3];
                    echo '<button class="newsButton" style="top: 324px;" type="submit" name="' . $button . '" value = "Подробнее →"> Подробнее → </button>;';
                }
            ?>
        </form>

        <?php $current++?>
    </div>



</body>
</html>