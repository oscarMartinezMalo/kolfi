<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="css/contact.css" rel="stylesheet" />
    <script src="Scripts/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1B2MPzHeQH-b99OVowufe31eZbSzaWf4&libraries=places"></script>
    <script src="Scripts/contact.js"></script>
 
</head>
<body>
    <input type="checkbox" id="sideBarToggler" />
    <header>
        <div id="logoWrap">
            <label class="logoBurguer" for="sideBarToggler">
                <span id="burguerStyle"></span>
            </label>
            <a href="index.php"><img src="icons/logoType.png" alt="Logo" class="logo" /></a>
            <div href="#" id="phoneIconLink"><img src="icons/phone.png" alt="phone" id="phoneIcon" /><p id="telNumber">876-789-7845</p></div>
        </div>
        <nav class="navBarHeader" id="gooo">
            <ul>
                <li><a href="index.php" id="headerJewelry">Home</a></li>
                <li><a href="sellPage.php" >Jewelry</a></li>
                <li><a href="AddUpdateRemove.php">LogIn</a></li>
            </ul>
        </nav>
    </header>

    <div id="container">
        <section id="mapSection">
            <div id="map"></div>
            <div id="<!--message-->"></div>
        </section>

        <section id="contactSectionStyled">
            <h3>Contact me</h3>
            <form action="https://formspree.io/ommalor@gmail.com" method="POST">

                <div class="wrapInputText">
                    <input type="text" name="Name" class="inputContact" />
                    <p class="text" id="name">your name</p>
                </div>

                <div class="wrapInputText">
                    <input type="email" name="_replyto" class="inputContact">
                    <p class="text" id="email">your email</p>
                </div>

                <div class="wrapInputText">
                    <textarea type="text" name="problem" class="inputContact"></textarea>
                    <p class="text" id="textArea">tell me about it</p>
                </div>

                <input class="lastItems" type="submit" value="Send">

            </form>
        </section>

        <section id="socialSection">
            <h3>social links</h3>
            <div id="socialWrap">
                <div class="boxWrapping">
                    <a href="#" id="youtube" class="socialIcons"></a>
                    <div class="socialBox"></div>
                </div>
                <div class="boxWrapping">
                    <a href="#" id="facebook" class="socialIcons"></a>
                    <div class="socialBox"></div>
                </div>
                <div class="boxWrapping">
                    <a href="https://www.pinterest.com/pin/367324913330450138/" id="pinterest" class="socialIcons"></a>
                    <div class="socialBox"></div>
                </div>
                <div class="boxWrapping">
                    <a href="#" id="twitter" class="socialIcons"></a>
                    <div class="socialBox"></div>
                </div>
                <div class="boxWrapping">
                    <a href="#" id="googleplus" class="socialIcons"></a>
                    <div class="socialBox"></div>
                </div>
            </div>
            <hr class="bar" />
            <a class="biglink" href="mailto:omartinezz1988@gmail.com">Kolfi@email</a>
        </section>
        <footer>
            <div id="footContainer">
                <img class="logo" src="icons/logoType.png">
                <div id="footerWrap">
                    <nav class="navBarfooter">
                        <ul>
                            <li><a href="index.php" id="headerJewelry">Home</a></li>
                            <li><a href="sellPage.php" >Jewelry</a></li>
                            <li><a href="AddUpdateRemove.php">LogIn</a></li>
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
