<?php

class Recipe_model extends CI_Model{
    
    public function getRecipe($recipe = null){
        // Load XML
        $xmlData=simplexml_load_file("http://localhost:8888/ID1354/sem2/recipes.xml") or die("Error: Cannot create object");
        
        // Get the recipe
        foreach($xmlData->recipe as $recipes){
            if($recipes->title == $recipe){
                $recipeXml = $recipes;
                return $recipeXml;
            }
        }
    }
    
    public function getRecipes(){
        // Load XML
        $xmlData=simplexml_load_file("http://localhost:8888/ID1354/sem2/recipes.xml") or die("Error: Cannot create object");
        
        //Return XMLDATA
        return $xmlData;
    }
    
}

?>