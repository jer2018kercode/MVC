<?php 
require_once('model/ChaptersManager.php');
require_once('model/CommentsManager.php');
require_once('model/MemberManager.php');

class Controller
{
    private $chaptersManager;
    private $commentsManager;
    private $memberManager;
    
    public function __construct()
    {
        $this->chaptersManager = new ChaptersManager();
        $this->commentsManager = new CommentsManager();
        $this->memberManager = new MemberManager();
    }

    // afficher les chapitres
    public function showChapters() 
    {
        $showChapters = $this->chaptersManager->getChapters();

        require('view/chaptersView.php');
    }
    
    //afficher les commentaires
    public function showComments($id) 
    {
        $oneChap = $this->chaptersManager->getChapter($id);
        $allComs = $this->commentsManager->seeComments($id);

        require('view/commentsView.php');
    }

    // message d'accueil à la connexion
    public function hiUser($id) 
    {
        $userMessage = $this->memberManager->helloUser($id);

        require('view/memberView.php');
    }

    // ajouter un commentaire
    public function addComment($content, $id_chapter)
    {
        $comment = $this->commentsManager->putComment($content, $id_chapter);

        /* if ($comment === false) {
            die('OK');
            
        } else { header('Location: index.php?action=addComment&id=' . $id_chapter); } */
    }
}