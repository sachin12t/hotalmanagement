<?php include "layout/header.php";

session_start();
if(!isset($_SESSION['id'])){
    header('Location:login.php');
}
//print_r($_SESSION);
?>
<section class="contact-section py-4">
    <div class="container">
        <div class="row">
        <a href="logout.php">Logout</a>
        </div>
    </div>
</section>

<?php include "layout/footer.php";?>