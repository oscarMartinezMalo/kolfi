<?php       
include('../includes/config.php');


 if (isset($_GET['id']))
        {
        	$id= $_GET['id'];
            $query="SELECT * FROM `product`  WHERE id='$id'";
            $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
            $arr = array();

            if($result->num_rows > 0) {
	            $row = $result->fetch_assoc();
		            $arr[] = $row;		 
            }
            # JSON-encode the response
            $json_response = json_encode($arr);

            // # Return the response
            echo $json_response; 
        }
?>
