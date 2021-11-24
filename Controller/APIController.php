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
            $this->view->response("Vacio", 204);
        }

    }

    function deleteComment($params = null){
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);
        if ($comment){
            $this->model->dropComment($id);
            $this->view->response("Comentario borrado", 200);
        }else{
            $this->view->response("El comentario con id={$id} no existe", 204);
        }
    }
//consultar a lucho
    function postComment($params = null){
        //chequear que este logeado
        $body = $this->getBody();
        if(!empty($body->id_user) && !empty($body->id_album) && !empty($body->comment) && !empty($body->score)){
            $id = $this->model->newComment($body->id_user,$body->id_album,$body->comment,$body->score);
            if ($id != 0){
                $this->view->response("publicado", 200);
            }else{
                $this->view->response("Error",500);
            }
        }else{
            $this->view->response("Falta llenar campos",400);
        }
        
    }

    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }


}
