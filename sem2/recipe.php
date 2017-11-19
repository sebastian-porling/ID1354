<?php 
    session_start();
    $currentRecipe = "";
    if(isset($_GET['name'])){
        $xml=simplexml_load_file("http://localhost:8888/ID1354/sem2/recipes.xml") or die("Error: Cannot create object");
        foreach($xml->recipe as $recipe){
            if($_GET['name'] == $recipe->title){
                $currentRecipe = $recipe;
            }
        }
    }else{
        header('Location : index.php');
        die();
    }
    
    if(isset($_SESSION['deleted'])){
        if($_SESSION['deleted'] == 'true'){
            echo "<script>alert('Comment deleted!')</script>";
            unset($_SESSION['deleted']);
        }else{
            echo "<script>alert('Could not delete that comment!')</script>";
            unset($_SESSION['deleted']);
        }
    }
    if(isset($_SESSION['register'])){
        if($_SESSION['register'] == 'true'){
            echo "<script>alert('Registered!')</script>";
            unset($_SESSION['register']);
        }else{
            echo "<script>alert('Could not register that username!')</script>";
            unset($_SESSION['register']);
        }
    }
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == 'false'){
            echo "<script>alert('That user does not exist!')</script>";
            unset($_SESSION['login']);
        }
    }
    
    

    
?>
<!DOCTYPE html>
<html lang="en">
<?php include("res/fragments/header.php"); ?>

<body>
    <?php include("res/fragments/nav.php"); 
    ?>
    <div id="top-container" class="container-fluid text-center">
        <br />
        <br />
        <br />
        <h1>
            <?php echo $currentRecipe->title; ?>
        </h1>
    </div>

    <div class="container-fluid bg-3 recipes">
        <div class="row">
            <div id="recipe1" class="col-xs-12 col-sm-12 col-md-4 recipe2" title="Picture of <?php echo $currentRecipe->title; ?>" style="background-image: url(<?php echo $currentRecipe->image; ?>)">

            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h2>Ingredients</h2>
                <h3>
                    <?php echo $currentRecipe->content->servings; ?>
                </h3>

                <ul>
                    <?php 
                    foreach($currentRecipe->content->ingredients as $ingredients){
                        echo '<li><b>' . $ingredients->title . '</b></li>
                        ';
                        foreach($ingredients->ingredient as $ingredient){
                            echo '<li>' . $ingredient . '</li>
                            ';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-4">
                <h2>Preparation </h2>
                <ol>
                    <?php
                    foreach($currentRecipe->content->instructions->step as $step){
                        echo '<li><span>' . $step . '</span></li>
                        ';
                    }
                    ?>
                </ol>

            </div>

        </div>
    </div>

    <div class="container-fluid comment-sec">
        <?php 
            if(isset($_SESSION['id'])){
                echo "<p>Logged in as " . $_SESSION['username'] . '</p>' . '<button type="button" class="btn btn-danger"><a href="logout.php" style="color: white;">Logout</a></button>';
            }else{
                echo '<p>To comment you have to login</p>';
                echo '<a href="#" data-toggle="modal" data-target="#login-modal"><button type="button" class="btn btn-default">Login</button>  </a>';
                echo '<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="loginmodal-container">
                                <h1>Login to Your Account</h1><br>
                                <form action="login.php" method="post">
                                    <input type="text" name="user" placeholder="Username" required autofocus>
                                    <input type="password" name="pass" placeholder="Password" required>
                                    <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                                </form>
                                <div class="login-help">
                                    <a href="#" data-toggle="modal" data-target="#register-modal"><button type="button" class="btn btn-default">Register</button></a>
                                </div>
                            </div>
                        </div>
                    </div>';
                echo '<a href="#" data-toggle="modal" data-target="#register-modal"><button type="button" class="btn btn-default">Register</button></a>';
                echo '<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="loginmodal-container">
                                <h1>Register new account</h1><br>
                                <form action="register.php" method="post">
                                    <input type="text" name="user" placeholder="Username" required autofocus>
                                    <input type="password" name="pass" placeholder="Password" required>
                                    <input type="submit" name="login" class="login loginmodal-submit" value="Register">
                                </form>
                            </div>
                        </div>
                    </div>';
            }
        ?>
        <?php 
        include("res/init.php");
        
        $sql = "SELECT * FROM comments where recipe='" . $_GET['name'] . "'";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                if($_GET['name'] == $row['recipe']){
                    echo 
                        '<div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">' . $row['username'] . '<small><i>    Posted on ' . $row['time'] . '</i></small></h4>' .
                                '<p>' . $row['comment'];
                    if($_SESSION['username'] == $row['username']){
                        echo "<a style='float: right;' href='delete_comment.php?id=" . $row['id'] . "'><button type='button' class='btn btn-danger'>Delete</button></a>";
                    }
                    echo        '</p></div>
                        </div>';
                }   
            }  
        }
        
        ?>

        <?php
        if(isset($_SESSION['id'])){
            echo '<form method="post" action="add_comment.php">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
            <br />
            <button type="submit" class="btn btn-default" name="site" value="' .  $_GET["name"] . '">Submit</button>
        </form>';
        }else{
            echo '<form>
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment" readonly></textarea>
            <br />
            <button class="btn btn-default" name="site" disabled="disabled">Submit</button>
        </form>';
        }
        ?>


    </div>
    <?php include("res/fragments/footer.php"); 
    
    ?>
</body>

</html>
