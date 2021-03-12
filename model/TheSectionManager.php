<?php


class TheSectionManager extends ManagerAbstract implements ManagerInterface
{

    // récupération de tous les champs de toutes les sections
    public function getAll(): array
    {
        $sql="SELECT * FROM TheSection";
        $recup = $this->db->query($sql);
        if(!$recup->rowCount()){
            return [];
        }
        $array = $recup->fetchAll(PDO::FETCH_ASSOC);
        // instanciations des résultats en objets de type TheSection
        foreach ($array as $item){
            $sections[]= new TheSection($item);
        }
        return $sections;
    }

    // récupération du titre et de l'id de toutes les sections (menu + choix dans formulaires) en classant par nom de section ascendant
    public function getAllWithoutTheSectionDesc(): array
    {
        $sql="SELECT idtheSection, theSectionName FROM TheSection ORDER BY theSectionName ASC";
        $recup = $this->db->query($sql);
        if(!$recup->rowCount()){
            return [];
        }
        $array = $recup->fetchAll(PDO::FETCH_ASSOC);
        // instanciations des résultats en objets de type TheSection
        foreach ($array as $item){
            $sections[]= new TheSection($item);
        }
        return $sections;
    }

    // récupération de tous les champs d'une section par son id
    public function getTheSectionById(int $id): array
    {
        // SQL
        $sql = "SELECT * FROM TheSection WHERE `idtheSection`=?";
        // prepare this request
        $request = $this->db->prepare($sql);
        
        // essais erreur
        try{
            // exécution de la requête préparée
            $request->execute([$id]);
            
            // si on a un résultat
            if($request->rowCount()){
                // instanciation de la réponse SQL en objet de type TheSection
                $instanceTheSection = new TheSection($request->fetch(PDO::FETCH_ASSOC));
                
                // envoi du tableau contant notre objet TheSection, la clef 0 signifie pas d'erreurs 0 => TheSection
                return[0=>$instanceTheSection];
            }else{
                // envoi un tableau avec la clef 2 => string => signifie erreur 404
                return [2=>"Cette section n'existe pas"];
            }
        } catch (PDOException $ex) {
            // envoi un tableau avec la clef 2 => string > signifie erreur 404
            return [2=>$ex->getMessage()];
        }
        
    }
}