<?php
include('../includes/config.php');         

        // Check connection
        if ($mysqli->connect_error) {      
            die("Connection failed: " . $mysqli->connect_error);
        } 
        
                     if (isset($_GET['del']))
                    {
        	            $id= $_GET['del'];
     

                        // sql to delete a record
                        $sql = "DELETE FROM product WHERE id='$id'";
                        if ($mysqli->query($sql) === TRUE) {
                            echo "Record deleted successfully";
                        } else {
                            echo "Error deleting record: " . $mysqli->error;
                        }

                     }

        $mysqli->close();       
        
?>