<header class="container-fluid pb-1 navbar fixed-top" id="menu">
    <div class="container" style="justify-content: center">
        <h1 id="brand">Blog de Jean forteroche</h1>
    </div>
</header>
<div class="presentation">
    <img src="assets/img/imgfond.jpg" alt="">
    <div>
        <h1>Un roman écrit par <span>Jean Forteroche</span></h1>
        <p>Un billet simple pour l'alaska ce roman vous fera voyager au plus profond des montagnes</p>
        <input type="button" value="Découvrire">
    </div>
</div>

<div class="col-md-8 ml-auto mr-auto text-center allarticle">
    <h2 id="title">Nos episodes :</h2>

    <?php foreach ($articles as $article) : ?>
        <h2><?= $article['title'] ?></h2>
        <small>Ecrit le <?= $article['created_at'] ?></small>
        <p><?= $article['introduction'] ?></p>
        <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
        <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
        <div class="border-bottom border-secondary m-3"></div>
    <?php endforeach ?>
</div>