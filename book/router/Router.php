<?php 
require('controller/Controller.php');

class Router
{
    private $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function run()
    {
        try {

            // en cas d'action
            if( isset( $_GET['action'] )) {

                // afficher les commentaires
                if( $_GET['action'] == 'showComments') {

                    if( isset($_GET['id'] ) && $_GET['id'] > 0) {
                        $id = $_GET['id'];
                        $this->controller->showComments($id);
                    }

                    else {
                        echo 'C';
                    }
                }
                
                // ajouter un commentaire
                elseif( $_GET['action'] == 'addComment') {

                    if( isset( $_GET['id'] ) && $_GET['id'] > 0) {

                        if( isset( $_POST['comment'] )) {

                            $this->controller->addComment( $_POST['comment'], $_GET['id'] );
                        } 

                        else { 
                            echo 'D'; 
                        }
                    } 

                    else {
                         echo 'E'; 
                    }
                }  

                // message d'accueil à l'utilisateur
                elseif( $_GET['action'] == 'hiUser') {

                    if( isset( $_GET['id'] ) && $_GET['id'] > 0) {

                        if ( isset( $_POST['conf'] )) {

                            $this->controller->hiUser( $_POST['conf'] );
                        }

                        else { 
                            echo 'A'; 
                        }
                    } 

                    else {
                         echo 'B';
                    }
                }
            } 

            else { 
                $this->controller->showChapters(); 
            }
        }

        catch (Exception $e) {
            die('Erreur : ' .$e->getMessage());
        }
    }
}