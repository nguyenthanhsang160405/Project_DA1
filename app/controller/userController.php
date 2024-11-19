<?php
    class userController{
        function view($view){
            $view = 'app/view/'.$view.'.php';
            require_once $view;
        }
        function footer(){
            $this->view('footer');
        }
    }
?>