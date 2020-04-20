<?php

require_once 'classes/Recipes.php';
$recipe_obj = new Recipe();


//$recipe = $recipe_obj->getInfoRecipe();

if(isset($_POST['search']))
    {   
        $keyword=$_POST['searchkey'];
        $getSearchRecipe=$recipe_obj->getSearchRecipe($keyword);
        $getSearchRecipe=$getSearchRecipe['results'];
        
        //var_dump($getSearchRecipe);
        //var_dump($getSearchRecipe['results'][0]['offset']);
    }

?>

<!DOCTYPE html>
<html>
<title>Food Recipes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</html>

<body>

	
  <?php
    require_once ('includes/header.php');
  ?>

  <main  class="container">
  <div class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mr-auto">
          <h1 class="mb-5">Find Recipe</h1>
        </div>
        
        <div>
          <form method="POST">
            <div class="form text-center">
              <div class="col-md-9">
                <input type="text" name="searchkey" class="form-control" placeholder="Enter recipe name...">
              </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-success" name="search">Search!</button>
              </div>
            </div>
          </form>
        </div>
        </div>
        <div class="card-deck">
          <?php
           if(isset($_POST['search'])){
              foreach($getSearchRecipe as $r) 
                 {
                   echo("
                     <div class='card'>
                       <a href='viewRecipe.php?id=".strval($r['id'])."'>
                         <div class='card-body'>
                           <h3 class='card-title'>".strval($r['title'])."</h3>
                         </div>
                       </a>
                     </div>
                     "); 
                  }
            }
            ?> 
      </div>
    </div>
    </div>
  </main>
  </body>
  

  <!-- Footer -->
  <?php
    require_once('includes/footer.php');
  ?>

</body>
</html>