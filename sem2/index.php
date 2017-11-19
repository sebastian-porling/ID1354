<?php session_start(); ?>
<!DOCTYPE html>
<html>

<?php include("res/fragments/header.php"); ?>

<body data-spy="scroll" data-target=".navbar" data-offset="50" id="body">
    <script>
        $(document).ready(function() {
            // Add scrollspy to <body>
            $('body').scrollspy({
                target: ".navbar",
                offset: 50
            });

            // Add smooth scrolling on all links inside the navbar
            $("#myNavbar a").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
    <?php include("res/fragments/nav.php"); ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active" style="max-height: 600px;">
                <img src="img/food1.jpeg" alt="Burger">
            </div>

            <div class="item" style="max-height: 600px;">
                <img src="img/food2.jpg" alt="Burrito">
            </div>

            <div class="item" style="max-height: 600px;">
                <img src="img/food3.jpg" alt="Pizza">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>

    <div class="container-fluid bg-2 text-center">
        <h3>Applikationer för Internet ID1354</h3>
        <p>Seminare 1</p>
    </div>
    <div id="calendar" class="container-fluid bg-3 text-center">
        <h1>Calendar</h1>
        <br>
    </div>
    <div class="container-fluid bg-3 text-center ">
        <div class="row day-row">
            <div class="col-xs-1 col-md-1 day-col">
                Mån
            </div>
            <div class="col-xs-1 col-md-1 day-col">
                Tis
            </div>
            <div class="col-xs-1 col-md-1 day-col">
                Ons
            </div>
            <div class="col-xs-1 col-md-1 day-col">
                Tor
            </div>
            <div class="col-xs-1 col-md-1 day-col">
                Fre
            </div>
            <div class="col-xs-1 col-md-1 day-col">
                Lör
            </div>
            <div class="col-xs-1 col-md-1 day-col">
                Sön
            </div>
        </div>
        <div class="row kalender">
            <div class="col-xs-12 col-md-1 inactive">
                <span class="label label-default">30</span>
            </div>
            <div class="col-xs-12 col-md-1 inactive">
                <span class="label label-default">31</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">1</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">2</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">3</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">4</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">5</span>
            </div>
        </div>
        <div class="row kalender">
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">6</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">7</span>
            </div>
            <a href="recipe1.html">
                <div class="col-xs-1 col-md-1 recipe1-img day" title="Meatballs">
                    <span class="label label-default">8</span>
                </div>
            </a>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">9</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">10</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">11</span>
            </div>
            <div class="col-xs-12 col-md-1 day">
                <span class="label label-default">12</span>
            </div>
        </div>
        <div class="row kalender">
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">13</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">14</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">15</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">16</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">17</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">18</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">19</span>
            </div>
        </div>
        <div class="row kalender">
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">20</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">21</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">22</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">23</span>
            </div>
            <a href="recipe2.html">
                <div class="col-xs-1 col-md-1 recipe2-img day" title="Pancakes">
                    <span class="label label-default">24</span>
                </div>
            </a>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">25</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">26</span>
            </div>
        </div>
        <div class="row kalender">
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">27</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">28</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">29</span>
            </div>
            <div class="col-xs-1 col-md-1 day">
                <span class="label label-default">30</span>
            </div>
            <div class="col-xs-1 col-md-1 inactive">
                <span class="label label-default">1</span>
            </div>
            <div class="col-xs-1 col-md-1 inactive">
                <span class="label label-default">2</span>
            </div>
            <div class="col-xs-1 col-md-1 inactive">
                <span class="label label-default">3</span>
            </div>
        </div>
    </div>

    <?php include("res/fragments/browse_recipe.php"); ?>
    

    <br>

    <br>
    <br>

    <?php include("res/fragments/footer.php"); ?>
</body>

</html>
