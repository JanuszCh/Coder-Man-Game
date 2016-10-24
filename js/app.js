document.addEventListener("DOMContentLoaded", function() {

    //tempFurry / index zamienic na indexPlayer
    // Furry zamienic na PLayer
    var index = 60;
    var board = $('#boardFront');
    var screenGameOver = $('#screenGameOver');
    var input = $('input');

//=====================DZIAŁA!!!======================================
    // function randomWall() {
    //     var divs = $('#boardFront div.wall');
    //     var walls = ['wall1.png', 'wall2.png', 'wall3.png', 'wall4.png'];
    //     divs.css("backgroundImage", "url(images/" + walls[Math.floor(Math.random() * walls.length)] + " )");
    // }
    // randomWall();


    function insertContent(scores) {
        var newTable = $('<table id="tableScore">');
        $.each(scores, function(indexTable, score) {
            var newTd = $('<td>');
            var newTd2 = $('<td>');
            var newTr = $('<tr>');
            newTd2.append(scores[indexTable][1]);
            newTd.append(scores[indexTable][0]);
            newTr.append(newTd2);
            newTr.append(newTd);
            newTable.append(newTr);
        });
        screenGameOver.append(newTable);
    }

    function sendScore() {
        // console.log('przesylam wynik');
        var nameVal = $('#name').val();
        var scoreVal = gg.score;


        //działa ale wczytuje wszystkie cookie jakie sa - zastanowic sie jaka metode wybrac php/js
        // document.cookie = nameVal;
        // var inputName = document.cookie;
        // console.log(inputName);
        // input.val(inputName);

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

    //nie korzystam z actX i actY-------------------------------------
    var actX = 0;
    var actY = 0;

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

    var arrayWall = [];


    function showSpeed() {
        var divs = $('#boardFront div');

        for (var i = 0; i < divs.length; i++) {
            if (!divs[i].classList.contains('wall') && i != 60) {
                arrayWall.push(i);
            }
        }
        var randomIndex = Math.floor(Math.random() * arrayWall.length);
        divs[arrayWall[randomIndex]].classList.remove('coin');
        divs[arrayWall[randomIndex]].classList.add('diamond');
    }
    showSpeed();


    Game.prototype.position = function(x, y) {
        if (this.furry.direction == 'right') {
            x += 1;
            actX = actX + x;
        } else if (this.furry.direction == 'left') {
            x -= 1;
            actX = actX + x;
        } else if (this.furry.direction == 'up') {
            y -= 1;
            actY = actY + y;
        } else if (this.furry.direction == 'down') {
            y += 1;
            actY = actY + y;
        }
        index += x + y * 11;
    };

    //nie dziala dodaje ciagle coin co interval
    Game.prototype.positionCoin = function() {
        // index2 = this.coin.x + this.coin.y * 10;
        // for (var i = 0; i < this.board.length; i++) {
        //     if (! this.board[i].classList.contains('wall') && ! this.board[i].classList.contains('furry') ) {
        //         this.board[i].classList.add('coin');
        //     }
        // }
    };

    Game.prototype.showFurry = function() {
        for (var i = 0; i < this.board.length; i++) {
            this.board[i].classList.remove('furry');
        }
        this.board[index].classList.add('furry');
    };

    // Game.prototype.showCoin = function() {
    //     this.board[index2].classList.add('coin');
    // };

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
        // var tempCoin = 0;
        //this.board = document.querySelectorAll('section div');

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

        if (this.board[tempFurry].classList.contains('wall')) {
            alert('game over');
            clearInterval(start);
            console.log('game over');
            // sendScore();
        }
    };

    Game.prototype.oneStep = function() {
        this.position(0, 0);
        this.showFurry();

        // this.positionCoin();
        this.coinCollision();

        this.gameOver();
        // this.showCoin();
    };

    var start = setInterval(function() {
        self.oneStep();
    }, 300);


    var gg = new Game();
    // gg.position(1, 1);
    // gg.positionCoin();
    // gg.showFurry();
    // gg.showCoin();
    // gg.oneStep();

    window.addEventListener('keydown', function(event) {
        gg.moveDirection(event);
    });






});
