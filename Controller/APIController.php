<?php
require_once "./Model/CommentModel.php";
require_once "./View/ApiView.php";

class CommentApiController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new CommentModel();
        $this->view = new ApiView();
    }

    function getComments($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getComments($id);
        if ($comments){
            $this->view->response($comments, 200);
        }else{
            $this->view->response("Error", 404);
        }
    }

    function deleteComment($params = null){
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);

        if ($comment){
            $this->model->dropComment($id);
            $this->view->response("Comentario borrado", 200);
        }else{
            $this->view->response("El comentario con id={$id} no existe", 404);
        }
    }
//consultar a lucho
    function addComment(){
        //chequear que este logeado
        $id_user = $_SESSION['id'];
        $id_album = "nose";
        $comment = $_POST['comment'];
        $score = $_POST['score'];

        $this->model->newComment($id_user,$id_album,$comment,$score);
    }
}
