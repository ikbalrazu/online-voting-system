<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/cover.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        color: #fff;
        background: #000000;

        /* text-align: center; */
    }
</style>

<body>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand"><a href=""></a></h3>
                <nav class="nav nav-masthead justify-content-center">
                    <!-- <a class="btn btn-outline-success mx-2" href="./pages/signin.php">Sign in</a> -->
                    <!-- <a class="btn btn-outline-primary mx-2" href="./pages/signup.php">Sign up</a> -->
                    <?php

                    if (!isset($_SESSION['uemail'])) {

                        echo '<a class="btn btn-outline-success mr-3" href="./pages/signin.php">Sign in</a>
        <a class="btn btn-outline-primary" href="./pages/signup.php">Sign up</a>';
                    } else {
                        echo '<button type="button" class="btn btn-outline-success text-uppercase  mr-3">HI ' . $_SESSION["uname"] . '</button>';
                        echo '<a class="btn btn-outline-primary  mr-3" href="../inc/logout.php">LOGOUT</a>';
                        echo '<a class="btn btn-outline-info mx-2" href="./viewpoll.php">POLL</a>';
                    }



























                    ?>
                    <?php if (!isset($_SESSION['uemail'])) {
                        echo '<a class="btn btn-outline-info mx-2" href="./admin/index.php">Admin</a>';
                    } ?>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading text-center display-4">VIEW ALL POLL</h1>
            <div class="row justify-content-between">
            <?php include('../inc/connection.php');


$poll_data = mysqli_query($connect, "SELECT * FROM poll_data");
// $poll_slice = mysqli_fetch_array($poll_data);
while ($poll_slice = mysqli_fetch_array($poll_data)):
    // $InputArray = array($poll_slice['choices']);
    // foreach(explode(",",$InputArray[0]) as $val){
    //         // echo $val." ";
            
    // }
    ?>
                

                    <div class="card my-2" style="background: #333; width:48%;">
                        <div class="card-header text-center">
                            <i>Start Date : <?php echo $poll_slice['start_date']; ?> </i>

                        </div>
                        <form action="vote.php" method="post">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $poll_slice['poll_name']; ?></h5>

                            
<?php 

 $InputArray = array($poll_slice['choices']);
    // foreach(explode(",",$InputArray[0]) as $val)     
    foreach(explode(",",$InputArray[0]) as $val):

?>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="radio" value="<?php echo $val; ?>" name="option[]" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1"><?php echo $val; ?></label>
                                <input type="text" value="<?php echo $poll_slice['id']; ?>" name="poll_id" hidden>
                            </div>
                 


<?php endforeach;?>
                            <button type="submit" class="btn btn-primary">VOTE</button>
                        </div>

                        </form>

                        <div class="card-footer text-center">End Date : <?php echo $poll_slice['end_date']; ?></div>

                    </div>






                <?php endwhile; ?>

            </div>

        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Create by <a href="#">Iqbal</a></p>
            </div>
        </footer>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>