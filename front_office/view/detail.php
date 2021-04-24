<?php 

    include "../Controller/sujetC.php";

    $sujetC = new  forumC();

    $listeU = $sujetC->afficherThreads();

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
            <?php
            foreach ($listeU as $forum) {
            ?>
            <div class="body">
                <div class="authors">
                    <div class="username"><a href=""><?php echo $forum['utilisateur']; ?></a></div>
                    

                 <div>     <?php echo $forum['date']; ?> </div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                   
                </div>
               
      
                <div class="content">
                <?php echo $forum['titre']; ?>
                    <br>
                    <br><br>
                    <?php echo $forum['contenu']; ?>
                    <br>
                     <div class="comment">
                        <form action="supprimerThread.php" method="post">
                         <button>  Supprimer </button>  
                        <input type="hidden" name="ID" value="<?php echo $forum['ID'] ?>">
                        </form>
                        <form action="modifierThread.php" method="post">
                         <button>  Modifier </button>  
                        <input type="hidden" name="ID" value="<?php echo $forum['ID'] ?>">
                        </form>
                    </div>  
                    
                    
                    



            </div>
        </div>
        <?php }
                    ?>
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