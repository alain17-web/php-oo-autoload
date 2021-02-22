<?php


class TheNews extends MappingTableAbstract
{

    protected int $idtheNews;
    protected string $theNewsTitle;
    protected string $theNewsSlug;
    protected string $theNewsText;
    protected string $theNewsDate;
    protected int $theUserIdtheUser;


    public function __construct(array $tab)
    {

        $this->hydrate($tab);
    }

    /**
     * @return int
     */
    public function getIdtheNews(): int
    {
        return $this->idtheNews;
    }

    /**
     * @param int $idtheNews
     */
    public function setIdtheNews(int $idtheNews): void
    {
        $idtheNews = (int) $idtheNews;
        if(empty($idtheNews)){
            trigger_error("Votre id ne peut pas être 0!",E_USER_NOTICE);
        }
        else{
            $this->idtheNews = $idtheNews;
        }
        
    }

    /**
     * @return string
     */
    public function getTheNewsTitle(): string
    {
        return $this->theNewsTitle;
    }

    /**
     * @param string $theNewsTitle
     */
    public function setTheNewsTitle(string $theNewsTitle): void
    {
        $theNewsTitle = strip_tags(trim($theNewsTitle));
        if(empty($theNewsTitle)){
            trigger_error("Votre titre ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theNewsTitle)>180){
            trigger_error("Votre titre ne peut dépasser les 180 caractères",E_USER_NOTICE);
        }
        else{
            $this->theNewsTitle = $theNewsTitle;
        }
        
    }

    /**
     * Get the value of theNewsSlug
     */ 
    public function getTheNewsSlug()
    {
        return $this->theNewsSlug;
    }

    /**
     * Set the value of theNewsSlug
     *
     * @return  self
     */ 
    public function setTheNewsSlug(string $theNewsSlug): void
    {
        $theNewsSlug = strip_tags(trim($theNewsSlug));
        if(empty($theNewsSlug)){
            trigger_error("Votre slug ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theNewsSlug)>180){
            trigger_error("Le slug ne peut dépasser 180 caractères",E_USER_NOTICE);
        }
        else{
            $this->theNewsSlug = $theNewsSlug;
        }
    }


    /**
     * Get the value of theNewsText
     */ 
    public function getTheNewsText()
    {
        return $this->theNewsText;
    }

    /**
     * Set the value of theNewsText
     *
     * @return  self
     */ 
    public function setTheNewsText(string $theNewsText): void
    {
        $theNewsText = strip_tags(trim($theNewsText));
        if(empty($theNewsText)){
            trigger_error("Votre texte ne peut être vide",E_USER_NOTICE);
        }
        else{
            $this->theNewsText = $theNewsText;
        }
    }

    /**
     * Get the value of theNewsDate
     */ 
    public function getTheNewsDate()
    {
        return $this->theNewsDate;
    }

    /**
     * Set the value of theNewsDate
     *
     * @return  self
     */ 
    public function setTheNewsDate(string $theNewsDate): void
    {
        $regex = preg_grep("/^(\d{4})-(\d{2})-([\d]{2}) (\d{2}):([0-5]{1})([0-9]{1}):([0-5]{1})([0-9]{1})$/",[$theNewsDate]);
        if(empty($regex)){
            trigger_error("Format de date non valide",E_USER_NOTICE);
        }
        else{
            $this->theNewsDate = $theNewsDate;
        }
        

        
    }

    /**
     * Get the value of theUseridtheUser
     */ 
    public function getTheUserIdtheUser()
    {
        return $this->theUseridtheUser;
    }

    /**
     * Set the value of theUseridtheUser
     *
     * @return  self
     */ 
    public function setTheUseridtheUser(int $theUserIdtheUser):void
    {
        $theUserIdtheUser = (int) $theUserIdtheUser;
        if(empty($theUserIdtheUser)){
            trigger_error("L'id de l'utilisateur ne peut pas être 0!",E_USER_NOTICE);
        }
        else{
            $this->theUserIdtheUser = $theUserIdtheUser;
        }
    }

    

    
}