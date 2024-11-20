<?php 
    class AlikeCtl{
        public $data;
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewAlike(){
            $this->RenderView($this->data,'alike');
        }
    }
?>