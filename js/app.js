$(function() {

    var indexPlayer = 60;
    var screenStart = $('#startGame');
    var screenGameBoard = $('#screenGameBoard');
    var screenGameOver = $('#gameOver');
    var cube = screenGameBoard.find('#cube');
    var cubeSide = $('#showFront');
    var board = cube.find('.board');
    var boardDivs = cubeSide.find('div');
    var playerNameInput = screenStart.find('#playerName');
    var startButton = screenStart.find('#startButton');
    var error = screenStart.find('#validationError');
    var musicSwitch = screenStart.find('#music');
    var soundSwitch = screenStart.find('#sound');
    var playerScoreInfo = screenGameOver.find("#playerScoreInfo");
    var playerLevelInfo = screenGameOver.find('#playerLevelInfo');
    var bestResultsTable = screenGameOver.find('#bestResults');
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
    var diamondSound = new Audio('sounds/diamond.mp3');
    var gameOverSound = new Audio('sounds/game-over.mp3');

    var Player = function(x, y, direction) {
        this.x = 0;
        this.y = 0;
        this.direction = direction;
    };

    var Game = function() {
        this.board = boardDivs;
        this.player = new Player(0, 0, '');
        this.showScore = $('.scoreVal');
        this.score = 0;
        this.showLevel = $('.levelVal');
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

    Game.prototype.coinCollision = function() {
        if ($(this.board.eq(indexPlayer)).hasClass('coin')) {
            $(this.board.eq(indexPlayer)).removeClass('coin');
            this.score += 1;
            this.showScore.text(this.score);
            playSound(coinSound);
        }
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

    Game.prototype.diamondCollision = function() {
        if ($(this.board.eq(indexPlayer)).hasClass('diamond')) {
            $(this.board.eq(indexPlayer)).removeClass('diamond');
            this.score += 5;
            this.showScore.text(this.score);
            playSound(diamondSound);
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
        var inputVal = playerNameInput.val();

        if ($(this.board.eq(indexPlayer)).hasClass('wall')) {
            clearInterval(start);
            sendScore();
            boardDivs.eq(indexPlayer).removeClass(avatarClass);
            playerScoreInfo.html("Congratulations <span class='playerInfo'>" + inputVal + "</span><br>Your score: <span class='playerInfo'> " + gg.score + "</span>");
            playerLevelInfo.html("Level: <span class='playerInfo'> " + gg.level + "</span>");
            playSound(gameOverSound);
            playAgainButton.show();
            mainScreenButton.show();
            screenGameBoard.hide(600);
            screenGameOver.show(600);
        }
    };

    Game.prototype.oneStep = function() {
        this.position(0, 0);
        this.showPlayer();
        this.coinCollision();
        this.speedCollision();
        this.diamondCollision();
        this.nextLevel();
        this.gameOver();
    };

    function avatarSelect() {
        var avatars = screenStart.find('div.avatarsRow div');
        $(screenGameOver.find('#playerAvatar')).attr('class', avatarClass);
        avatars.click(function() {
            for (var i = 0; i < avatars.length; i++) {
                $(avatars.eq(i)).removeAttr('style');
            }
            $(this).css('border', '2px solid #48e5f9');
            avatarClass = $(this).attr('class');
            boardDivs.eq(60).attr('class', avatarClass);
            $(screenGameOver.find('#playerAvatar')).attr('class', avatarClass);
        });
    }

    function startingSequence() {
        for (var i = 0; i < boardDivs.length; i++) {
            $(boardDivs.eq(i)).removeClass('coin');
            $(boardDivs.eq(i)).removeClass('speed');
            $(boardDivs.eq(i)).removeClass('diamond');
        }
        cubeSide = $('#showFront');
        boardDivs = cubeSide.find('div');
        gg.board = boardDivs;
        cube.attr('class', 'showFront');

        showCoinIcon();
        showSpeedIcon();
        showDiamondIcon();
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
        if (isMusicOn) {
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
        if ($.trim(playerNameInput.val()).length < 1) {
            error.text('Enter Your name!');
        } else if (playerNameInput.val().length > 17) {
            error.text('Your name is too long!');
        } else if (avatarClass.length < 1) {
            error.text('Choose avatar!');
        } else {
            $(this).hide(300);
            startingSequence();
            setTimeout(function() {
                screenStart.hide(600);
                screenGameBoard.show(600);
            }, 300);
            error.text('');
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
        soundSwitch.toggleClass('soundOf');
        soundSwitch.find('i').toggleClass('icon-volume-off');
        if (soundSwitch.hasClass('soundOf')) {
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
            screenGameBoard.show(600);
        }, 300);
    });

    function showCoinIcon() {
        for (var i = 0; i < gg.board.length; i++) {
            if (!$(gg.board.eq(i)).hasClass('wall') && i != 60) {
                $(gg.board.eq(i)).addClass('coin');
            }
        }
    }

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

    function showDiamondIcon() {
        var arrayWallId = [];

        for (var i = 0; i < boardDivs.length; i++) {
            if (!boardDivs.eq(i).hasClass('wall') && i != 60) {
                arrayWallId.push(i);
            }
        }

        var randomIndex = Math.floor(Math.random() * arrayWallId.length);
        while ($(boardDivs.eq(arrayWallId[randomIndex])).hasClass('speed')) {
            randomIndex = Math.floor(Math.random() * arrayWallId.length);
        }

        $(boardDivs.eq(arrayWallId[randomIndex])).removeClass('coin');
        $(boardDivs.eq(arrayWallId[randomIndex])).addClass('diamond');
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
            var newTd = $('<td class="tableData">');
            var newTd2 = $('<td class="tableData">');
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
        showDiamondIcon();
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
