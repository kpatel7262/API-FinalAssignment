<?php
require_once ('vendor/autoload.php');

class Recipe
{
	public static $apiKey = "7c3f187e6ebb4f8aaaa0360a0c2e1fd6";

	public function getSearchRecipe($searchkey){
		$endPoint = "https://api.spoonacular.com/recipes/search?apiKey=".$this::$apiKey."&number=5&query=".$searchkey;
		$recipe = file_get_contents($endPoint);
		$recipe = json_decode($recipe, true);
		//$recipe = $recipe['title'];
		return $recipe; 
	}
	
	
	public function getInfoRecipe($id){
		$endPoint = "https://api.spoonacular.com/recipes/".$id."/information?apiKey=".$this::$apiKey;
		$info = file_get_contents($endPoint);
		$info = json_decode($info, true);
		return $info;
		//var_dump($info);
	}

	public function getRecipeSteps($id){
		$endPoint = "https://api.spoonacular.com/recipes/".$id."/analyzedInstructions?apiKey=".$this::$apiKey;
		$steps = file_get_contents($endPoint);
		$steps = json_decode($steps, true);
		return $steps;
	}

	public function printRecipe($id){
		//$url = "http://localhost/XML/assignment/API-final-assign-PatelKrishna/viewRecipe.php?id=".$id;
		$html = file_get_contents("http://localhost/XML/assignment/API-final-assign-PatelKrishna/viewRecipe.php?id=".$id);
		//var_dump($html);
		try
			{
			    // create the API client instance
			    $client = new \Pdfcrowd\HtmlToPdfClient("krsnapatel6129","1c4c1c499e87565b81d02fec134fadaf");
				$pdf = $client->convertStringToFile($html,"Recipe.pdf");

				//return $pdf;
				// header("Content-type: application/pdf");
  				//header("Content-Length: " . filesize($pdf));	
				// readfile($pdf); 
				//$client->convertFileToFile("../viewRecipe.php", "recipe.pdf");
				// run the conversion and write the result to a file
			 	//$pdf = $client->convertString($html,"recipe.pdf");
			 	// Send the file to the browser.
				//readfile($pdf);
				//$client->convertUrlToFile($html,"recipe.pdf");
			}
		
		catch(\Pdfcrowd\Error $why)
			{
			    // report the error
			    error_log("Pdfcrowd Error: {$why}\n");

			    // rethrow or handle the exception
			    throw $why;
			}
	}

}
?>