<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <!-- <meta charset="utf-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>New game</title>
    <link rel="stylesheet" href="css/reset.css" media="screen" title="no title">
    <link rel="stylesheet" href="main.nested.css" media="screen" title="no title">
</head>

<body>

    <section id="startGame">
        <div class="container">
            <header>
                <div>CODER-MAN GAME</div>
            </header>
            <div class="manual">
                <ul>
                    <li>Poruszaj się strzałkami wewnątrz labiryntu aby zebrać wszystkie elementy.</li>
                    <li>Unikaj ścian! Zderzenie ze ścianą kończy grę!</li>
                    <li>Każda zebrana moneta zwiększa Twoją punktację.</li>
                    <li>Znajdź przyspieszenie aby zwiększyć swoją prędkość poruszania się.</li>
                </ul>
            </div>
            <div class="player">
                <form action="index.html" method="get">
                    <!-- <label for="name">Podaj imie</label><br> -->
                        <input type="text" name="name" value="<?php if(!isset($_SESSION['mojeimie'])){
                            $_SESSION['mojeimie'] = "";
                        } else {
                            echo($_SESSION['mojeimie']);
                        }  ?>" id="name" placeholder="Twoje imie">
                </form>
                <div class="avatars">
                    wybierz avatar
                    <div style="height:auto;">
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                    </div>
                    <div style="height:auto;">
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                    </div>
                    <div style="height:auto;">
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                    </div>
                    <div style="height:auto;">
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                        <img src="images/furry.png" />
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <footer>
                <div id="startButton">
                    <span>START!</span>
                </div>
            </footer>
        </div>
    </section>

    <section id="boardFront">
        <h3 class="score"></h3>
        <div class="wall">1</div>
        <div class="wall">2</div>
        <div class="wall">3</div>
        <div class="wall">4</div>
        <div class="wall">5</div>
        <div class="wall">6</div>
        <div class="wall">7</div>
        <div class="wall">8</div>
        <div class="wall">9</div>
        <div class="wall">10</div>
        <div class="wall">11</div>
        <div class="wall">12</div>
        <div class="">13</div>
        <div class="">14</div>
        <div class="wall">15</div>
        <div class="">16</div>
        <div class="">17</div>
        <div class="">18</div>
        <div class="wall">19</div>
        <div class="">20</div>
        <div class="">21</div>
        <div class="wall">22</div>
        <div class="wall">23</div>
        <div class="wall">24</div>
        <div class="">25</div>
        <div class="wall">26</div>
        <div class="">27</div>
        <div class="wall">28</div>
        <div class="wall">29</div>
        <div class="wall">30</div>
        <div class="">31</div>
        <div class="wall">32</div>
        <div class="wall">33</div>
        <div class="wall">34</div>
        <div class="">35</div>
        <div class="">36</div>
        <div class="">37</div>
        <div class="">38</div>
        <div class="">39</div>
        <div class="">40</div>
        <div class="">41</div>
        <div class="">42</div>
        <div class="">43</div>
        <div class="wall">44</div>
        <div class="wall">45</div>
        <div class="">46</div>
        <div class="wall">47</div>
        <div class="">48</div>
        <div class="wall">49</div>
        <div class="wall">50</div>
        <div class="wall">51</div>
        <div class="">52</div>
        <div class="wall">53</div>
        <div class="">54</div>
        <div class="wall">55</div>
        <div class="wall">56</div>
        <div class="">57</div>
        <div class="wall">58</div>
        <div class="">59</div>
        <div class="wall">60</div>
        <div class="">61</div>
        <div class="">62</div>
        <div class="">63</div>
        <div class="">64</div>
        <div class="">65</div>
        <div class="wall">66</div>
        <div class="wall">67</div>
        <div class="">68</div>
        <div class="wall">69</div>
        <div class="">70</div>
        <div class="wall">71</div>
        <div class="wall">72</div>
        <div class="">73</div>
        <div class="wall">74</div>
        <div class="wall">75</div>
        <div class="">76</div>
        <div class="wall">77</div>
        <div class="wall">78</div>
        <div class="">79</div>
        <div class="">80</div>
        <div class="">81</div>
        <div class="">82</div>
        <div class="">83</div>
        <div class="">84</div>
        <div class="wall">85</div>
        <div class="">86</div>
        <div class="">87</div>
        <div class="wall">88</div>
        <div class="wall">89</div>
        <div class="">90</div>
        <div class="wall">91</div>
        <div class="wall">92</div>
        <div class="wall">93</div>
        <div class="">94</div>
        <div class="wall">95</div>
        <div class="wall">96</div>
        <div class="">97</div>
        <div class="wall">98</div>
        <div class="wall">99</div>
        <div class="wall">100</div>
        <div class="">101</div>
        <div class="">102</div>
        <div class="">103</div>
        <div class="wall">104</div>
        <div class="">105</div>
        <div class="">106</div>
        <div class="">107</div>
        <div class="">108</div>
        <div class="">109</div>
        <div class="wall">110</div>
        <div class="wall">111</div>
        <div class="wall">112</div>
        <div class="wall">113</div>
        <div class="wall">114</div>
        <div class="wall">115</div>
        <div class="wall">116</div>
        <div class="wall">117</div>
        <div class="wall">118</div>
        <div class="wall">119</div>
        <div class="wall">120</div>
        <div class="wall">121</div>
    </section>
    <section id="gameOver">
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
                            Imię
                        </th>
                        <th>
                            Wynik
                        </th>
                    </tr>
                </table>
            </div>
            <div class="scorePlayer">
                <img src="images/furry.png" alt="avatar" />
                <p class="playerScoreInfo"></p>
            </div>
            <div class="clear"></div>
            <footer>
                <div id="mainScreenButton">
                    <span>EKRAN GŁOWNY!</span>
                </div>
                <div id="playAgainButton">
                    <span>ZAGRAJ PONOWNIE!</span>
                </div>
            </footer>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/app.js">
    </script>
</body>

</html>
