<?php include 'layout/header.php';
include 'dbconnect/config.php';
$fnameerr=$cpasserr=$emailerr=$passerr=$phoneerr="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['signup'])){
        if(empty($_POST['first_name']) || $_POST['first_name']==''){
            $fnameerr="*Please Enter your first name";
        }else if(empty($_POST['email']) || $_POST['email']==''){
            $emailerr="*Please Enter your email";
        }else if(empty($_POST['phone']) || $_POST['phone']==''){
            $phoneerr="*Please Enter your phone";
        }else if(empty($_POST['password']) || $_POST['password']==''){
            $passerr="*Please Enter your password";
        }else if((empty($_POST['c_password']) || $_POST['c_password']=='')){
            $cpasserr="*Please Enter your confirm password";
        }else if($_POST['c_password']!=$_POST['password']){
            $cpasserr="*Your confirm password is not same as password";
        }
        else{
            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $query = "INSERT INTO registration (firstname,lastname,email,phone,password,role) values('$firstname','$lastname','$email','$phone','$password','user')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<script>
                    alert('Your account Created successfully');
                    window.location.href='userlogin.php';
                </script>";
            }
        }
    }
}
?>
<section class="contact-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-12 col-sm-12"></div>
            <div class="col-lg-10 contact-info col-md-12 col-sm-12">
                <h1 style="text-decoration:underline;">Sign Up</h1>
                <form class="row g-3 mt-4 contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="col-lg-6 col-md-6">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control news-field" name="first_name"  id="fname">
                        <small style="color:red"><?php echo $fnameerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control news-field" name="last_name" id="lname">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <label for="email">Email</label>
                        <input type="email" class="form-control news-field" name="email" id="email">
                        <small style="color:red"><?php echo $emailerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <label for="phone">Phone</label>
                        <input type="text" class="form-control news-field" name="phone" id="phone">
                        <small style="color:red"><?php echo $phoneerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="msg">Password</label>
                        <input type="password" name="password" id="msg" class="form-control" />
                        <small style="color:red"><?php echo $passerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="c_password">Confirm Password</label>
                        <input type="password" name="c_password" id="c_password" class="form-control" />
                        <small style="color:red"><?php echo $cpasserr;?></small>
                    </div>
                     <div class="col-auto d-flex gap-2">
                        <input type="submit" name="signup" class="btn  mb-3 px-4 rounded-pill text-white news-field bg-dark" value="Sign Up" style="background:#3b5d50;">
                        <a class="btn  mb-3 px-4 rounded-pill text-white news-field bg-primary" href="userlogin.php">Log In</a>
                    </div> 
                </form>
            </div>

        </div>

        <div class="col-lg-1 col-md-12 col-sm-12"></div>
    </div>
    </div>
</section>
<?php include 'layout/footer.php';?>