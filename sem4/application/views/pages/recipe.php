
    <div id="top-container" class="container-fluid text-center">
        <br />
        <br />
        <br />
        <h1>
            <?php echo $recipe->title; ?>
        </h1>
    </div>

    <div class="container-fluid bg-3 recipes">
        <div class="row">
            <div id="recipe1" class="col-xs-12 col-sm-12 col-md-4 recipe2" title="Picture of <?php echo $recipe->title; ?>" style="background-image: url(<?php echo $recipe->image; ?>)">

            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h2>Ingredients</h2>
                <h3>
                    <?php echo $recipe->content->servings; ?>
                </h3>

                <ul>
                    <?php 
                    foreach($recipe->content->ingredients as $ingredients){
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
                    foreach($recipe->content->instructions->step as $step){
                        echo '<li><span>' . $step . '</span></li>
                        ';
                    }
                    ?>
                </ol>

            </div>

        </div>
    </div>

    