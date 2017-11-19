<?php
$xml=simplexml_load_file("http://localhost:8888/ID1354/sem2/recipes.xml") or die("Error: Cannot create object");

?>
<div id="top-container" class="container-fluid bg-2 text-center">
        <br />
        <br />
        <br />
        <h1>Recipes</h1>
    </div>
    
    <div class="container-fluid text-center" style="padding: 0;">
        <?php 
        foreach($xml->recipe as $recipe){
            echo '<a href="recipe.php?name=' .  $recipe->title . '"> 
                    <div class="col-sm-6 col-md-4 index-recipe index-recipe1" title="' . $recipe->title . '" style="background-image: url(' . $recipe->image . '")> 
                        <div class="labell"><span class="label label-primary">' . $recipe->title . '</span></div>
                    </div>
                </a>';
        }
            
    ?>


        <a href="#">
            <div class="col-sm-6 col-md-4 index-recipe index-recipe3" title="Tacos">
                <div class="labell"><span class="label label-primary">Tacos</span></div>
            </div>
        </a>

        <a href="#">
            <div class="col-sm-6 col-md-4 index-recipe index-recipe4" title="Onion soup">
                <div class="labell"><span class="label label-primary">Onion soup</span></div>
            </div>
        </a>

        <a href="#">
            <div class="col-sm-6 col-md-4 index-recipe index-recipe5" title="Bean burger">
                <div class="labell"><span class="label label-primary">Bean burger</span></div>
            </div>
        </a>

        <a href="#">
            <div class="col-sm-6 col-md-4 index-recipe index-recipe6" title="Carbonara">
                <div class="labell"><span class="label label-primary">Carbonara</span></div>
            </div>
        </a>

        <a href="#">
            <div class="col-sm-6 col-md-4 index-recipe index-recipe7" title="Chicken nuggets">
                <div class="labell"><span class="label label-primary">Chicken nuggets</span></div>
            </div>
        </a>

        <a href="#">
            <div class="col-sm-6 col-md-4 index-recipe index-recipe8" title="Meatloaf">
                <div class="labell"><span class="label label-primary">Meatloaf</span></div>
            </div>
        </a>
    </div>