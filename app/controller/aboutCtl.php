<?php 
    class AboutCtl{
        public $data;

        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewAbout(){
            $this->RenderView($this->data,'about');
        }
    }
?>