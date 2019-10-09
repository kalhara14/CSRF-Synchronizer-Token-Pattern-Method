<!DOCTYPE html>
<html>
	<head>
		<title>Cross Site Request Forgery Protection</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="stylesheet.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	

	</head>
    <body>
    <div class="sidenav">
         <div class="login-main-text">
            <h1>CSRF Synchronizer Token Pattern Method</h1>
            <h2><br>Test Application
            <br> Result Page</h2>
         </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <?php
                    require 'csrf.php';
                    // origin validation using referer header change accordingly
                    if(strcmp($_SERVER['HTTP_REFERER'],"http://localhost/CSRF_Synchronizer_Token_Pattern_Method/updateInfo.php") == 0 || strcmp($_SERVER['HTTP_REFERER'],"https://localhost/CSRF_Synchronizer_Token_Pattern_Method/updateInfo.php") == 0 )
                    {
                        if(!empty($_POST['updatepost'])&&!empty($_POST['token']))
                        {
                            $token = $_POST['token'];
                            $text = $_POST['updatepost'];
                            if(!empty($_COOKIE['SessionID']))
                            {
                                if(csrf::validateToken($_COOKIE['SessionID'],$token) == 0 )
                                {
                                    echo "valid request<br>";
                                    echo "<h2>message :";
                                    echo $text;
                                    echo "</h2>";
                                }
                                else
                                {
                                    echo "<br>invalid request<br>";
                                }
                            }
                            else
                                echo "Invalid request<br>";
                        }
                    }
                    else 
                        echo "wrong origin<br>";
                ?>
             </div>       
                      <a  class="btn btn-info btn-md" href = "updateInfo.php">home</a>
        </div>
    </div>
    </body>
</html>
