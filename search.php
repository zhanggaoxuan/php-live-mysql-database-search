<?php
$link = mysqli_connect("localhost", "root", "", "sample-database");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$term = mysqli_real_escape_string($link, $_REQUEST['term']); 
if(isset($term)){
    $sql = "SELECT nicename FROM country WHERE nicename LIKE '" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<p>" . $row['nicename'] . "</p>";
            }
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
mysqli_close($link);
?>