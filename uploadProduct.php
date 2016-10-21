<?php
ini_set('mysql.MYSQLI_OPT_CONNECT_TIMEOUT',300);
ini_set('DEFAULT_SOCKET_TIMEOUT',300);
?>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="css/uploadProduct.css" rel="stylesheet" />
    <script src="Scripts/jquery-2.2.3.js"></script>
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
                <li><a href="#">About</a></li>
                <li><a href="index.php" id="headerJewelry">Jewelry</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div id="container">

        <section id="contactSectionStyled">
            <h3>Upload Product</h3>
            <form enctype="multipart/form-data" method="POST">

                <div class="wrapInputText">
                    <input type="text" name="price" class="inputContact" />
                    <p class="text" id="price">price</p>
                </div>

                <div class="wrapInputText">
                    <input type="text" name="type" class="inputContact" />
                    <p class="text" id="type">type</p>
                </div>      

                <div class="wrapInputText">
                    <input type="text" name="material" class="inputContact" />
                    <p class="text" id="material">material</p>
                </div>   

                <div class="wrapInputText">
                    <input type="text" name="size" class="inputContact">
                    <p class="text" id="size">size</p>
                </div>

                <div class="wrapInputText">
                    <input type="text" name="maker" class="inputContact">
                    <p class="text" id="maker">maker</p>
                </div>

                <div class="wrapInputText" >
                    <input name="imageone" type="file" class="chooseImage"/>
                </div>

                <div class="wrapInputText" >
                    <input  name="imagetwo" type="file" class="chooseImage"/>
                </div>

                <div class="wrapInputText" >
                    <input name="imagethree" type="file" class="chooseImage"/>
                </div>

                <div class="wrapInputText" >
                    <input name="imagefour" type="file" class="chooseImage"/>
                </div>

                <div class="wrapInputText" >
                    <input name="imagefive" type="file" class="chooseImage"/>
                </div>

                <input class="lastItems" type="submit" name="sumit" value="Submit">

            </form>



             <?php

    if (isset($_POST['sumit']))
    {

        if ( getimagesize($_FILES['imageone']['tmp_name'])==FALSE || getimagesize($_FILES['imagetwo']['tmp_name'])==FALSE || getimagesize($_FILES['imagethree']['tmp_name'])==FALSE || getimagesize($_FILES['imagefour']['tmp_name'])==FALSE || getimagesize($_FILES['imagefive']['tmp_name'])==FALSE )
        {
            echo "please select five images";
        }else
         {

             if ( $_FILES['imageone']['size'] > 100000 || $_FILES['imagetwo']['size'] > 100000 || $_FILES['imagethree']['size'] > 100000 ||  $_FILES['imagefour']['size'] > 100000 ||  $_FILES['imagefive']['size'] > 100000  )
            {
                echo "Sorry, your file is too large only 100 kb per photo.";
            }else
             {            
             //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
             //    // Allow certain file formats
             //   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
             //       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
             //   }else
             //       {
                        $imageone=$_FILES['imageone']['tmp_name'] ;
                        $imageone=file_get_contents($imageone);
                        $imageone=base64_encode($imageone);
                        $image_one = $_FILES['imageone']['name'];
                        move_uploaded_file($imageone,"photos/$image_one");

                        $imagetwo=$_FILES['imagetwo']['tmp_name'] ;
                        $imagetwo=file_get_contents($imagetwo);
                        $imagetwo=base64_encode($imagetwo);
                        $image_two = $_FILES['imagetwo']['name'];
                        move_uploaded_file($imagetwo,"photos/$image_two");

                        $imagethree=$_FILES['imagethree']['tmp_name'] ;
                        $imagethree=file_get_contents($imagethree);
                        $imagethree=base64_encode($imagethree);
                        $image_three = $_FILES['imagethree']['name'];
                        move_uploaded_file($imagethree,"photos/$image_three");

                        $imagefour=$_FILES['imagefour']['tmp_name'] ;
                        $imagefour=file_get_contents($imagefour);
                        $imagefour=base64_encode($imagefour);
                        $image_four = $_FILES['imagefour']['name'];
                        move_uploaded_file($imagefour,"photos/$image_four");

                        $imagefive=$_FILES['imagefive']['tmp_name'] ;
                        $imagefive=file_get_contents($imagefive);
                        $imagefive=base64_encode($imagefive);
                        $image_five = $_FILES['imagefive']['name'];
                        move_uploaded_file($imagefive,"photos/$image_five");


                        $price=(int)$_POST["price"];
                        $type=$_POST["type"];
                        $material=$_POST["material"];
                        $size=(int)$_POST["size"];
                        $maker=$_POST["maker"];

                        // Create connection
                        $con=new mysqli("localhost","root","","mydb");
                        $sql = "insert into product (price,type,material,size,maker,imageone,imagetwo,imagethree,imagefour,imagefive) VALUES ('$price','$type','$material','$size','$maker','$imageone','$imagetwo','$imagethree','$imagefour','$imagefive')";

                        if ($con->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }

                    $con->close();
        
                    //}


                

            }
         }
        showImage();
    }

                    function showImage( )
    {
       $con=new mysqli("localhost","root","","mydb");        

        $sql="select * from product";
        $result = $con->query($sql);

         if ($result->num_rows > 0) {
            // output data of each row
                 while ($row= mysqli_fetch_array($result) )
                    {
                        //echo '<img height="300" width="300" src="data:image;base64,'. $row['imageone'].'">';
                        //echo '<img height="300" width="300" src="data:image;base64,'. $row['imagetwo'].'">';
                        //echo '<img height="300" width="300" src="data:image;base64,'. $row['imagethree'].'">';
                        //echo '<img height="300" width="300" src="data:image;base64,'. $row['imagefour'].'">';
                        //echo '<img height="300" width="300" src="data:image;base64,'. $row['imagefive'].'">';

                           echo "<tr><td>" . $row["id"]. "</td><td>" . $row["price"]. " " . $row["type"]. "</td><td>" . $row["material"]. " " . $row["size"]. "</td><td>" . $row["maker"]. " " . $row["imageone"]. "</td><td>" . $row["imagetwo"]. " " . $row["imagethree"]. "</td><td>" . $row["imagefour"]. " " . $row["imagefive"]. "</td></tr>";
                    }
            } else {
                    echo "0 results";
                  }

        $con->close();

    }

    

    ?>



        </section>
        <footer>
            <div id="footContainer">
                <img class="logo" src="icons/logoType.png">
                <div id="footerWrap">
                    <nav class="navBarfooter">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#Jewelry">Jewelry</a></li>
                            <li><a href="#">Search</a></li>
                            <li><a href="#">Contact</a></li>
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
            <li>Home</li>
            <li><hr /></li>
            <li>Rings</li>
            <li>Watches</li>
            <li>Earrings</li>
            <li>Bracelets</li>
            <li>Necklaces</li>
            <li>Diamonds</li>
            <li><hr /></li>
            <li>Platinum</li>
            <li>Silver</li>
            <li>Gold</li>
        </ul>
        <h1></h1>
    </div>
</body>
</html>
