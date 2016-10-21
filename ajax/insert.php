<?php 
include('../includes/config.php'); 

// Check connection
        if ($mysqli->connect_error) {      
            die("Connection failed: " . $mysqli->connect_error);
        } 

                            //if ( getimagesize($_FILES['imageone']['tmp_name'])==FALSE || getimagesize($_FILES['imagetwo']['tmp_name'])==FALSE || getimagesize($_FILES['imagethree']['tmp_name'])==FALSE || getimagesize($_FILES['imagefour']['tmp_name'])==FALSE || getimagesize($_FILES['imagefive']['tmp_name'])==FALSE )
                            //{           
  
                                 $imageone=$_FILES['imageone']['tmp_name'] ;
                                 $imageone=file_get_contents($imageone);
                                 $imageone=base64_encode($imageone);
                                                $imageone="data:image/jpeg;base64, ".$imageone;
                                 $image_one = $_FILES['imageone']['name'];
                                 move_uploaded_file($imageone,"photos/$image_one");

                                 $imagetwo=$_FILES['imagetwo']['tmp_name'] ;
                                 $imagetwo=file_get_contents($imagetwo);
                                 $imagetwo=base64_encode($imagetwo);
                                                 $imagetwo="data:image/jpeg;base64, ".$imagetwo;
                                 $image_two = $_FILES['imagetwo']['name'];
                                 move_uploaded_file($imagetwo,"photos/$image_two");

                                 $imagethree=$_FILES['imagethree']['tmp_name'] ;
                                 $imagethree=file_get_contents($imagethree);
                                 $imagethree=base64_encode($imagethree);
                                                 $imagethree="data:image/jpeg;base64, ".$imagethree;
                                 $image_three = $_FILES['imagethree']['name'];
                                 move_uploaded_file($imagethree,"photos/$image_three");

                                 $imagefour=$_FILES['imagefour']['tmp_name'] ;
                                 $imagefour=file_get_contents($imagefour);
                                 $imagefour=base64_encode($imagefour);
                                                 $imagefour="data:image/jpeg;base64, ".$imagefour;
                                 $image_four = $_FILES['imagefour']['name'];
                                 move_uploaded_file($imagefour,"photos/$image_four");

                                 $imagefive=$_FILES['imagefive']['tmp_name'] ;
                                 $imagefive=file_get_contents($imagefive);
                                 $imagefive=base64_encode($imagefive);
                                               $imagefive="data:image/jpeg;base64, ".$imagefive;
                                 $image_five = $_FILES['imagefive']['name'];
                                 move_uploaded_file($imagefive,"photos/$image_five");

                                 $price=(int)$_POST["price"];
                                 $type=$_POST["type"];
                                 $material=$_POST["material"];
                                 $size=(int)$_POST["size"];
                                 $maker=$_POST["maker"];

                                 $sql = "insert into product (price,type,material,size,maker,imageone,imagetwo,imagethree,imagefour,imagefive) VALUES ('$price','$type','$material','$size','$maker','$imageone','$imagetwo','$imagethree','$imagefour','$imagefive')";

              if ($mysqli->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $mysqli->error;
            }

            $mysqli->close();   
  
?>
