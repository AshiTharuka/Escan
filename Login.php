<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Easy Life</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
    

<br>
<body>
<div class="container-fluid">
        <!-- row -->
        

          <div class="login-marg">
            <!-- Billing Details -->
            
            
            <!-- /Billing Details -->

<form  class="login100-form " method="post">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Login Here</h2>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                       <label for="email">Email</label>
                                        <input class="input input-borders" type="email" name="email" placeholder="Email" id="password" required>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label for="email">Password</label>
                                        <input class="input input-borders" type="password" name="password" placeholder="password" id="password" required>
                                    </div>
                                    
                               
                                    
                                        <input class="primary-btn btn-block"   type="submit" name="LoginAction" Value="Login">
                                        
                                        <div class="panel-footer"><div class="alert alert-danger"><h4 id="e_msg"></h4></div></div>

                                </div>
                                
								</form>

<?php
session_start();

require"db.php";

if(isset($_POST['LoginAction']))
    {

$uname=$_POST['email'];
$psw=$_POST['password'];



//sql query to search data in database
 $result = mysqli_query($con, 'select * from admin_info where admin_email = "'.$uname.'" and
 admin_password  = "'.$psw.'"');
 
 
if(mysqli_num_rows($result)==1)
{
    $_SESSION['Luname'] = $uname;
    echo "<script>location.href='index.php'</script>";
    //header("Location: customerPage.php");  
}
    }
else
{

    echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-danger'>Failed</span>
                                            Invalid Email or Password.
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
    //echo "<script>alert('Invalid Email or Password')</script>";
    }

    

?>         





              </div>
            </div>
          </body>