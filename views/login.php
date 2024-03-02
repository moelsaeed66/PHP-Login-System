<?php  include('assets/header.php');  ?>

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-center display-4 border my-5 p-2"> Login</h1>
        </div>
        <?php if(isset($_SESSION['errors'])):?>

            <div class="alert alert-danger text-center"><?php echo $_SESSION['errors'] ;?></div>
            <?php unset($_SESSION['errors']);?>

        <?php endif;?>
        <?php if(isset($_SESSION['success'])):?>

            <div class="alert alert-danger text-center"><?php echo $_SESSION['success'] ;?></div>
            <?php unset($_SESSION['success']);?>

        <?php endif;?>
        <div class="col-sm-6 mx-auto">
            <div class="border p-5 my-3">
                <form action="../handlers/handle_login.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Your Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-block btn-primary"  value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php  include('assets/footer.php');  ?>
