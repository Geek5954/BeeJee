<?php 
abstract class Core{

    protected $m;
    public function __construct()
     {
    	$this->m=new model();
     }
    public function adm($vt,$text,$num)
     {
        $result=$this->m->get_adm($vt,$text,$num);
     }
       public function get_content()
    {
        $result=$this->m->get_tasks();
        return $result;
    }
       public function get_login($user,$password)
     {
        $result=$this->m->get_log($user,$password);
     }
    public function get_body($tpl)
     {
        $tasks=$this->get_content();
        include 'tpl/index.php';
     }
}


?>