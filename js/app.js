document.addEventListener("DOMContentLoaded", function() {

    var indexPlayer = 60;
    var screenStart = $('#startGame');
    var screnGameBoard = $('#screnGameBoard');
    var screenGameOver = $('#gameOver');
    var cube = screnGameBoard.find('#cube');
    var cubeSide = $('#showFront');
    var board = cube.find('.board');
    var boardDivs = cubeSide.find('div');
    var playerNameInput = screenStart.find('#playerName');
    var startButton = screenStart.find('#startButton');
    var musicSwitch = screenStart.find('#music');
    var soundSwitch = screenStart.find('#sound');
    var playerScoreInfo = screenGameOver.find("p.playerScoreInfo");
    var playerLevelInfo = screenGameOver.find('p.playerLevelInfo');
    var bestResultsTable = screenGameOver.find('div.scoreTable #bestResults');
    var playAgainButton = screenGameOver.find('#playAgainButton');
    var mainScreenButton = screenGameOver.find('#mainScreenButton');
    var avatarClass = "";
    var gameSpeed = 500;
    var isSoundOn = true;
    var isMusicOn = true;
    var mainMusic = new Audio('sounds/main.mp3');
    var coinSound = new Audio('sounds/coin.mp3');
    var nextLevelSound = new Audio('sounds/next-level.mp3');
    var speedSound = new Audio('sounds/speed.mp3');

    var Player = function(x, y, direction) {
        this.x = 0;
        this.y = 0;
        this.direction = direction;
    };

    var Game = function() {
        this.board = boardDivs;
        this.player = new Player(0, 0, '');
        this.showScore = $('#scoreVal');
        this.score = 0;
        this.showLevel = $('#levelVal');
        this.level = 1;
        self = this;
    };

    Game.prototype.showPlayer = function() {
        for (var i = 0; i < this.board.length; i++) {
            $(this.board.eq(i)).removeClass(avatarClass);
        }
        $(this.board.eq(indexPlayer)).addClass(avatarClass);
    };

    Game.prototype.moveDirection = function(event) {
        if (event.which == 37) {
            self.player.direction = 'left';
        } else if (event.which == 38) {
            self.player.direction = 'up';
        } else if (event.which == 39) {
            self.player.direction = 'right';
        } else if (event.which == 40) {
            self.player.direction = 'down';
        }
    };

    Game.prototype.position = function(x, y) {
        if (this.player.direction == 'right') {
            x += 1;
        } else if (this.player.direction == 'left') {
            x -= 1;
        } else if (this.player.direction == 'up') {
            y -= 1;
        } else if (this.player.direction == 'down') {
            y += 1;
        }
        indexPlayer += x + y * 11;
    };

    Game.prototype.speedCollision = function() {
        if ($(this.board.eq(indexPlayer)).hasClass('speed')) {
            $(this.board.eq(indexPlayer)).removeClass('speed');
            gameSpeed -= (gameSpeed * 0.2);
            clearInterval(start);
            start = setInterval(function() {
                self.oneStep();
            }, gameSpeed);
            playSound(speedSound);
        }
    };

    Game.prototype.coinCollision = function() {
        if ($(this.board.eq(indexPlayer)).hasClass('coin')) {
            $(this.board.eq(indexPlayer)).removeClass('coin');
            this.score += 1;
            this.showScore.text(this.score);
            playSound(coinSound);
        }
    };

    Game.prototype.nextLevel = function() {
        var arrayItemsTemp = [];

        for (var i = 0; i < boardDivs.length; i++) {
            if (boardDivs.eq(i).hasClass('coin') || boardDivs.eq(i).hasClass('speed')) {
                arrayItemsTemp.push(i);
            }
        }
        if (arrayItemsTemp.length === 0) {
            boardDivs.eq(indexPlayer).removeClass(avatarClass);
            cubeAnimate();
        }
    };

    Game.prototype.gameOver = function() {
        var tempWall = 0;
        var inputVal = playerNameInput.val();

        if ($(this.board.eq(indexPlayer)).hasClass('wall')) {
            clearInterval(start);
            sendScore();
            boardDivs.eq(indexPlayer).removeClass(avatarClass);
            playerScoreInfo.html("Congratulations <span class='playerInfo'>" + inputVal + "</span><br>Your score: <span class='playerInfo'> " + gg.score + "</span>");
            playerLevelInfo.html("Level: <span class='playerInfo'> " + gg.level + "</span>");
            playAgainButton.show();
            mainScreenButton.show();
            screnGameBoard.hide(600);
            screenGameOver.show(600);
        }
    };

    Game.prototype.oneStep = function() {
        this.position(0, 0);
        this.showPlayer();
        this.coinCollision();
        this.speedCollision();
        this.nextLevel();
        this.gameOver();
    };

    function avatarSelect() {
        var avatars = screenStart.find('div.avatarsRow div');
        $(screenGameOver.find('.scorePlayer div:first-child')).attr('class', avatarClass);
        avatars.click(function() {
            for (var i = 0; i < avatars.length; i++) {
                $(avatars.eq(i)).removeAttr('style');
            }
            $(this).css('border', '2px solid #48e5f9');
            avatarClass = $(this).attr('class');
            boardDivs.eq(60).attr('class', avatarClass);
            $(screenGameOver.find('.scorePlayer div:first-child')).attr('class', avatarClass);
        });
    }

    function startingSequence() {
        for (var i = 0; i < boardDivs.length; i++) {
            $(boardDivs.eq(i)).removeClass('speed');
            $(boardDivs.eq(i)).removeClass('coin');
        }
        cubeSide = $('#showFront');
        boardDivs = cubeSide.find('div');
        gg.board = boardDivs;
        cube.attr('class', 'showFront');

        showCoinIcon();
        showSpeedIcon();
        randomWall();
        gg.player.direction = "";
        gg.score = 0;
        indexPlayer = 60;
        gameSpeed = 500;
        clearInterval(start);
        start = setInterval(function() {
            self.oneStep();
        }, gameSpeed);
        bestResultsTable.find('.addedRow').remove();
        gg.score = 0;
        gg.level = 1;
        gg.showScore.text(gg.score);
        gg.showLevel.text(gg.level);
    }

    function playSound(soundName, loop) {
        if (isSoundOn) {
            (soundName).play();
        }
    }

    function playMusic(soundName, loop) {
        if (isSoundOn) {
            if (loop) {
                (soundName).addEventListener('ended', function() {
                    this.currentTime = 0;
                    this.play();
                }, false);
                (soundName).play();
            } else {
                (soundName).play();
            }
        }
    }

    startButton.click(function(e) {
        e.preventDefault();
        if (playerNameInput.val().length < 1) {
            $('#error').text('Enter Your name!');
        } else if (avatarClass.length < 1) {
            $('#error').text('Choose avatar!');
        } else {
            $(this).hide(300);
            // setCookie(playerName, playerNameInput.val(), 1); //jak dac name nam cookie?
            startingSequence();
            setTimeout(function() {
                screenStart.hide(600);
                screnGameBoard.show(600);
            }, 300);
            $('#error').text('');
        }
    });

    musicSwitch.on('click', function() {
        musicSwitch.toggleClass('musicOf');
        musicSwitch.find('i').toggleClass('icon-volume-off');
        if (musicSwitch.hasClass('musicOf')) {
            isMusicOn = false;
            mainMusic.muted = true;
        } else {
            isMusicOn = true;
            mainMusic.muted = false;
        }
    });

    soundSwitch.on('click', function() {
        soundSwitch.toggleClass('musicOf');
        soundSwitch.find('i').toggleClass('icon-volume-off');
        if (soundSwitch.hasClass('musicOf')) {
            isSoundOn = false;
        } else {
            isSoundOn = true;
        }
    });

    mainScreenButton.click(function() {
        startButton.show();
        $(this).hide(300);
        setTimeout(function() {
            screenGameOver.hide(600);
            screenStart.show(600);
        }, 300);
    });

    playAgainButton.click(function() {
        $(this).hide(300);
        startingSequence();
        setTimeout(function() {
            screenGameOver.hide(600);
            screnGameBoard.show(600);
        }, 300);
    });

    function showSpeedIcon() {
        var arrayWallId = [];
        for (var i = 0; i < boardDivs.length; i++) {
            if (!boardDivs.eq(i).hasClass('wall') && i != 60) {
                arrayWallId.push(i);
            }
        }
        var randomIndex = Math.floor(Math.random() * arrayWallId.length);
        $(boardDivs.eq(arrayWallId[randomIndex])).removeClass('coin');
        $(boardDivs.eq(arrayWallId[randomIndex])).addClass('speed');
    }

    function showCoinIcon() {
        for (var i = 0; i < gg.board.length; i++) {
            if (!$(gg.board.eq(i)).hasClass('wall') && i != 60) {
                $(gg.board.eq(i)).addClass('coin');
            }
        }
    }

    function randomWall() {
        var divs = $('div.wall', board);
        var walls = ['wall1.png', 'wall2.png', 'wall3.png', 'wall4.png', 'wall5.png', 'wall6.png', 'wall7.png', 'wall8.png', 'wall9.png', 'wall10.png', 'wall11.png', 'wall12.png', 'wall13.png'];

        divs.css("backgroundImage", "url(images/walls/" + walls[Math.floor(Math.random() * walls.length)] + " )");
    }

    function sendScore() {
        var scores = [];
        var nameVal = playerNameInput.val();
        var scoreVal = gg.score;

        firebase.database().ref('scores').once('value', function(snapshot) {
            scores = snapshot.val() || [];
            scores.push({
                'playerScore': scoreVal,
                'playerName': nameVal
            });
            firebase.database().ref('scores').set(scores);

            function compare(a, b) {
                return b.playerScore - a.playerScore;
            }
            scores.sort(compare);

            insertContent(scores);
        });
    }

    function insertContent(scores) {
        for (var i = 0; i < 10; i++) {
            var newTd = $('<td>');
            var newTd2 = $('<td>');
            var newTr = $('<tr class="addedRow">');
            newTd2.append(scores[i].playerName);
            newTd.append(scores[i].playerScore);
            newTr.append(newTd2);
            newTr.append(newTd);
            bestResultsTable.append(newTr);
        }
    }

    function cubeAnimate() {
        var arrayCubeAnimations = ['showFront', 'showBack', 'showBottom', 'showTop', 'showRight', 'showLeft'];
        var cubeAnimationClass = arrayCubeAnimations[Math.floor(Math.random() * arrayCubeAnimations.length)];
        var tempClass = cube.attr('class');

        cube.removeClass(tempClass);
        while (cubeAnimationClass === tempClass) {
            cubeAnimationClass = arrayCubeAnimations[Math.floor(Math.random() * arrayCubeAnimations.length)];
        }
        window.removeEventListener('keydown', direction);
        cube.addClass(cubeAnimationClass);
        playSound(nextLevelSound);
        cubeSide = $('#' + cubeAnimationClass);
        boardDivs = cubeSide.find('div');
        gg.board = boardDivs;
        gg.level += 1;
        gg.showLevel.text(gg.level);
        newLevel();
    }

    function newLevel() {
        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs.eq(i)).hasClass('speed')) {
                $(boardDivs.eq(i)).removeClass('speed');
            }
        }
        showCoinIcon();
        showSpeedIcon();
        randomWall();
        gg.player.direction = "";
        indexPlayer = 60;
        clearInterval(start);
        start = setInterval(function() {
            self.oneStep();
        }, gameSpeed);
        setTimeout(function() {
            window.addEventListener('keydown', direction);
        }, 3000);
    }

    var start = setInterval(function() {
        self.oneStep();
    }, gameSpeed);

    var gg = new Game();
    showSpeedIcon();
    avatarSelect();
    playMusic(mainMusic, true);

    window.addEventListener('keydown', direction);

    function direction(event) {
        gg.moveDirection(event);
    }

});
