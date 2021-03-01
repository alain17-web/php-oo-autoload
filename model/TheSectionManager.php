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
}