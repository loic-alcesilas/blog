<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Un billet simple pour l'alaska - <?= $pageTitle ?></title>
</head>
<body>
<header class="container-fluid pb-1 navbar fixed-top" id="menu">
        <div class="container" style="justify-content: center">     
            <h1 id="brand">Blog de Jean forteroche</h1>
        </div>
</header>
    <div class="presentation">
        <img src="assets/img/aurora.jpg" alt="">
        <div>
            <h1>Un roman écrit par <span>Jean Forteroche</span></h1>
            <p>Un billet simple pour l'alaska ce roman vous fera voyager au plus profond des montagnes</p>
            <input type="button" value="Découvrire" >
        </div>
    </div>
    <?= $pageContent ?>
</body>

</html>