<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Coder-Man Game</title>
    <link rel="stylesheet" href="css/reset.css" media="screen" title="no title">
    <link rel="stylesheet" href="main.nested.css" media="screen" title="no title">
</head>

<body>

    <audio src="sounds/main.mp3" loop autoplay></audio>
    <section id="startGame">
        <div class="container">
            <header>
                <div>CODER-MAN GAME</div>
            </header>
            <div class="manual">
                <ul>
                    <li>Use arrow keys to move inside the maze.</li>
                    <li>Collect all the items to go to the next Level.</li>
                    <li>Avoid the walls! The collision with the wall ends the game!</li>
                    <li>Each collected coin increases Your score.</li>
                    <li>Find the Acceleration Item to increase your movement speed.</li>
                </ul>
            </div>
            <div class="player">
                <form action="index.html" method="get">
                    <input type="text" name="name" value="<?php if(!isset($_SESSION['mojeimie'])){
                            $_SESSION['mojeimie'] = " ";
                        } else {
                            echo($_SESSION['mojeimie']);
                        }  ?>" placeholder="Your Name" id="playerName">
                </form>
                <p>Choose your avatar:</p>
                <div class="avatars">
                    <div class="avatarsRow">
                        <div class="avatar1"></div>
                        <div class="avatar2"></div>
                        <div class="avatar3"></div>
                        <div class="avatar4"></div>
                        <div class="avatar5"></div>
                    </div>
                    <div class="avatarsRow">
                        <div class="avatar6"></div>
                        <div class="avatar7"></div>
                        <div class="avatar8"></div>
                        <div class="avatar9"></div>
                        <div class="avatar10"></div>
                    </div>
                    <div class="avatarsRow">
                        <div class="avatar11"></div>
                        <div class="avatar12"></div>
                        <div class="avatar13"></div>
                        <div class="avatar14"></div>
                        <div class="avatar15"></div>
                    </div>
                    <div class="avatarsRow">
                        <div class="avatar16"></div>
                        <div class="avatar17"></div>
                        <div class="avatar18"></div>
                        <div class="avatar19"></div>
                        <div class="avatar20"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <footer>
                <div id="startButton">
                    <span>START</span>
                </div>
            </footer>
        </div>
    </section>

    <section id="screnGameBoard">
        <div class="flex">
            <div class="score">
              SCORE <p id="scoreVal"></p>
            </div>
            <div class="level">
              LEVEL <p id="levelVal"></p>
            </div>
        <section class="containerCube">
            <div id="cube" class="show-front">
                <figure class="front board" id="show-front">
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                </figure>

                <figure class="back board" id="show-back">
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                </figure>

                <figure class="right board" id="show-right">
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                </figure>

                <figure class="left board" id="show-left">
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                </figure>

                <figure class="top board" id="show-top">
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                </figure>

                <figure class="bottom board" id="show-bottom">
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                    <div class="wall"></div>
                </figure>
            </div>
            </div>
        </section>
    </section>

    <section id="gameOver">
        <div class="flex">
        <div class="container">
            <header>
                <div class="">
                    GAME OVER!
                </div>
            </header>
            <div class="scoreTable">
                <table id="bestResults">
                    <caption>TOP 10</caption>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Score
                        </th>
                    </tr>
                </table>
            </div>
            <div class="scorePlayer">
                <div></div>
                <p class="playerScoreInfo"></p>
                <p class="playerLevelInfo"></p>
            </div>
            <div class="clear"></div>
            <footer>
                <div id="mainScreenButton">
                    <span>MAIN SCREEN</span>
                </div>
                <div id="playAgainButton">
                    <span>PLAY AGAIN</span>
                </div>
            </footer>
        </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/app.js">
    </script>

</body>

</html>
