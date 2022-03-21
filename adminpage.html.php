<!-- Affichage des Articles dans un Form -->
<?php
session_start();
// On inclut la connexion à la base
require_once('connectAdmin.php');

// On écrit notre requête
$sql = 'SELECT * FROM `articles`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/j7qj83cn44023cf2pic6ye20z1lfxozuoo80452dlkigamzo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div id="content">
        <!-- tester si l'utilisateur est connecté -->
        <a href='index.php?deconnexion=true'><span>Déconnexion</span></a>
        <?php
        if (isset($_GET['deconnexion'])) {
            if ($_GET['deconnexion'] == true) {
                session_unset();
                header("location: index.php");
            }
        } else if ($_SESSION['username'] !== "") {
            $user = $_SESSION['username'];
            // afficher un message
            echo "<br>Bonjour $user, vous êtes connectés<br>";
        }
        ?>
    </div>
    <main class="container">
        <div class="row">
            <section>
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";
                    }
                ?>
    <h1>Liste des Articles</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>title</th>
            <th>slug</th>
            <th>introduction</th>
            <th>content</th>
            <th>créé le</th>
        </thead>
        <tbody>
            <?php
            foreach ($result as $articles) {
            ?>
                <tr>
                    <td><?= $articles['id'] ?></td>
                    <td><?= $articles['title'] ?></td>
                    <td><?= $articles['slug'] ?></td>
                    <td><?= $articles['introduction'] ?></td>
                    <td><?= $articles['content'] ?></td>
                    <td><?= $articles['created_at'] ?></td>
                    <td><a href="details.php?controller=article&task=detail&id=<?= $articles['id'] ?>">Voir</a> <a href="<?= $articles['id'] ?>">Modifier</a> <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="add.php">Ajouter</a>
            </section>
        </div>
    </main>
</body>
</html>