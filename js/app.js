document.addEventListener("DOMContentLoaded", function() {

    //wyciagnac wszystki zmienne z funckji na gore - zwlaszcza te ktore odpytuja DOM
    //przerobic wszystkie polecenia na jQ
    //tempFurry / index zamienic na indexPlayer
    // Furry zamienic na PLayer
    // zamienic w petlach for xxx[i] na xxx.eq(i)


    //nie działa bold na hover buttonow
    // czy jest sens dawać .find() na ponizsze zmienne


    //avatar(11) i avatar(13) sa takie same png

    var index = 60;
    var board = $('#boardFront');
    var boardDivs = board.find('div');
    var bestResultsTable = $('#gameOver div.scoreTable #bestResults');
    var playerNameInput = $('#playerName');
    var screenStart = $('#startGame');
    var screenGameOver = $('#gameOver');
    var startButton = $('#startButton');
    var playAgainButton = $('#playAgainButton');
    var mainScreenButton = $('#mainScreenButton');
    var avatarClass = "avatar1";

    function avatarSelect() {
        var avatars = screenStart.find('div.avatarsRow div');
        avatars.click(function() {
            for (var i = 0; i < avatars.length; i++) {
                $(avatars.eq(i)).removeAttr('style');
            }
            $(this).css('border', '2px solid #48e5f9');
            avatarClass = $(this).attr('class');
            boardDivs.eq(60).attr('class',avatarClass);

        });
    }
avatarSelect();


    startButton.click(function() {
        screenStart.hide(600);
        board.show(600);
    });

    mainScreenButton.click(function() {
        screenGameOver.hide(600);
        board.hide();
        screenStart.show(600);
        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs[i]).hasClass('speed')) {
                $(boardDivs[i]).removeClass('speed');
            }
        }
        showCoinIcon();
        showSpeedIcon();
        randomWall();
        gg.furry.direction = "";
        gg.score = 0;
        index = 60;
        clearInterval(start);
        start = setInterval(function() {
            self.oneStep();
        }, 300);
        bestResultsTable.find('.addedRow').remove();
    });

    playAgainButton.click(function() {
        screenGameOver.hide(600);
        board.show(600);
        for (var i = 0; i < boardDivs.length; i++) {
            if ($(boardDivs[i]).hasClass('speed')) {
                $(boardDivs[i]).removeClass('speed');
            }
        }
        showCoinIcon();
        showSpeedIcon();
        randomWall();
        gg.furry.direction = "";
        gg.score = 0;
        index = 60;
        clearInterval(start);
        start = setInterval(function() {
            self.oneStep();
        }, 300);
        bestResultsTable.find('.addedRow').remove();
    });

    function randomWall() {
        var divs = $('#boardFront div.wall');
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

    var Furry = function(x, y, direction) {
        this.x = 0;
        this.y = 0;
        this.direction = direction;
    };

    var Coin = function(x, y) {
        this.x = Math.floor(Math.random() * 10);
        this.y = Math.floor(Math.random() * 10);
    };

    var Game = function() {
        this.board = document.querySelectorAll('#boardFront div');
        this.furry = new Furry(0, 0, '');
        this.coin = new Coin();
        this.showScore = document.querySelector('h3.score');
        this.score = 0;
        self = this;
    };


    //dlaczego to nie działa
    // var divs = $('#boardFront div');
    //console.log(divs[2].hasClass('jakas'));

    //$(divs[2]).hasClass('jakas')); !!!!!!!!!
    // divs.eq(2).hasClass('jakas');

    var arrayWall = [];


    function showSpeedIcon() {
        for (var i = 0; i < boardDivs.length; i++) {
            if (!boardDivs[i].classList.contains('wall') && i != 60) {
                arrayWall.push(i);
            }
        }
        var randomIndex = Math.floor(Math.random() * arrayWall.length);
        boardDivs[arrayWall[randomIndex]].classList.remove('coin');
        boardDivs[arrayWall[randomIndex]].classList.add('speed');
    }

    Game.prototype.position = function(x, y) {
        if (this.furry.direction == 'right') {
            x += 1;
        } else if (this.furry.direction == 'left') {
            x -= 1;
        } else if (this.furry.direction == 'up') {
            y -= 1;
        } else if (this.furry.direction == 'down') {
            y += 1;
        }
        index += x + y * 11;
    };

    function showCoinIcon() {
        for (var i = 0; i < gg.board.length; i++) {
            if (!gg.board[i].classList.contains('wall') && i != 60) {
                gg.board[i].classList.add('coin');
            }
        }
    }



    Game.prototype.showFurry = function() {
        for (var i = 0; i < this.board.length; i++) {
            this.board[i].classList.remove(avatarClass);
        }
        this.board[index].classList.add(avatarClass);
    };

    Game.prototype.moveDirection = function(event) {
        if (event.which == 37) {
            self.furry.direction = 'left';
        } else if (event.which == 38) {
            self.furry.direction = 'up';
        } else if (event.which == 39) {
            self.furry.direction = 'right';
        } else if (event.which == 40) {
            self.furry.direction = 'down';
        }
    };

    Game.prototype.coinCollision = function() {
        var tempFurry = index;

        if (this.board[tempFurry].classList.contains('coin')) {
            this.board[tempFurry].classList.remove('coin');
            this.score += 1;
            this.showScore.innerHTML = 'Wynik: ' + this.score;
        }
    };

    // Przeskakuje do nastepnego indexu poniewaz najpierw go aktualizuje potem sprawdza <?>
    Game.prototype.gameOver = function() {
        var tempFurry = index;
        var tempWall = 0;
        var playerScoreInfo = $("p.playerScoreInfo");
        var inputVal = playerNameInput.val();

        if ($(this.board[tempFurry]).hasClass('wall')) {
            playerScoreInfo.html("Gratulacje <span class='playerInfo'>" + inputVal + "!</span><br>Twoj wynik to: <span class='playerInfo'> " + gg.score + "!</span>");
            clearInterval(start);
            sendScore();
            board.hide(600);
            screenGameOver.show(600);
        }
    };

    Game.prototype.oneStep = function() {
        this.position(0, 0);
        this.showFurry();
        this.coinCollision();
        this.gameOver();
    };

    var start = setInterval(function() {
        self.oneStep();
    }, 300);

    var gg = new Game();
    randomWall();
    showCoinIcon();
    showSpeedIcon();

    window.addEventListener('keydown', function(event) {
        gg.moveDirection(event);
    });
});
