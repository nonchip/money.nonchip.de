<?php
namespace App;

class Controller extends \n\c\Controller{
    var $isProtected=true;
    var $title="";
    public function preDispatch($ctrl,$act){
        $res=$this->checkAuth();
        if($this->isProtected && $res!==true){
            die($res[1]);
        }

        $this->tpl=$this->template('global');
        $this->cont=$this->template('c'.ucfirst($ctrl).'/a'.ucfirst($act));
    }

    public function postDispatch(){
        $this->tpl->assign('header',$this->title);
        $this->tpl->assign('content',$this->cont);
        $this->tpl->assign('staticmenu',$this->template('menu'));
        $this->tpl->assign('usermenublock',$this->widget('userMenuBlock'));
        echo $this->tpl->render();
    }

    protected function checkAuth(){
        if(!is_array($_SESSION)) return array(false,"Session Error");
        if(!array_key_exists('auth',$_SESSION)) return array(false,"Auth session missing");
        if(!$_SESSION['auth']['valid']) return array(false,"invalid auth session");
        $_SESSION['auth']['userObj']=unserialize($_SESSION['auth']['userSer']);
        $this->userObj=$_SESSION['auth']['userObj'];
        return true;
    }
}
