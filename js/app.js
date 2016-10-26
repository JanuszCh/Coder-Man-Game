document.addEventListener("DOMContentLoaded", function() {


    var indexPlayer = 60;
    var board = $('.board');
    var cubeSide = $('#show-front'); // dodana zmienna
    var boardDivs = cubeSide.find('div'); // bylo board.find
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
    var coinSound = new Audio('sounds/coin.wav');
    var gameSound = new Audio('sounds/mainSound.wav');

console.log(cubeSide);




    function avatarSelect() {
        var avatars = screenStart.find('div.avatarsRow div');
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

    startButton.click(function() {
        // $(this).animate({
        // width: "0"
        // },200);
        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs.eq(i)).hasClass('speed')) {
                $(boardDivs.eq(i)).removeClass('speed');
            }
        }
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

        screenStart.hide(600);

        screnGameBoard.show(600);
    });

    mainScreenButton.click(function() { //dla main screen nie trzeba uruchamiac calej sekwencji = zrobi to startButton jedynie czyszczenie wynikow itp
        screenGameOver.hide(600);
        screnGameBoard.hide();
        screenStart.show(600);
        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs.eq(i)).hasClass('speed')) {
                $(boardDivs.eq(i)).removeClass('speed');
            }
        }
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
    });

    playAgainButton.click(function() {
        screenGameOver.hide(600);
        screnGameBoard.show(600);
        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs.eq(i)).hasClass('speed')) {
                $(boardDivs.eq(i)).removeClass('speed');
            }
        }
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
    });

    function randomWall() {
        var divs = $('div.wall', board);
        var walls = ['wall1.png', 'wall2.png', 'wall3.png', 'wall4.png', 'wall5.png', 'wall6.png', 'wall7.png', 'wall8.png', 'wall9.png', 'wall10.png', 'wall11.png', 'wall12.png', 'wall13.png'];
        divs.css("backgroundImage", "url(images/walls/" + walls[Math.floor(Math.random() * walls.length)] + " )");
    }

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
        this.showScore = document.querySelector('h3.score');
        this.score = 0;
        self = this;
    };


    var arrayWall = [];

    function showSpeedIcon() {

        for (var i = 0; i < boardDivs.length; i++) {
            if (!boardDivs.eq(i).hasClass('wall') && i != 60) {
                arrayWall.push(i);
            }
        }
        var randomIndex = Math.floor(Math.random() * arrayWall.length);
        $(boardDivs.eq(arrayWall[randomIndex])).removeClass('coin');
        $(boardDivs.eq(arrayWall[randomIndex])).addClass('speed');
    }

    Game.prototype.speedCollision = function() {
        var tempPlayer = indexPlayer;
        if ($(this.board.eq(tempPlayer)).hasClass('speed')) {
            $(this.board.eq(tempPlayer)).removeClass('speed');
            gameSpeed -= (gameSpeed * 0.3);
            clearInterval(start);
            start = setInterval(function() {
                self.oneStep();
            }, gameSpeed);
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
        var tempPlayer = indexPlayer;

        if ($(this.board.eq(tempPlayer)).hasClass('coin')) {
            $(this.board.eq(tempPlayer)).removeClass('coin');
            this.score += 1;
            this.showScore.innerHTML = 'Wynik: ' + this.score;
            coinSound.play();
        }
    };

    // Przeskakuje do nastepnego indexu poniewaz najpierw go aktualizuje potem sprawdza <?>
    Game.prototype.gameOver = function() {
        var tempPlayer = indexPlayer;
        var tempWall = 0;
        var playerScoreInfo = $("p.playerScoreInfo");
        var inputVal = playerNameInput.val();

        if ($(this.board.eq(tempPlayer)).hasClass('wall')) {
            playerScoreInfo.html("Gratulacje <span class='playerInfo'>" + inputVal + "!</span><br>Twoj wynik to: <span class='playerInfo'> " + gg.score + "!</span>");
            clearInterval(start);
            sendScore();
            screnGameBoard.hide(600);
            screenGameOver.show(600);
        }
    };

    var cube = $('#cube');
    var arrayCubeAnimations = ['show-front', 'show-back', 'show-bottom', 'show-top', 'show-right', 'show-left'];
    var cubeAnimationClass = arrayCubeAnimations[Math.floor(Math.random() * arrayCubeAnimations.length)];


    Game.prototype.nextLevel = function() {
        var arrayItemsTemp = [];
        for (var i = 0; i < arrayWall.length; i++) {
            if (boardDivs.eq(arrayWall[i]).hasClass('coin') || boardDivs.eq(arrayWall[i]).hasClass('speed')) {
                arrayItemsTemp.push(i);
            }
        }
        if (arrayItemsTemp.length === 0) {
            cubeAnimate();
        }
    };

    function cubeAnimate() {
        var tempClass = cube.attr('class');
        cube.removeClass(cube.attr('class'));
        while (cubeAnimationClass === tempClass) {
            cubeAnimationClass = arrayCubeAnimations[Math.floor(Math.random() * arrayCubeAnimations.length)];
        }
        cube.addClass(cubeAnimationClass);

        cubeSide = $('#' + cubeAnimationClass);

        level();

    }

    function level() {
        console.log(cubeSide);

        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs.eq(i)).hasClass('speed')) {
                $(boardDivs.eq(i)).removeClass('speed');
            }
        }
        // gg = new Game();
        showCoinIcon();
        showSpeedIcon();
        randomWall();
        gg.player.direction = "";
        // gg.score = 0;
        indexPlayer = 60;
        // gameSpeed = 500;
        clearInterval(start);
        start = setInterval(function() {
            self.oneStep();
        }, gameSpeed);

    }






    Game.prototype.oneStep = function() {
        // gameSound.play();
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
    randomWall();
    // showCoinIcon();
    showSpeedIcon();
    avatarSelect();


    window.addEventListener('keydown', function(event) {
        gg.moveDirection(event);
    });
});
