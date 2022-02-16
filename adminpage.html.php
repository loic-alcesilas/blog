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
        session_start();
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
    <h1>Editeur de chapitre</h1>
    <form method="post">
      <textarea id="mytextarea">Votre nouveau chapitre :</textarea>
    </form>
</body>
 <script type="text/javascript" src="assets/js/tinymce.js"></script> 
</html>