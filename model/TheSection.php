<?php


class TheSection extends MappingTableAbstract
{
    protected int $idtheSection;
    protected string $theSectionName;
    protected string $theSectionDesc;

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    /**
     * Get the value of idtheSection
     */ 
    public function getIdtheSection()
    {
        return $this->idtheSection;
    }

    /**
     * Set the value of idtheSection
     *
     * @return  self
     */ 
    public function setIdtheSection(int $idtheSection): void
    {
        $idtheSection = (int) $idtheSection;
        if(empty($idtheSection)){
            trigger_error("L'id section ne peut être 0",E_USER_NOTICE);
        }
        else{
            $this->idtheSection = $idtheSection;
        }
    }

    /**
     * Get the value of theSectionName
     */ 
    public function getTheSectionName()
    {
        return $this->theSectionName;
    }

    /**
     * Set the value of theSectionName
     *
     * @return  self
     */ 
    public function setTheSectionName(string $theSectionName): void
    {
        $theSectionName = strip_tags(trim($theSectionName));
        if(empty($theSectionName)){
            trigger_error("Le nom de la section ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theSectionName)>100){
            trigger_error("Le nom de la section ne peut dépasser 100 caractères",E_USER_NOTICE);
        }
        else{
            $this->theSectionName = $theSectionName;
        }
    }

    /**
     * Get the value of theSectionDesc
     */ 
    public function getTheSectionDesc()
    {
        return $this->theSectionDesc;
    }

    /**
     * Set the value of theSectionDesc
     *
     * @return  self
     */ 
    public function setTheSectionDesc(string $theSectionDesc): void
    {
        $theSectionDesc = strip_tags(trim($theSectionDesc));
        if(empty($theSectionDesc)){
            trigger_error("La description ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theSectionDesc)>800){
            trigger_error("La description ne peut dépasser 800 caractères",E_USER_NOTICE);
        }
        else{
            $this->theSectionDesc = $theSectionDesc;
        }
    }
}