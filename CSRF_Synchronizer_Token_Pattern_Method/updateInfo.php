<!DOCTYPE html>
<html>
	<head>
		<title>Cross Site Request Forgery Protection</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="stylesheet.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script>
                //XML HTTP request to get csrf_token
                            $(document).ready(function(){
	
                                var xhttp;
                                xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                 if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("csrf_token").setAttribute('value', this.responseText) ;
                                 }
                
                
                            };
                
                            xhttp.open("POST", "ajax_response.php", true);
                            xhttp.send();
                
                             });
                    </script>
     
	
	</head>
    <body>
    <div class="sidenav">
         <div class="login-main-text">
            <h1>CSRF Synchronizer Token Pattern Method</h1>
            <h2><br>Test Application
            <br> Login Page</h2>
            <p>Enter some text to test the application.</p>
         </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form class="form" action="validateReq.php" method="post">
                            <div class="form-group">
                                <label for="username" class="text-white"><h4>Write Something<h4></label><br>
                                <input type="text" name="updatepost" class="form-control">
                            </div>
                            <div id="div1">
					              <input type="hidden" name="token" value="" id="csrf_token"/>
					        </div>
                            <div class="form-group">
                                <input type="submit"  class="btn btn-info btn-md" value="updatepost">
                            </div>
                      </form>
            </div>       
                      <a  class="btn btn-info btn-md" href = "logout.php">logout</a>
        </div>
    </div>
    </body>
</html>