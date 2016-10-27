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

    <!-- <audio src="sounds/main.mp3" loop autoplay></audio> -->
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
                    <div class="">15</div>
                    <div class="">16</div>
                    <div class="">17</div>
                    <div class="">18</div>
                    <div class="">19</div>
                    <div class="">20</div>
                    <div class="">21</div>
                    <div class="wall">22</div>
                    <div class="wall">23</div>
                    <div class="wall">24</div>
                    <div class="">25</div>
                    <div class="wall">26</div>
                    <div class="wall">27</div>
                    <div class="">28</div>
                    <div class="wall">29</div>
                    <div class="wall">30</div>
                    <div class="wall">31</div>
                    <div class="">32</div>
                    <div class="wall">33</div>
                    <div class="wall">34</div>
                    <div class="">35</div>
                    <div class="">36</div>
                    <div class="">37</div>
                    <div class="">38</div>
                    <div class="">39</div>
                    <div class="">40</div>
                    <div class="">41</div>
                    <div class="wall">42</div>
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
                    <div class="">53</div>
                    <div class="">54</div>
                    <div class="wall">55</div>
                    <div class="wall">56</div>
                    <div class="">57</div>
                    <div class="wall">58</div>
                    <div class="">59</div>
                    <div class="">60</div>
                    <div class="">61</div>
                    <div class="wall">62</div>
                    <div class="">63</div>
                    <div class="wall">64</div>
                    <div class="wall">65</div>
                    <div class="wall">66</div>
                    <div class="wall">67</div>
                    <div class="">68</div>
                    <div class="">69</div>
                    <div class="">70</div>
                    <div class="wall">71</div>
                    <div class="">72</div>
                    <div class="">73</div>
                    <div class="">74</div>
                    <div class="">75</div>
                    <div class="">76</div>
                    <div class="wall">77</div>
                    <div class="wall">78</div>
                    <div class="">79</div>
                    <div class="wall">80</div>
                    <div class="">81</div>
                    <div class="wall">82</div>
                    <div class="">83</div>
                    <div class="wall">84</div>
                    <div class="wall">85</div>
                    <div class="">86</div>
                    <div class="">87</div>
                    <div class="wall">88</div>
                    <div class="wall">89</div>
                    <div class="">90</div>
                    <div class="wall">91</div>
                    <div class="">92</div>
                    <div class="">93</div>
                    <div class="">94</div>
                    <div class="">95</div>
                    <div class="">96</div>
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
                    <div class="wall">107</div>
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
                </figure>

                <figure class="right board" id="show-right">
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
                    <div class="wall">14</div>
                    <div class="">15</div>
                    <div class="wall">16</div>
                    <div class="">17</div>
                    <div class="wall">18</div>
                    <div class="">19</div>
                    <div class="">20</div>
                    <div class="">21</div>
                    <div class="wall">22</div>
                    <div class="wall">23</div>
                    <div class="">24</div>
                    <div class="">25</div>
                    <div class="">26</div>
                    <div class="">27</div>
                    <div class="">28</div>
                    <div class="">29</div>
                    <div class="">30</div>
                    <div class="wall">31</div>
                    <div class="">32</div>
                    <div class="wall">33</div>
                    <div class="wall">34</div>
                    <div class="wall">35</div>
                    <div class="wall">36</div>
                    <div class="">37</div>
                    <div class="wall">38</div>
                    <div class="wall">39</div>
                    <div class="wall">40</div>
                    <div class="">41</div>
                    <div class="wall">42</div>
                    <div class="">43</div>
                    <div class="wall">44</div>
                    <div class="wall">45</div>
                    <div class="">46</div>
                    <div class="">47</div>
                    <div class="">48</div>
                    <div class="">49</div>
                    <div class="">50</div>
                    <div class="">51</div>
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
                    <div class="wall">62</div>
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
                    <div class="wall">73</div>
                    <div class="">74</div>
                    <div class="wall">75</div>
                    <div class="wall">76</div>
                    <div class="wall">77</div>
                    <div class="wall">78</div>
                    <div class="">79</div>
                    <div class="">80</div>
                    <div class="">81</div>
                    <div class="">82</div>
                    <div class="">83</div>
                    <div class="">84</div>
                    <div class="">85</div>
                    <div class="">86</div>
                    <div class="">87</div>
                    <div class="wall">88</div>
                    <div class="wall">89</div>
                    <div class="wall">90</div>
                    <div class="">91</div>
                    <div class="wall">92</div>
                    <div class="">93</div>
                    <div class="wall">94</div>
                    <div class="">95</div>
                    <div class="wall">96</div>
                    <div class="wall">97</div>
                    <div class="wall">98</div>
                    <div class="wall">99</div>
                    <div class="wall">100</div>
                    <div class="">101</div>
                    <div class="">102</div>
                    <div class="">103</div>
                    <div class="">104</div>
                    <div class="wall">105</div>
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
                </figure>

                <figure class="left board" id="show-left">
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
                    <div class="">15</div>
                    <div class="">16</div>
                    <div class="wall">17</div>
                    <div class="">18</div>
                    <div class="">19</div>
                    <div class="wall">20</div>
                    <div class="">21</div>
                    <div class="wall">22</div>
                    <div class="wall">23</div>
                    <div class="wall">24</div>
                    <div class="">25</div>
                    <div class="wall">26</div>
                    <div class="">27</div>
                    <div class="">28</div>
                    <div class="">29</div>
                    <div class="">30</div>
                    <div class="wall">31</div>
                    <div class="">32</div>
                    <div class="wall">33</div>
                    <div class="wall">34</div>
                    <div class="">35</div>
                    <div class="">36</div>
                    <div class="wall">37</div>
                    <div class="">38</div>
                    <div class="wall">39</div>
                    <div class="wall">40</div>
                    <div class="">41</div>
                    <div class="">42</div>
                    <div class="">43</div>
                    <div class="wall">44</div>
                    <div class="wall">45</div>
                    <div class="">46</div>
                    <div class="wall">47</div>
                    <div class="">48</div>
                    <div class="">49</div>
                    <div class="">50</div>
                    <div class="wall">51</div>
                    <div class="">52</div>
                    <div class="wall">53</div>
                    <div class="">54</div>
                    <div class="wall">55</div>
                    <div class="wall">56</div>
                    <div class="">57</div>
                    <div class="">58</div>
                    <div class="">59</div>
                    <div class="wall">60</div>
                    <div class="">61</div>
                    <div class="wall">62</div>
                    <div class="">63</div>
                    <div class="wall">64</div>
                    <div class="">65</div>
                    <div class="wall">66</div>
                    <div class="wall">67</div>
                    <div class="wall">68</div>
                    <div class="wall">69</div>
                    <div class="">70</div>
                    <div class="wall">71</div>
                    <div class="">72</div>
                    <div class="">73</div>
                    <div class="">74</div>
                    <div class="">75</div>
                    <div class="">76</div>
                    <div class="wall">77</div>
                    <div class="wall">78</div>
                    <div class="">79</div>
                    <div class="">80</div>
                    <div class="">81</div>
                    <div class="wall">82</div>
                    <div class="wall">83</div>
                    <div class="">84</div>
                    <div class="wall">85</div>
                    <div class="wall">86</div>
                    <div class="">87</div>
                    <div class="wall">88</div>
                    <div class="wall">89</div>
                    <div class="">90</div>
                    <div class="wall">91</div>
                    <div class="">92</div>
                    <div class="wall">93</div>
                    <div class="">94</div>
                    <div class="">95</div>
                    <div class="">96</div>
                    <div class="wall">97</div>
                    <div class="">98</div>
                    <div class="wall">99</div>
                    <div class="wall">100</div>
                    <div class="">101</div>
                    <div class="">102</div>
                    <div class="">103</div>
                    <div class="">104</div>
                    <div class="">105</div>
                    <div class="wall">106</div>
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
                </figure>

                <figure class="top board" id="show-top">
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
                    <div class="wall">17</div>
                    <div class="">18</div>
                    <div class="">19</div>
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
                    <div class="">30</div>
                    <div class="wall">31</div>
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
                    <div class="">60</div>
                    <div class="">61</div>
                    <div class="">62</div>
                    <div class="">63</div>
                    <div class="wall">64</div>
                    <div class="">65</div>
                    <div class="wall">66</div>
                    <div class="wall">67</div>
                    <div class="">68</div>
                    <div class="">69</div>
                    <div class="">70</div>
                    <div class="wall">71</div>
                    <div class="">72</div>
                    <div class="wall">73</div>
                    <div class="">74</div>
                    <div class="">75</div>
                    <div class="wall">76</div>
                    <div class="wall">77</div>
                    <div class="wall">78</div>
                    <div class="">79</div>
                    <div class="wall">80</div>
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
                    <div class="">92</div>
                    <div class="wall">93</div>
                    <div class="wall">94</div>
                    <div class="">95</div>
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
                </figure>

                <figure class="bottom board" id="show-bottom">
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
                    <div class="">15</div>
                    <div class="">16</div>
                    <div class="wall">17</div>
                    <div class="">18</div>
                    <div class="">19</div>
                    <div class="wall">20</div>
                    <div class="wall">21</div>
                    <div class="wall">22</div>
                    <div class="wall">23</div>
                    <div class="">24</div>
                    <div class="wall">25</div>
                    <div class="wall">26</div>
                    <div class="">27</div>
                    <div class="wall">28</div>
                    <div class="">29</div>
                    <div class="wall">30</div>
                    <div class="">31</div>
                    <div class="">32</div>
                    <div class="wall">33</div>
                    <div class="wall">34</div>
                    <div class="">35</div>
                    <div class="">36</div>
                    <div class="">37</div>
                    <div class="">38</div>
                    <div class="">39</div>
                    <div class="">40</div>
                    <div class="wall">41</div>
                    <div class="">42</div>
                    <div class="wall">43</div>
                    <div class="wall">44</div>
                    <div class="wall">45</div>
                    <div class="wall">46</div>
                    <div class="">47</div>
                    <div class="wall">48</div>
                    <div class="">49</div>
                    <div class="wall">50</div>
                    <div class="">51</div>
                    <div class="">52</div>
                    <div class="">53</div>
                    <div class="">54</div>
                    <div class="wall">55</div>
                    <div class="wall">56</div>
                    <div class="">57</div>
                    <div class="">58</div>
                    <div class="">59</div>
                    <div class="">60</div>
                    <div class="">61</div>
                    <div class="wall">62</div>
                    <div class="">63</div>
                    <div class="wall">64</div>
                    <div class="">65</div>
                    <div class="wall">66</div>
                    <div class="wall">67</div>
                    <div class="">68</div>
                    <div class="wall">69</div>
                    <div class="">70</div>
                    <div class="wall">71</div>
                    <div class="">72</div>
                    <div class="">73</div>
                    <div class="">74</div>
                    <div class="">75</div>
                    <div class="">76</div>
                    <div class="wall">77</div>
                    <div class="wall">78</div>
                    <div class="">79</div>
                    <div class="wall">80</div>
                    <div class="">81</div>
                    <div class="">82</div>
                    <div class="">83</div>
                    <div class="wall">84</div>
                    <div class="">85</div>
                    <div class="wall">86</div>
                    <div class="">87</div>
                    <div class="wall">88</div>
                    <div class="wall">89</div>
                    <div class="">90</div>
                    <div class="">91</div>
                    <div class="">92</div>
                    <div class="wall">93</div>
                    <div class="wall">94</div>
                    <div class="">95</div>
                    <div class="">96</div>
                    <div class="wall">97</div>
                    <div class="">98</div>
                    <div class="wall">99</div>
                    <div class="wall">100</div>
                    <div class="">101</div>
                    <div class="wall">102</div>
                    <div class="">103</div>
                    <div class="">104</div>
                    <div class="wall">105</div>
                    <div class="">106</div>
                    <div class="wall">107</div>
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
