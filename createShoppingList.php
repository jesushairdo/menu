<?php
//create shopping list from menus created.
// need to workout whether to choose a list of menus, or use a start date / end date, OR do i create another object that represents the full week?
$recipeSql = 'SELECT tblIngredients.ingredientName AS IngredientName, SUM(tblRecipeIngredients.amount) AS IngredientAmount, tblUnits.unitName AS unitName
FROM tblRecipeIngredients
LEFT JOIN tblIngredients ON tblIngredients.ingredientId = tblRecipeIngredients.ingredientId
LEFT JOIN tblUnits ON tblUnits.unitId = tblRecipeIngredients.unitId
WHERE tblRecipeIngredients.recipeId = :recipeId
GROUP BY IngredientName, unitName
ORDER BY ingredientName ASC';
//prepare statement
$recipeStmt=$db->prepare($recipeSql);
$recipeStmt->bindParam(':recipeId', $recipeId);
//setup variable ready to execute prepared statement
$recipeId = 1;
$recipeResults=$recipeStmt->execute();
//just grab all results
$recipeResultSet=$recipeResults->fetchAll();
//debug output the full result set
print_r($recipeResultSet);
die();
?>