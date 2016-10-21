<?php
include('../includes/config.php');  
            try{
// Check connection
            if ($mysqli->connect_error) {      
                die("Connection failed: " . $mysqli->connect_error);
            } 

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
                                        $imagefour="data:image/jpeg;base64, ".$imagefour;
                        $image_four = $_FILES['imagefour']['name'];
                        move_uploaded_file($imagefour,"photos/$image_four");

                        $imagefive=$_FILES['imagefive']['tmp_name'] ;
                        $imagefive=file_get_contents($imagefive);
                        $imagefive=base64_encode($imagefive);
                                    $imagefive="data:image/jpeg;base64, ".$imagefive;
                        $image_five = $_FILES['imagefive']['name'];
                        move_uploaded_file($imagefive,"photos/$image_five");

                        $id=(int)$_POST["id"];
                        $price=(int)$_POST["price"];
                        $type=$_POST["type"];
                        $material=$_POST["material"];
                        $size=(int)$_POST["size"];
                        $maker=$_POST["maker"];


                            //here validate the higher size of the sum of all images
                        if (!($_FILES['imageone']['size'] == 0))
                        {

                        }
                            $data = array();
                            $sql = "UPDATE product SET price='$price',type='$type',material='$material',size='$size',maker='$maker',imageone=IF('$imageone' = 'data:image/jpeg;base64, ', imageone, '$imageone'),imagetwo=IF('$imagetwo' = 'data:image/jpeg;base64, ', imagetwo, '$imagetwo'),imagethree=IF('$imagethree' = 'data:image/jpeg;base64, ', imagethree, '$imagethree'),imagefour=IF('$imagefour' = 'data:image/jpeg;base64, ', imagefour, '$imagefour'),imagefive=IF('$imagefive' = 'data:image/jpeg;base64, ', imagefive, '$imagefive') WHERE id='$id'";

                            if ($mysqli->query($sql) === TRUE) {
                            $ar = array('apple', 'orange', 'banana', 'strawberry');
                                $data[] = $ar;
                                //$data['message'] = 'User inserted successfully.';
                        } else {
                                throw new Exception( $mysqli->sqlstate.' - '. $mysqli->error );                                   
                                }

                        $mysqli->close();    
                        echo json_encode($data);
                        exit;
            
                }catch (Exception $e){
		            $data = array();
		            $data['success'] = false;
		            $data['message'] = $e->getMessage();
		            echo json_encode($data);
		            exit;
	            } 
        
?>