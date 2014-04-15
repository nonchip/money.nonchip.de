<?php

namespace App\widgets;

class UserMenuBlock implements \n\i\Widget{
    public function __construct(){
        global $DB;
        if(is_array($_SESSION)
        && array_key_exists('auth',$_SESSION)
        && is_array($_SESSION['auth'])
        && $_SESSION['auth']['valid']===true){
            $this->user=$_SESSION['auth']['userObj'];
            $this->tpl=new \n\c\Template('widgets/userMenuBlock/valid');
            $this->tpl->assign('user',$this->user);
            $sum=0;
            $result=$DB->select('SELECT SUM(balance) AS s FROM accounts WHERE user=?',array($this->user->id),array("%d"));
            if($result && count($result)>0)
                $sum=$result[0]->s;
            $this->tpl->assign('balanceSum',$sum);
        }else{
            $this->user=false;
            $this->tpl=new \n\c\Template('widgets/userMenuBlock/invalid');
        }
    }

    public function render(){
        return $this->tpl->render();
    }
}