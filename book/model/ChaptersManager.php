<?php 
require_once('model/Manager.php');

class ChaptersManager extends Manager
{
    // pour afficher tous les chapitres
    public function getChapters() 
    {
        $db = $this->dbConnect();
        $allChapters = $db->query('SELECT * FROM chapter'); 

        return $allChapters;
    }

    // pour afficher un seul chapitre
    public function getChapter($id)
    {
        $db = $this->dbConnect();
        $oneChapter = $db->prepare('SELECT * FROM chapter WHERE id = ?');
        $oneChapter->execute(array($id)); // action sur chapter view
        $getOne = $oneChapter->fetch();

        return $getOne;
    }
}