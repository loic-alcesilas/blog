<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connectAdmin.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `articles` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $articles = $query->fetch();

    // On vérifie si le produit existe
    if(!$articles){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: adminpage.html.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location:  adminpage.html.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>id : <?= $articles['id'] ?></h1>
                <p>title : <?= $articles['title'] ?></p>
                <p>slug : <?= $articles['slug'] ?></p>
                <p>introduction : <?= $articles['introduction'] ?></p>
                <p>content : <?= $articles['content'] ?></p>
                <p>créé le : <?= $articles['created_at'] ?></p>
                <p><a href="adminpage.html.php">Retour</a> <a href="editPost.php?controller=article&task=detail&id=<?= $articles['id'] ?>">Modifier</a> <a href="index.php?controller=article&task=delete&id=<?= $articles['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a></td></p>
            </section>
        </div>
    </main>
</body>
</html>
