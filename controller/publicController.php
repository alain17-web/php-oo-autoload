<?php

// récupération des sections pour le menu
$sectionsForMenu = $TheSectionManager->getAllWithoutTheSectionDesc();

// si on veut voir le détail d'une rubrique et ses articles
if(isset($_GET['section'])&& ctype_digit($_GET['section'])){
    
    // string to int
    $idSection = (int) $_GET['section'];
    
    // récupartion de la section
    $recupSection = $TheSectionManager->getTheSectionById($idSection);
    
    //récupération des news de la section
    $recupTheNews = $TheNewsManager->getAllNewsInTheSection($idSection);
    
    // vérification des codes erreurs du tableau 0=> pas d'erreurs, 1 => warnings, 2 = error 404
    if(array_key_exists(0,$recupSection)){
        
        // transformation du tableau en instance
        $recupSection = $recupSection[0];
        
        // affichage de la vue si pas d'erreurs 404
    echo $twig->render("publicView/section_public.html.twig",["menu"=>$sectionsForMenu,"news"=>$recupTheNews,"detailSection"=>$recupSection]);
            
    }elseif (array_key_exists(2,$recupSection)) {
        // CREATE 404 error
    }
    
    
    exit();
}

// si on veut voir le détail d'une news
if(isset($_GET['page'])){

    $slugNews = htmlspecialchars(strip_tags(trim($_GET['page'])),ENT_QUOTES);
    $recupOneNews = $TheNewsManager->getDetailNews($slugNews);

    // Appel de la vue (objet de type Twig, la méthode render utilise un modèle Twig se trouvant dans view, suivi de paramètres)
    echo $twig->render("publicView/detail_news_public.html.twig",["menu"=>$sectionsForMenu,"news"=>$recupOneNews]);

   exit();
}


// récupération de toutes les news quelque soient leur section ou auteur
$newsForHomepage = $TheNewsManager->getAllHomePage();


// Appel de la vue (objet de type Twig, la méthode render utilise un modèle Twig se trouvant dans view, suivi de paramètres)
echo $twig->render("publicView/index_public.html.twig",["menu"=>$sectionsForMenu,"news"=>$newsForHomepage]);

