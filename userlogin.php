<?php include "layout/header.php";
include 'dbconnect/config.php';
$emailerr=$passerr=$failer="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['login'])){
        if(empty($_POST['email']) || $_POST['email']==''){
            $emailerr="*Please Enter your email";        
        }else if(empty($_POST['password']) || $_POST['password']==''){
            $passerr="*Please Enter your password";
        }
        else{
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "select * from registration where email = '$email' && password='$password'";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result)==1){
                $data = mysqli_fetch_assoc($result);
                // print_r($data['firstname']);
                // print_r($data['lastname']);
                session_start();
                $_SESSION['name'] = $data['$firstname'].''.$data['$lastname'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['phone'] = $data['phone'];
                $_SESSION['role'] = $data['role'];
                $_SESSION['id'] = $data['id'];
                if($data['role']=='admin'){
                    header('Location:admin/dashboard.php');
                }
                else{
                    header('Location:userdashboard.php');
                }

            }else{
                $failer = "sumthing went wrong";
            }
            
        }
 
    }   
}
if(isset($_POST['g-recaptcha-response'])){
    // $secret = '6LdPBHcpAAAAAACVjwORblhbNwgSTxwsGhKSdt8c';
    // $response = $_POST['g-recaptcha-response'];
    
    // $remoteip=$_SERVER['REMOTE_ADDR'];
    // $url='https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip';
    // $responsedata= file_get_contents($url);
    // $datarow= json_decode($responsedata);
    // print_r($datarow);
    
}
else{
    echo "recaptcha error";
}
?>
<section class="contact-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-12"></div>
            <div class="col-lg-10 contact-info col-md-12 col-sm-12">
                <h1 style="text-decoration:underline;">Log In</h1>
                <p style="color:red"><?php echo $failer ?></p>
                <form class="row g-3 mt-4 contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    
                    <div class="col-lg-12">
                    <label for="email">Email</label>
                        <input type="email" class="form-control news-field" name="email" id="email">
                        <small style="color:red"><?php echo $emailerr;?></small>
                    </div>
                    
                    <div class="col-lg-12">
                        <label for="msg">Password</label>
                        <input type="password" name="password" id="msg" class="form-control" />
                        <small style="color:red"><?php echo $passerr;?></small>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LdPBHcpAAAAAEvebscM3Af-xkDD_j-qiA1KMtKl"></div>
                     <div class="col-auto">
                        <input type="submit" name="login" class="btn  mb-3 px-4 rounded-pill text-white news-field bg-primary hover" value="Log In" style="background:#3b5d50;">
                        <a class="btn  mb-3 px-4 rounded-pill text-white news-field bg-dark" href="registration.php">Sign Up</a>
                    </div> 

                </form>
            </div>

        </div>

        <div class="col-lg-1 col-md-12 col-sm-12"></div>
    </div>
    </div>
</section>
<?php include 'layout/footer.php';?>