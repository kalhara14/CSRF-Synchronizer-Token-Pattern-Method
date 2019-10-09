<?php
      
    $myfile = fopen("Tokens.txt", "r") or die("Unable to open file!");
    $csrfToken = fgets($myfile);
    echo $csrfToken;
    fclose($myfile);
            
?>