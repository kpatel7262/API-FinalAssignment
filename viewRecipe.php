<?php
require_once 'classes/Recipes.php';

$recipeID = $_GET['id'];

$recipe = new Recipe();

$info = $recipe->getInfoRecipe($recipeID);
$r_image = $info['image'];

$steps = $recipe->getRecipeSteps($recipeID);
//var_dump($steps);

$steps = $steps[0]['steps'];
//var_dump($steps);

//var_dump($r_image); 


if(isset($_POST['convert-pdf'])){
  $recipe->printRecipe($recipeID);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
  </head>
  <body>
    <?php
    	require_once ('includes/header.php');
    ?>
    <main class="border border-dark container">
      <form method="POST">
    	 <button style="font-size:24px" name="convert-pdf" id="convert-pdf">Convert in PDF<i class="fa fa-file-pdf-o"></i></button>
      </form>
    	<div class="container">
	    	<div>
	    		<div class="image text-center">
	    			<img src="<?= $r_image ?>"/>
	    		</div>
	    		<div class="container text-center">

	    			<h4><?= $info['title']?></h4>
	    			<p>Ready in: <?= $info['readyInMinutes']?> minutes</p>
	    			<p>Serving: <?= $info['servings']?> people</p>
	    			
	    			<?php
    	    			foreach($steps as $s){
                  
                    echo (
                      "<div>".$s['number']." ".$s['step']."</div>"
                      
                      );
                  }
	    			?>

	    		</div>
	    	</div>
	    	<div>
	    		<div class="ingredients">

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
  </main>
  	<?php
  		require_once ('includes/footer.php');
  	?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>