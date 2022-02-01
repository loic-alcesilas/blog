<h1 style="padding-top: 65px;"><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['introduction'] ?></p>
<hr>
<?= $article['content'] ?>
<a href="index.php?<?= $article['id'] ?>">Retour aux épisodes</a>

<form class="d-flex flex-column align-items-center" action="index.php?controller=comment&task=insert" method="POST">
    <h3 class="pt-3">Vous voulez réagir ?</h3>
    <div class="form-group">
        <div>
            <input class="form-control" type="text" name="author" placeholder="Votre pseudo !"><br>
        </div>
        <div>
        <textarea  class="form-control" name="content" id="" cols="10" rows="5" placeholder="Votre commentaire ..."></textarea><br>
        </div>
        <input type="hidden" name="article_id" value="<?= $article_id ?>">
        <button>Commenter !</button>
    </div>
</form>


<?php if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($commentaires) ?> commentaires </h2>
    <div class="col-md-8 ml-auto mr-auto text-center comment">
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3><span><?= $commentaire['author'] ?></span></h3>
        <small>Le <?= $commentaire['created_at'] ?></small>
        <blockquote>
            <em><?= $commentaire['content'] ?></em>
        </blockquote>
        <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a><br>
        <div class="border-bottom border-secondary m-3"></div>
    <?php endforeach ?>
<?php endif ?>
</div>