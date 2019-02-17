<?php 
require_once('model/Manager.php');

class MemberManager extends Manager
{
    // pour envoyer un message à l'utilisateur en cas de connexion
    public function helloUser($id)
    {
        $db = $this->dbConnect();
        $userWelcome = $db->prepare('SELECT * FROM member WHERE pseudo = ?');
        $userWelcome->execute(array($id));
        
        return $userWelcome;
    }
}
       
