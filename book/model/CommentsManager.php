<?php 
require_once('model/Manager.php');

class CommentsManager extends Manager
{
    // pour voir tous les commentaires
    public function seeComments($id_chapter)
    {
        $db = $this->dbConnect();
        $allComments = $db->prepare('SELECT * FROM comment WHERE id_chapter = ?');
        $allComments->execute(array($id_chapter));

        return $allComments;
    }

    // pour ajouter un commentaire
    public function putComment($content, $id_chapter) 
    {
        echo($id_chapter);
        $db = $this->dbConnect();
        $oneComment = $db->prepare('INSERT INTO comment(content, id_chapter, id_member, creation_date) VALUES(?, ?, ?, NOW())'); 
        
        $addComment = $oneComment->execute(array(
            $content,
            $id_chapter,
            1
        ));

        return $addComment;

        /*
        $addC = $add->fetchAll();
        $add->closeCursor();
        return $addC; 
        var_dump($addC);
        */
    }
}
