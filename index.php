<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <script src="Scripts/jquery-3.0.0.min.js"></script>
    <script src="Scripts/index.js"></script>
</head>
<!--  -->
<body>
    <input type="checkbox" id="sideBarToggler" />
    <header>
        <div id="logoWrap">
            <label class="logoBurguer" for="sideBarToggler">
                <span id="burguerStyle"></span>
            </label>
            <a href="#container"><img src="icons/logoType.png" alt="Logo" class="logo" /></a>
        </div>
        <nav class="navBarHeader" id="gooo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="sellPage.php">Jewelry</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="AddUpdateRemove.php">LogIn</a></li>
            </ul>
        </nav>
    </header>
    <div id="container">
        <div id="HeroSection">
            <div id="wrapCompannyName">
                <h1><span id="boxBorder">Kolfi</span></h1>
                <p id="descriptionMetals">
                    <a id="silver" href="sellPage.php" class="silver">Silver </a><strong>//</strong>
                    <a id="gold" href="sellPage.php" class="gold">Gold </a><strong>//</strong>
                    <a id="platinum" href="sellPage.php" class="platinum">Platinum</a>
                </p>
            </div>

        </div>
        <div id="about">
            <section id="Jewelry">
                <h3 id="JewelryH">Jewelry</h3>
                <div id="wrapRoundIcons">
                    <a href="sellPage.php" id="diamond" class="icon diamond" ></a>
                    <a href="sellPage.php" id="diamondRing" class="icon diamondRing" ></a>
                    <a href="sellPage.php" id="bracelate" class="icon bracelate" ></a>
                    <a href="sellPage.php" id="earings" class="icon earings"></a>
                    <a href="sellPage.php" id="necklace" class="icon necklace"></a>
                    <a href="sellPage.php" id="ring" class="icon ring"></a>
                    <a href="sellPage.php" id="watch" class="icon watch"></a>
                </div>
            </section>
            <section id="media">
                <h3>Media</h3>
                <article class="oddColor">
                    <a href="" class="left" id="imgNumberone">
                        <div id="appears">
                            <strong>Hello world<br />*</strong>
                        </div>
                    </a>
                    <div class="paragraphright">
                        <p class="textaside">"The batting team attempts to score runs by hitting a ball that is thrown by the" </p>
                    </div>
                </article>
                <article>
                    <div class="paragraphleft">
                        <p class="textaside">The batting team attempts to score runs by hitting a ball that is thrown by th </p>
                    </div>
                    <a href="" class="right" id="imgNumbertwo">
                        <div id="appears">
                            <strong>Hello world<br />*</strong>
                        </div>
                    </a>
                </article>
                <article class="oddColor">
                    <a href="" class="left" id="imgNumberthree">
                        <div id="appears">
                            <strong>Hello world<br />*</strong>
                        </div>
                    </a>
                    <div class="paragraphright">
                        <p class="textaside">The batting team attempts to score runs by hitting a ball that is thrown by the </p>
                    </div>
                </article>
                <article>
                    <div class="paragraphleft">
                        <p class="textaside">The batting team attempts to score runs by hitting a ball that is thrown by the</p>
                    </div>
                    <a href="#" class="right" id="imgNumberfour">
                        <div id="appears">
                            <strong>Hello world <br />*</strong>
                        </div>
                    </a>
                </article>
            </section>
            <section id="weddingRings">
                <h3>Wedding</h3>
                <div id="wrapBelt">
                    <div id="principalImages">
                        <div id="goRight"></div>
                        <p>If you want it; Come and get it</p>
                        <div id="imageWedding" class="sameImages"></div>
                    </div>
                    <div id="SecondoryImages">
                        <div id="goLeft"></div>
                        <div id="firstImage">
                            <p>Women's wedding Rings</p>
                            <div id="womanweddingRing" class="sameImages"></div>
                        </div>
                        <div id="secondImage">
                            <p>Women's Diamond Rings</p>
                            <div id="womandiamondRing" class="sameImages"></div>
                        </div>
                        <div id="thirdImage">
                            <p>Men's Wedding Rings</p>
                            <div id="menWeddingRing" class="sameImages"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer>
            <div id="footContainer">
                <img class="logo" src="icons/logoType.png">
                <div id="footerWrap">
                    <nav class="navBarfooter">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="sellPage.php">Jewelry</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="#">LogIn</a></li>
                        </ul>
                    </nav>
                    <p id="copyRight">All Content Copyright</p>
                </div>
            </div>
        </footer>
    </div>
    <div id="sideBar" class="sideBarScroll">
        <h1> </h1>
        <ul>
            <li ><a href="index.php">Home</a></li>
            <li><hr /></li>   
            <li><a href="sellPage.php" class="ring">Rings</a></li>
            <li><a href="sellPage.php" class="watch">Watches</a></li>
            <li><a href="sellPage.php" class="earings">Earrings</a></li>
            <li><a href="sellPage.php" class="bracelate">Bracelets</a></li>
            <li><a href="sellPage.php" class="necklace">Necklaces</a></li>
            <li><a href="sellPage.php" class="diamond">Diamonds</a></li>
            <li><hr /></li>          
            <li><a href="sellPage.php" class="platinum">Platinum</a></li>
            <li><a href="sellPage.php" class="silver">Silver</a></li>
            <li><a href="sellPage.php" class="gold">Gold</a></li>
        </ul>
        <h1></h1>
    </div>
</body>
</html>
