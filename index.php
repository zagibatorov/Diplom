<?php 
    require_once 'connect.php';
    session_start();

    $messages = [];

    if(isset($_SESSION['user_login'])){
        $login = $_SESSION['user_login'];
    } else{
        $login = '';
    }

    if(isset($_SESSION['successAuth'])){
        $messages[] = $_SESSION['successAuth'];
        unset($_SESSION['successAuth']);
    }

    if(isset($_SESSION['successReg'])){
        $messages[] = $_SESSION['successReg'];
        unset($_SESSION['successReg']);
    }

    if(isset($_SESSION['errorAuth'])){
        $messages[] = $_SESSION['errorAuth'];
        unset($_SESSION['errorAuth']);
    }

    if(isset($_SESSION['emptyFields'])){
        $messages[] = $_SESSION['emptyFields'];
        unset($_SESSION['emptyFields']);
    }

    if(isset($_SESSION['emptyFieldsReg'])){
        $messages[] = $_SESSION['emptyFieldsReg'];
        unset($_SESSION['emptyFieldsReg']);
    }

    if(isset($_SESSION['logout'])){
        $messages[] = $_SESSION['logout'];
        unset($_SESSION['logout']);
    }

    $query = "SELECT * FROM `news` ORDER BY `created_at` DESC";
    $result = mysqli_query($link, $query);

    $news = [];
    while($row = mysqli_fetch_assoc($result)){
        $news[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castle Crashers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="messageBlock">
            <p>Ну здарова, <?php echo $login ?></p>
            <?php foreach($messages as $message): ?>
                <p> <?php echo htmlspecialchars($message); ?></p>
            <?php endforeach; ?>
        </div>

        <!-- Полноэкранные картинки по клику в media -->
        <div class="imgMediaFullTL">
            <div class="fullImage TL"></div>
            <div class="closeBtnTL"></div>
        </div>
        <div class="imgMediaFullTR">
            <div class="fullImage TR"></div>
            <div class="closeBtnTR"></div>
        </div>
        <div class="imgMediaFullBL">
            <div class="fullImage BL"></div>
            <div class="closeBtnBL"></div>
        </div>
        <div class="imgMediaFullBR">
            <div class="fullImage BR"></div>
            <div class="closeBtnBR"></div>
        </div>

        <!-- Окно регистрации/авторизации -->
         <div class="authRegBlock">
            <div class="authRegWindow">
                <h1>Авторизация</h1>
                <form method="POST" action="auth.php">
                    <label for="login">Логин</label>
                    <input name="login" value="<?php echo isset($_SESSION['saved_login']) ? htmlspecialchars($_SESSION['saved_login']) : ''; ?>">
                    <label for="pass">Пароль</label>
                    <input name="pass">
                    <input type="submit" value="Войти" class="submitBtn">
                </form>

                <h1>Регистрация</h1>
                <form method="POST" action="register.php">
                    <label for="newLogin">Логин</label>
                    <input name="newLogin" value="<?php echo isset($_SESSION['saved_reg_login']) ? htmlspecialchars($_SESSION['saved_reg_login']) : ''; ?>">
                    <label for="newPass">Пароль</label>
                    <input name="newPass">
                    <input type="submit" value="Зарегистрироваться" class="submitBtn">
                </form>

                <div class="closeAuthRegBtn"></div>
            </div>
         </div>
        
        <!-- Окно скидки -->
        <?php if(!isset($_SESSION['isAuth']) || !$_SESSION['isAuth']): ?>
            <div class="requestBlock">
                <div class="requestWindow">
                    <div class="contentLeft"></div>
                    <div class="contentRight">
                        <div class="closeRequestWindowBtn"></div>
                        <h1>Зарегистрируйтесь, чтобы получить скидку!</h1>
                        <div class="authRegBtn">Войти</div>

                        <div class="discountBlock">
                            <button class="getCodeBtn">Получить код на скидку</button>
                            <div class="discountCode"></div>
                        </div>
                    </div>
                   
                </div>
            </div>
        <?php endif; ?>

        <div class="createNewBlock">
            <div class="createNewWindow">
                <form action="create_new.php" method="POST" enctype="multipart/form-data">
                    <label for="headerText">Заголовок новости:</label>
                    <input name="headerText" type="text" class="headerText">

                    <label for="blockText">Текст новости:</label>
                    <textarea name="blockText" class="blockText"></textarea>

                    <label for="newsImage">Изображение новости:</label>
                    <input name="newsImage" type="file" accept="image/*" class="addImageBtn">

                    <input type="submit" value="Создать новость" class="createNewBtn">
                </form>

                <div class="closeCreateNewBlockBtn"></div>
            </div>
        </div>

        <!-- Хэдэр -->
        <div class="header">
            <div class="headerImg">
                <img src="./images/image 1.png" alt="">
            </div>
            <div class="headerButtons">
                <div class="headerBtn" id="toAbout"><p>Об игре</p></div>
                <div class="headerBtn" id="toChar"><p>Персонажи</p></div>
                <div class="headerBtn" id="toMedia"><p>Медиа</p></div>
                <div class="headerBtn" id="toNews"><p>Новости</p></div>
                <div class="headerBtn" id="toFooter"><p>Ссылки</p></div>

                <?php if(isset($_SESSION['isAuth']) && $_SESSION['isAuth']): ?>
                    <div class="headerBtn" id="logout"><p>Выйти</p></div>
                <?php else: ?>  
                    <div class="headerBtn" id="auth"><p>Войти</p></div>  
                <?php endif; ?>  
            </div>

            <div class="menuBurger">
                <div class="elem"></div>
                <div class="elem"></div>
                <div class="elem"></div>
            </div>

            <div class="headerButtonsMobile">
                <div class="headerBtnMobile" id="toAboutMob"><p>Об игре</p></div>
                <div class="headerBtnMobile" id="toCharMob"><p>Персонажи</p></div>
                <div class="headerBtnMobile" id="toMediaMob"><p>Медиа</p></div>
                <div class="headerBtnMobile" id="toFooterMob"><p>Ссылки</p></div>
            </div>
        </div>

        <!-- Главный экран -->
        <div class="mainScreen">
            <div class="video">
                <video autoplay loop muted playsinline>
                    <source src="./video/videoMain.mp4" type="video/mp4">
                </video>
            </div>
            <div class="contentWrap">
                <div class="abbreviation">
                    <p>Отмеченная наградами приключенческая 2D-аркада!</p>
                </div>
                <div class="mainScreenImg">
                    <img src="./images/image 5.png" alt="">
                </div>
                <div class="buyButtons">
                    <a href="https://www.xbox.com/ru-RU/games/store/castle-crashers/bwjnwbb7mcft" class="buyBtn">
                        <img src="./images/Xbox_one_logo.png" alt="">
                        <p class="buyBtnText">Xbox <br> One</p>
                    </a>
                    <a href="https://www.nintendo.com/us/store/products/castle-crashers-remastered-switch/" class="buyBtn">
                        <img src="./images/Nintendo_Switch_Logo.png" alt="">
                        <p class="buyBtnText">Nintendo Switch</p>
                    </a>
                    <a href="https://store.steampowered.com/app/204360/Castle_Crashers/" class="buyBtn">
                        <img src="./images/Steam_Logo.png" alt="">
                        <p class="buyBtnText">Steam</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Об игре -->
        <div class="about" id="aboutBlock">
            <div class="blackFilter">
                <div class="insideBlackFilter">
                    <div class="left">
                        <div class="abbreviation">
                            <p>Об игре</p>
                        </div>
                        <div class="left-text">
                            <p>Рубите, рассекайте и разбивайте на куски множество разнообразных врагов, боссов и локаций, чтобы одолеть зло, вернуть волшебный кристалл и спасти принцесс! <br> Или объединяйтесь с друзьями в мультиплеере, чтобы сделать ваше приключение еще более захватывающим и наполненным экшена!</p>
                        </div>
                    </div>
                    <div class="right">
                        <img src="images/helmets.png" alt="">
                    </div>
                </div>
                <div class="bottomAboutImg">
                     <div class="imgPart">
                        <img src="./images/splitImages/red.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/orange.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/green.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/blue.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/pink.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/bear.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/Alien.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/king.png" alt="">
                     </div>
                     <div class="imgPart">
                        <img src="./images/splitImages/iceking.png" alt="">
                     </div>
                </div>
            </div>
        </div>
        <!-- Персонажи -->
        <div class="characters" id="charBlock">
            <div class="abbreviation">
                <p>Взгляните на нескольких персонажей!</p>
            </div>
            <div class="card">
                <div class="prev controls">
                    <div class="slideBtnElem"></div>
                    <div class="slideBtnElem"></div>
                </div>
                    <div class="charContainer">
                        <div class="char">
                            <div class="charImg">
                                <img src="./images/Blacksmith 1.png" alt="">
                            </div>
                            <div class="charInfo">
                                <div class="charInfoContainer">
                                    <div class="charName">
                                        <p>Кузнец</p>
                                    </div>
                                    <div class="charText">
                                        <p>Также известный как "фиолетовый рыцарь", он является одним из самых опытных рыцарей, а также любителем ковать оружия в собственной кузнице.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="char">
                            <div class="charImg">
                                <img src="./images/Alien_Portrait 2.png" alt="">
                            </div>
                            <div class="charInfo">
                                <div class="charInfoContainer">
                                    <div class="charName">
                                        <p>Пришелец</p>
                                    </div>
                                    <div class="charText">
                                        <p>Забавный гуманоид с другой планеты, готовый начать сеять хаос при необходимости. Или же если ему просто захочется</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="char">
                            <div class="charImg">
                                <img src="./images/Necromancer_Portrait 2.png" alt="">
                            </div>
                            <div class="charInfo">
                                <div class="charInfoContainer">
                                    <div class="charName">
                                        <p>Некромант</p>
                                    </div>
                                    <div class="charText">
                                        <p>Великий и грозный злодей, а также правая рука Злого Волшебника, которому не проблема поднять парочку нежити.</p>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <div class="char">
                            <div class="charImg">
                                <img src="./images/Civilian_Portrait 3.png" alt="">
                            </div>
                            <div class="charInfo">
                                <div class="charInfoContainer">
                                    <div class="charName">
                                        <p>Гражданин</p>
                                    </div>
                                    <div class="charText">
                                        <p>Обычный житель королевства, всегда готовый защитить себя! И, прежде всего, свой огород.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="char">
                            <div class="charImg">
                                <img src="./images/Bear_Portrait 2.png" alt="">
                            </div>
                            <div class="charInfo">
                                <div class="charInfoContainer">
                                    <div class="charName">
                                        <p>Медведь</p>
                                    </div>
                                    <div class="charText">
                                        <p>Мало что известно об этих существах и их племени. За исключением того, что они поклоняются некой кошке-амфибии.</p>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <div class="pages">
                            <a class="cardNum pageActive"></a>
                            <a class="cardNum"></a>
                            <a class="cardNum"></a>
                            <a class="cardNum"></a>
                            <a class="cardNum"></a>
                        </div>
                    </div>
                    <div class="next controls">
                        <div class="slideBtnElem"></div>
                        <div class="slideBtnElem"></div>
                    </div>
            </div>
        </div>
        <div class="media" id="mediaBlock">
            <div class="blackFilter">
                <div class="abbreviation">
                    <p>Медиа</p>
                </div>
                <div class="imagesMedia">
                    <div class="imagesTop">
                        <div class="imgMedia">
                            <img src="./images/BackOffPic.png" alt="">
                        </div>
                        <div class="imgMediaGif">
                            <img src="./images/gifs/animation.gif" alt="">
                        </div>
                        <div class="imgMedia">
                            <img src="./images/AlienShip 1.png" alt="">
                        </div>
                    </div>
                    <div class="imagesBottom">
                        <div class="imgMedia">
                            <img src="./images/BarbarianBoss 1.png" alt="">
                        </div>
                        <div class="imgMedia">
                            <img src="./images/LavaWorldPic.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news" id="newsBlock">
            <div class="abbreviation">
                <p>Новости</p>
            </div>
            <div class="newsContainer"> 
                <?php 
                    $getNews = "SELECT * FROM `news` ORDER BY `created_at` DESC";
                    $getNewsQuery = mysqli_query($link, $getNews);

                    if(mysqli_num_rows($getNewsQuery) > 0){
                        while($news = mysqli_fetch_assoc($getNewsQuery)){
                            echo '<div class = "new" data-id="' . $news['id'] . '" >';
                            
                            // echo '<p>' . $news['id'] . '</p>' . '<br>';
                            echo '<div class = "newsImage">';
                            if(!empty($news['image_path']) && file_exists($news['image_path'])){
                                echo '<img src="' . htmlspecialchars($news['image_path']) . '" alt="News image">';
                            } else {
                                echo '<div class="no-image">Нет изображения</div>';
                            }
                            echo '</div>';

                            echo '<div class = "newsHeader">' . '<h1>' . $news['header'] . '</h1>' . '</div>';
                            echo '<div class = "newsText">' . '<p>' . $news['content'] . '</p>' . '</div>';

                            // onclick="return confirm(\'Удалить новость?\')
                            if(isset($_SESSION['isAuth']) && $_SESSION['user_role'] == 'admin'){
                                echo '<a href="delete_new.php?id=' . $news['id'] . '" class="deleteNewBtn" ">Удалить</a>';
                            }
                            echo '</div>';
                        }
                    } else {
                        echo '<p style="color: white;">Новостей пока нет</p>';
                    }                    
                ?>
            </div>
        <?php if(isset($_SESSION['isAuth']) && $_SESSION['user_role'] == 'admin') : ?>
            <div class="openCreateNewBlock">Создать новость</div>
        <?php endif; ?>
        </div>
        <div class="footer" id="footer">
            <div class="footerLogo">
                <a href="https://www.thebehemoth.com/"><img src="./images/Фото слева.png" alt=""></a>
            </div>
            <div class="logos">
                <div class="logo">
                    <div class="logoImg">
                        <a href="https://www.castlecrashers.com" class="logoImg"><img src="./images/Chicken.png" alt=""></a>
                    </div>
                    <div class="logoText">
                        <p>Офиц. сайт</p>
                    </div>
                </div>
                <div class="logo">
                    <div class="logoImg">
                        <a href="https://www.youtube.com/@TheBehemothGames/videos" class="logoImg"><img src="./images/Youtube_logo.png" alt=""></a>
                    </div>
                    <div class="logoText">
                        <p>Ютуб</p>
                    </div>
                </div>
                <div class="logo">
                    <div class="logoImg">
                        <a href="https://www.twitch.tv/thebehemoth" class="logoImg"><img src="./images/Twitch_logo11.png" alt=""></a>
                    </div>
                    <div class="logoText">
                        <p>Твич</p>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="script.js"></script>
</body>
</html>