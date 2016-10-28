document.addEventListener("DOMContentLoaded", function() {

    var indexPlayer = 60;
    var board = $('.board');
    var cubeSide = $('#show-front');
    var boardDivs = cubeSide.find('div');
    var cube = $('#cube');
    var screenGameOver = $('#gameOver');
    var bestResultsTable = $('div.scoreTable #bestResults', screenGameOver);
    var playerNameInput = $('#playerName');
    var screenStart = $('#startGame');
    var screnGameBoard = $('#screnGameBoard');
    var startButton = $('#startButton');
    var playAgainButton = $('#playAgainButton');
    var mainScreenButton = $('#mainScreenButton');
    var avatarClass = "avatar1";
    var gameSpeed = 500;
    var coinSound = new Audio('sounds/coin.mp3');
    var nextLevelSound = new Audio('sounds/next-level.mp3');
    var speedSound = new Audio('sounds/speed.mp3');

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
        cubeSide = $('#show-front');
        boardDivs = cubeSide.find('div');
        gg.board = boardDivs;
        cube.attr('class', 'show-front');

        // showCoinIcon();
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

    startButton.click(function() {
        $(this).animate({
            width: "0",
            height: "0"
        }, 300);
        startingSequence();
        setTimeout(function() {
            screenStart.hide(600);
            screnGameBoard.show(600);
        }, 300);

    });

    mainScreenButton.click(function() {
        startButton.css('width', '50%').css('height', '80%');
        $(this).animate({
            width: "0",
            height: "0"
        }, 300);
        setTimeout(function() {
            screenGameOver.hide(600);
            screnGameBoard.hide();
            screenStart.show(600);
        }, 300);
    });

    playAgainButton.click(function() {
        $(this).animate({
            width: "0",
            height: "0"
        }, 300);
        startingSequence();
        setTimeout(function() {
            screenGameOver.hide(600);
            screnGameBoard.show(600);
        }, 300);
    });

    function insertContent(scores) {
        $.each(scores, function(indexTable, score) {
            var newTd = $('<td>');
            var newTd2 = $('<td>');
            var newTr = $('<tr class="addedRow">');
            newTd2.append(scores[indexTable][1]);
            newTd.append(scores[indexTable][0]);
            newTr.append(newTd2);
            newTr.append(newTd);
            bestResultsTable.append(newTr);
        });
    }

    function sendScore() {
        var nameVal = playerNameInput.val();
        var scoreVal = gg.score;

        //działa ale wczytuje wszystkie cookie jakie sa - zastanowic sie jaka metode wybrac php/js
        // document.cookie = nameVal;
        // var inputName = document.cookie;
        // console.log(inputName);
        // playerNameInput.val(inputName);

        $.ajax({
            url: 'score.php',
            type: 'GET',
            dataType: 'json',
            data: {
                name: nameVal,
                score: scoreVal
            }
        }).done(function(response) {
            insertContent(response);
        }).fail(function(error) {
            console.log(error);
        });
    }

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

    Game.prototype.speedCollision = function() {
        if ($(this.board.eq(indexPlayer)).hasClass('speed')) {
            $(this.board.eq(indexPlayer)).removeClass('speed');
            gameSpeed -= (gameSpeed * 0.2);
            clearInterval(start);
            start = setInterval(function() {
                self.oneStep();
            }, gameSpeed);
            speedSound.play();
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

    function showCoinIcon() {
        for (var i = 0; i < gg.board.length; i++) {
            if (!$(gg.board.eq(i)).hasClass('wall') && i != 60) {
                $(gg.board.eq(i)).addClass('coin');
            }
        }
    }

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

    Game.prototype.coinCollision = function() {
        if ($(this.board.eq(indexPlayer)).hasClass('coin')) {
            $(this.board.eq(indexPlayer)).removeClass('coin');
            this.score += 1;
            this.showScore.text(this.score);
            coinSound.play();
        }
    };

    Game.prototype.gameOver = function() {
        var tempWall = 0;
        var playerScoreInfo = $("p.playerScoreInfo");
        var playerLevelInfo = $('p.playerLevelInfo');
        var inputVal = playerNameInput.val();

        if ($(this.board.eq(indexPlayer)).hasClass('wall')) {
            playerScoreInfo.html("Congratulations <span class='playerInfo'>" + inputVal + "</span><br>Your score: <span class='playerInfo'> " + gg.score + "</span>");
            playerLevelInfo.html("Level: <span class='playerInfo'> " + gg.level + "</span>");
            clearInterval(start);
            sendScore();
            playAgainButton.css('width', '45%').css('height', '80%');
            mainScreenButton.css('width', '45%').css('height', '80%');
            screnGameBoard.hide(600);
            screenGameOver.show(600);
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

    function randomWall() {
        var divs = $('div.wall', board);
        var walls = ['wall1.png', 'wall2.png', 'wall3.png', 'wall4.png', 'wall5.png', 'wall6.png', 'wall7.png', 'wall8.png', 'wall9.png', 'wall10.png', 'wall11.png', 'wall12.png', 'wall13.png'];

        divs.css("backgroundImage", "url(images/walls/" + walls[Math.floor(Math.random() * walls.length)] + " )");
    }

    function cubeAnimate() {
        var arrayCubeAnimations = ['show-front', 'show-back', 'show-bottom', 'show-top', 'show-right', 'show-left'];
        var cubeAnimationClass = arrayCubeAnimations[Math.floor(Math.random() * arrayCubeAnimations.length)];
        var tempClass = cube.attr('class');

        cube.removeClass(cube.attr('class'));
        while (cubeAnimationClass === tempClass) {
            cubeAnimationClass = arrayCubeAnimations[Math.floor(Math.random() * arrayCubeAnimations.length)];
        }
        window.removeEventListener('keydown', direction);
        cube.addClass(cubeAnimationClass);
        nextLevelSound.play();
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

    Game.prototype.oneStep = function() {
        this.position(0, 0);
        this.showPlayer();
        this.coinCollision();
        this.speedCollision();
        this.nextLevel();
        this.gameOver();
    };

    var start = setInterval(function() {
        self.oneStep();
    }, gameSpeed);

    var gg = new Game();
    showSpeedIcon();
    avatarSelect();

    window.addEventListener('keydown', direction);

    function direction(event) {
        gg.moveDirection(event);
    }

});
