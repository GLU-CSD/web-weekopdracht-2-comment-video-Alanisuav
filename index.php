<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST["name"],
        'email' => $_POST["comment"],
        'message' => $_POST["comment"]

        // 'name' => "Ieniminie",
        // 'email' => "ieniminie@sesamstraat.nl",
        // 'message' => "Geweldig dit"
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/watch?v=StjW_iuFln4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <h2>Hieronder komen reacties</h2>
    <form action="" method="POST">
        <label for="fname">name</label><br>
        <input type="text" id=fname name="name" value=""><br> 
        <label for="lname">email</label><br>
        <input type="text" id=lname name="email" value=""><br><br>
        <label for="lname">comment</label><br>
        <textarea id="w3review" name="comment" rows="4" cols="50"></textarea>
        <input type="submit" value="verzenden"> 
    </form>

    <p>Maak hier je eigen pagina van aan de hand van de opdracht</p> 
<?php
foreach ($getReactions as $reaction){
    echo("<div class='message'>");
    echo "<h3>".$reaction['name']."</h3>";
    echo "<p>".$reaction['message']."</p>";
    echo ("</div>");
}



?>



</body>
</html>

<?php
$con->close();
?>