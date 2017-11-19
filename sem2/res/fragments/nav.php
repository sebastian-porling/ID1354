<nav class="navbar navbar-in navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a class="navbar-brand" href="index.php">Seminar 1</a>
        </div>
        
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php#calendar">Calendar</a></li>
                <li><a href="recipes.php">Recipes</a></li>
                
            </ul>
            <?php if(isset($_SESSION['id'])){
                echo "<p style='float: right; color: #FFF; margin-top: 10px;'>Logged in as " . $_SESSION['username']  . ' <button type="button" class="btn btn-danger"><a href="logout.php" style="color: white;">Logout</a></button></p>';
            } ?>
        </div>
        
    </div>
</nav>
