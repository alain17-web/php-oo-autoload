<?php


class TheUser extends MappingTableAbstract
{
    protected int $idtheUser;
    protected string $theUserLogin;
    protected string $theUserPwd;
    protected string $theUserMail;
    protected int $theRoleIdtheRole;

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    /**
     * Get the value of idtheUser
     */ 
    public function getIdtheUser()
    {
        return $this->idtheUser;
    }

    /**
     * Set the value of idtheUser
     *
     * @return  self
     */ 
    public function setIdtheUser(int $idtheUser): void
    {
        $idtheUser = (int) $idtheUser;
        if(empty($idtheUser)){
            trigger_error("L'id de l'utilisateur ne peut être 0",E_USER_NOTICE);
        }
        else{
            $this->idtheUser = $idtheUser;
        }
    }

    /**
     * Get the value of theUserLogin
     */ 
    public function getTheUserLogin()
    {
        return $this->theUserLogin;
    }

    /**
     * Set the value of theUserLogin
     *
     * @return  self
     */ 
    public function setTheUserLogin(string $theUserLogin): void
    {
        $theUserLogin = strip_tags(trim($theUserLogin));
        if(empty($theUserLogin)){
            trigger_error("Le login ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theUserLogin)>80){
            trigger_error("Le login ne peut dépasser 80 caractères",E_USER_NOTICE);
        }
        else{
            $this->theUserLogin = $theUserLogin;
        }
    }

    /**
     * Get the value of theUserPwd
     */ 
    public function getTheUserPwd()
    {
        return $this->theUserPwd;
    }

    /**
     * Set the value of theUserPwd
     *
     * @return  self
     */ 
    public function setTheUserPwd(string $theUserPwd): void
    {
        $theUserPwd = strip_tags(trim($theUserPwd));
        if(empty($theUserPwd)){
            trigger_error("Le mot de passe ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theUserPwd)>255){
            trigger_error("Le mot de passe ne peut dépasser 255",E_USER_NOTICE);
        }
        else{
            $this->theUserPwd = $theUserPwd;
        }
    }

    /**
     * Get the value of theUserMail
     */ 
    public function getTheUserMail()
    {
        return $this->theUserMail;
    }

    /**
     * Set the value of theUserMail
     *
     * @return  self
     */ 
    public function setTheUserMail($theUserMail): void
    {
        $theUserMail = filter_var($theUserMail,FILTER_VALIDATE_EMAIL);
        if(empty($theUserMail)){
            trigger_error("L'adresse mail est requise",E_USER_NOTICE);
        }
        else{
            $this->theUserMail = $theUserMail;
        }
    }

    /**
     * Get the value of theRoleIdtheRole
     */ 
    public function getTheRoleIdtheRole()
    {
        return $this->theRoleIdtheRole;
    }

    /**
     * Set the value of theRoleIdtheRole
     *
     * @return  self
     */ 
    public function setTheRoleIdtheRole(int $theRoleIdtheRole): void
    {
        $theRoleIdtheRole = (int) $theRoleIdtheRole;
        if(empty($theRoleIdtheRole)){
            trigger_error("Ce champ ne peut être vide",E_USER_NOTICE);
        }
        else{
            $this->theRoleIdtheRole = $theRoleIdtheRole;
        }
    }
}