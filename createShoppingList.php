<?php
//create shopping list from menus created.
// need to workout whether to choose a list of menus, or use a start date / end date, OR do i create another object that represents the full week?
//obtain the recipeIds for the menus required
$menuSql = 'SELECT tblMenus.meal1, tblMenus.meal2, tblMenus.meal3 FROM tblMenus WHERE tblMenus.menuId = :menuId';
$menuStmt = $db->prepare($menuSql);
$menuStmt->bindParam(':menuId', $menuId);
//for each menu run this next bit
$menuId = 1;
$menuStmt->execute();
$menus = $menuStmt->fetch(); // can only return one, as we are searching by menuId
//$allMenus = array();
$allMenus[] = $menus;
//prepare the SQL to obtain the ingredient list for this menu
$ingredientsSql = 'SELECT SUM(IngredientList.amount) AS amount, tblUnits.unitName AS unit, tblIngredients.ingredientName AS ingredient FROM (
SELECT  tblRecipeIngredients.amount AS amount, tblRecipeIngredients.unitId AS unitId, tblRecipeIngredients.ingredientId FROM tblRecipeIngredients WHERE tblRecipeIngredients.RecipeId = :meal1
UNION ALL
SELECT  tblRecipeIngredients.amount AS amount, tblRecipeIngredients.unitId AS unitId, tblRecipeIngredients.ingredientId FROM tblRecipeIngredients WHERE tblRecipeIngredients.RecipeId = :meal2
UNION ALL
SELECT  tblRecipeIngredients.amount AS amount, tblRecipeIngredients.unitId AS unitId, tblRecipeIngredients.ingredientId FROM tblRecipeIngredients WHERE tblRecipeIngredients.RecipeId = :meal3
) AS IngredientList
LEFT JOIN tblUnits ON tblUnits.unitId = IngredientList.unitId
LEFT JOIN tblIngredients ON tblIngredients.ingredientId = IngredientList.ingredientId
GROUP BY ingredient,unit';
$ingredientsStmt = $db->prepare($ingredientsSql);
$ingredientsStmt->bindParam(':meal1', $meal1);
$ingredientsStmt->bindParam(':meal2', $meal2);
$ingredientsStmt->bindParam(':meal3', $meal3);
//print_r($allMenus);
foreach ($allMenus as $menu)
{
    //get the ingredient list for this menu
    //print_r($menu);
    $meal1 = $menu->meal1;
    $meal2 = $menu->meal2;
    $meal3 = $menu->meal3;
    $ingredientsStmt->execute();
    while($result = $ingredientsStmt->fetch())
    {
        $ingredients[] = $result;
    }
}
print_r($ingredients);
die();
/*
$recipeSql = 'SELECT tblRecipeIngredients.ingredientId AS ingredientId, tblIngredients.ingredientName AS IngredientName, SUM(tblRecipeIngredients.amount) AS IngredientAmount, tblUnits.unitName AS unitName
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
$recipeStmt->execute();
//loop through results
while($result = $recipeStmt->fetch())
{
    $ingredientsArray[($result->ingredientId)]['name'] = $result->ingredientName;
    $ingredientsArray[($result->ingredientId)]['unit'] = $result->unitName;
    $ingredientsArray[($result->ingredientId)]['amount'] = $result->amount;

}
*/
//debug output the full result set
print_r($recipeResults);
die();
?>