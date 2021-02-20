<?php


class TheRole extends MappingTableAbstract
{
    protected int $idTheRole;
    protected string $theRoleName;
    protected int $theRoleValue;

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    /**
     * Get the value of idTheRole
     */ 
    public function getIdTheRole()
    {
        return $this->idTheRole;
    }

    /**
     * Set the value of idTheRole
     *
     * @return  self
     */ 
    public function setIdTheRole(int $idTheRole): void
    {
        $idTheRole = (int) $idTheRole;
        if(empty($idTheRole)){
            trigger_error("L'id du rôle ne peut être 0!",E_USER_NOTICE);
        }
        else{
            $this->idTheRole = $idTheRole;
        }
    }

    /**
     * Get the value of theRoleName
     */ 
    public function getTheRoleName()
    {
        return $this->theRoleName;
    }

    /**
     * Set the value of theRoleName
     *
     * @return  self
     */ 
    public function setTheRoleName(string $theRoleName): void
    {
        $theRoleName = strip_tags(trim($theRoleName));
        if(empty($theRoleName)){
            trigger_error("Le rôle doit avoir un nom",E_USER_NOTICE);
        }
        elseif(strlen($theRoleName)>45){
            trigger_error("Le nom du rôle ne peut dépasser 45 caractères",E_USER_NOTICE);
        }
        else{
            $this->theRoleName = $theRoleName;
        }
    }

    /**
     * Get the value of theRoleValue
     */ 
    public function getTheRoleValue()
    {
        return $this->theRoleValue;
    }

    /**
     * Set the value of theRoleValue
     *
     * @return  self
     */ 
    public function setTheRoleValue(int $theRoleValue): void
    {
        $theRoleValue = (int) $theRoleValue;
        if(empty($theRoleValue)){
            trigger_error("La valeur du rôle ne peut être vide",E_USER_NOTICE);
        }
        elseif($theRoleValue < 0 || $theRoleValue > 2){
            trigger_error("La valeur du rôle doit être comprise entre 0 et 2",E_USER_NOTICE);
        }
        else{
            $this->theRoleValue = $theRoleValue;
        }
    }
}