<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .wrapper {
            width: 700px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="content">
                        <!-- tester si l'utilisateur est connecté -->
                        <a href='index.php?deconnexion=true'><span class="justify-content-center" >Déconnexion</span></a>
                        <?php
                        if (isset($_GET['deconnexion'])) {
                            if ($_GET['deconnexion'] == true) {
                                session_unset();
                                header("location: index.php");
                            }
                        }

                        ?>
                    </div>
                    <div class="mt-5 mb-3 d-flex justify-content-center">
                        <h2 class="pull-left">Liste des chapitres</h2>
                    </div>
                    <a class="btn btn-primary " href="commentManager.php">Commentaires</a>
                        <a href="create.php" class="btn btn-success m-4"><i class="bi bi-plus"></i> Ajouter</a>
                    <?php
                    /* Inclure le fichier config */
                    require_once "config.php";

                    /* select query execution */
                    $sql = "SELECT * FROM articles ORDER BY title ASC ";

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped table-responsive">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>id</th>";
                            echo "<th>title</th>";
                            echo "<th>slug</th>";
                            echo "<th>introduction</th>";
                            echo "<th>content</th>";
                            echo "<th>action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['slug'] . "</td>";
                                echo "<td>" . $row['introduction'] . "</td>";
                                echo "<td>" . $row['content'] . "</td>";
                                echo "<td>";
                                echo '<a href="details.html.php?id=' . $row['id'] . '" class="me-3" ><span class="bi bi-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['id'] . '" class="me-3" ><span class="bi bi-pencil"></span></a>';
                                echo '<a href="index.php?controller=article&task=delete&id=' . $row['id'] . '" ?><span class="bi bi-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            /* Free result set */
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
                        }
                    } else {
                        echo "Oops! Une erreur est survenue";
                    }

                    /* Fermer connection */
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>