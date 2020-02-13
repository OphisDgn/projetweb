<?php 
if(!isset($_GET['idi']) OR !is_numeric($_GET['id']))
    header('Location: index.php');
else {
    extract($_GET);
    $id = strip_tags($id);
    
    require_once('config/functions.php');
    
    if(!empty($_POST)) {
        extract($_POST);
        $errors = array();
        
        $author = strip_tags($author);
        $comment = strip_tags($comment);
        if (empty($author))
            array_psuh($errors, 'Entrez un pseudo');
        if(empty($comment))
            array_push($errors, 'Entrez un commentaire');
        if(count($errors) == 0) {
            $comment = addComment($id, $author, $comment);
            $success = 'Votre commentaire a été publié';
            unset($author);
            unset($comment);
        }
    }
    
    $article = getArticle($id);
    $comments = getComments($id);
}
?>

<!DOCYTPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $article->title ?></title>
    <link rel="stylesheet" href="article.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>
    <!-- Navigation -->
<header class="header">
  <a href="index.html" class="logo"><img src="image/logo.png" style="height: 45px"></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="about.html" style="color: black">A propos</a></li>
    <li><a href="blog.php" style="color: black">Mon blog</a></li>
    <li><a href="showcase.html" style="color: black">Projets</a></li>
    <li><a href="contact.html" style="color: black">Contact</a></li>
  </ul>
</header>
    <div class="contenuArt">
        <a href="blog.php" class="btn btn-back">Retour aux articles</a>
        <h1 id="title"><?= $article->title ?></h1>
        <time id="time"><?= $article->date ?></time>
        <p id="content"><?= $article->content ?></p>
        <hr />
    </div>
    <?php 
    if(isset($success))
        echo $success;
        
    if(!empty($errors)):?>
        <?php foreach($errors as $error): ?>
        <p><?= $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
        
    <form action="article.php?id=<? $artcile->id ?>" methode="post" class="form-control">
        <p>
            <label for="author">Pseudo :</label>
            <input type="text" class="form-control" name="author" id="author" value="<?php if(isset($author)) echo $author ?>">
        </p>
        <p>
            <label for="comments">Commentaires :</label><br/>
            <textarea class="form-control" name="comment" id="comment" rows="8" cols="30"><?php if(isset($comment)) echo $comment ?></textarea>
        </p>
        <button type="submit" class="btn btn-sub">Envoyer</button>
    </form>
    
    <h2>Commentaires :</h2>
    
    <?php foreach($comments as $com): ?>
        <h3><?= $com->author ?></h3>
        <time><?= $com->date ?></time>
        <p><?= $com->comment ?></p>
    <?php endforeach; ?>
    
    
       <!-- partie media icons-->
<footer id="footer">
    <img src="image/logo.png" id="logofooter">
    <div id="socialmedia" style="height: 20px">
        <h4>Mes réseaux sociaux</h4>
        <div id="liens">
            <a href="https://www.linkedin.com/in/c%C3%A9line-lieutaud-b7804b171/" id="link-link"><img src="image/icons8-linkedin-48.png" id="linkedin"></a>
            <a href="https://www.linkedin.com/in/c%C3%A9line-lieutaud-b7804b171/" id="link-twit"><img src="image/icons8-twitter-squared-48.png" id="twitter"></a>
            <a href="https://www.instagram.com/ltd.celine/" id="link-insta"><img src="image/icons8-instagram-48.png" id="instagram"></a>
            <a href="https://www.facebook.com/celine.lieutaud" id="link-face"><img src="image/icons8-facebook-old-48.png" id="facebook"></a>
            <a href="https://github.com/OphisDgn" id="link-git"><img src="image/icons8-github-64.png" id="github"></a>
        </div>
    </div>
    <div id="coordonnes">
        <h4>Mes coordonnées :</h4>
        <h6>Email : celine.lieutaud@ynov.com</h6>
    </div>
</footer>
</body>
</html>