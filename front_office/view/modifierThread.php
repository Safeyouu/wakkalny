<?php
    require '../Controller/sujetC.php';
    require_once '../Model/sujet.php';

    $forumC =  new ForumC();


    if (isset($_POST['user']) && isset($_POST['title']) && isset($_POST['contents'])) {
        $forum = new forum($_POST['user'],$_POST['title'], $_POST['contents']);
         
         $forumC->updateThread($forum,$_POST['ID']);
        header('location:detail.php');
 
      }
    $sujet=$forumC->recupererThread($_POST['ID']);
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <!--NavBar Section-->
        <div class="navbar">
            <nav class="navigation hide" id="navigation">
                <span class="close-icon" id="close-icon" onclick="showIconBar()"><i class="fa fa-close"></i></span>
                <ul class="nav-list">
                    <li class="nav-item"><a href="forums.html">Forums</a></li>
                    <li class="nav-item"><a href="posts.html">Posts</a></li>
                    <li class="nav-item"><a href="detail.html">Detail</a></li>
                    <li class="nav-item"><a href="ajouterThread.php">Ajouter</a></li>

                </ul>
            </nav>
            <a class="bar-icon" id="iconBar" onclick="hideIconBar()"><i class="fa fa-bars"></i></a>
            <div class="brand">My Forum</div>
        </div>
        <!--SearchBox Section-->
        <div class="search-box">
            <div>
                <select name="" id="">
                    <option value="Everything">Everything</option>
                    <option value="Titles">Titles</option>
                    <option value="Descriptions">Descriptions</option>
                </select>
                <input type="text" name="q" placeholder="search ...">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    <div class="container">
        <!--Navigation-->
        <div class="navigate">
        <span><a href="index.html">Le site </a> >> <a href="ajouterThread.php">Ajouter thread</a> >> <a href="detail.php"> Le forum </a></span>
        </div>

        <!--Topic Section-->
        <div class="topic-container">
            <!--Original thread-->
            <div class="head">
                <div class="authors">Author</div>
                <div class="content">Bienvenue dans notre forum !</div>
            </div>
           
            <div class="body">
            <h1>Ajouter un thread</h1>
             <!--Topic Section kent houni -->
    <form action="" method="post" target="_blank">
    <input style="display:none" type="text" name="ID" id="" value="<?php echo $sujet["ID"]; ?>"> 
  <label for="fname">Nom d'utilisateur:</label> <br>
  <input type="text" id="fname" name="user" value="<?php echo $sujet["utilisateur"]; ?>"> <br><br>
  <label for="lname">Titre:</label> <br>
  <input type="text" id="lname" name="title"  value="<?php echo $sujet["titre"]; ?>" ><br><br>
  <label for="Contenu"> Contenu </label> <br>
  <textarea name="contents" rows="10" cols="30"  value="<?php echo $sujet["contenu"]; ?>" ></textarea> <br>
  <input type="submit" value="Submit">
                      <div class="comment">
                    </div>
    </form>
                   
                </div>
               
      
                
            </div>
        </div>
      
        <!--Comment Area-->
        <div class="comment-area hide" id="comment-area">
            <textarea name="comment" id="" placeholder="comment here ... "></textarea>
            <input type="submit" value="submit">
        </div>


        

    </div>
    <footer>
        <span>&copy;  DMAK | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>