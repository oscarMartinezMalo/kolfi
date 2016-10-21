<?php      
 
include('../includes/config.php');

        $query="SELECT * FROM `product` ORDER BY `id` DESC LIMIT 1";
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

?>
