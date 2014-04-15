<?php
namespace App\pages;

class Account extends \App\Controller{
    var $isProtected=true;
    var $title="Account";

    public function doIndex(){
        global $DB;
        $uid=$this->userObj->id;
        $result=$DB->select('SELECT id,shortname,balance FROM accounts WHERE user = ?', array($uid), array('%d'));
        $this->cont->assign('accounts',$result);
    }

    public function doEditForm($c,$a,$id){
        $uid=$this->userObj->id;
        if($id>0){
            $data=self::getAccountData($id);
            if($data->user==$uid){
                $this->cont->assign('account',$data);
                $this->cont->assign('id',$id);
            }else{
                $this->cont->assign('account',null);
                $this->cont->assign('id',0);
            }
        }else{
            $this->cont->assign('account',null);
            $this->cont->assign('id',0);
        }
    }

    public function doEditSubmit($c,$a,$id){
        global $DB;
        $uid=$this->userObj->id;
        if($id>0){
            $data=self::getAccountData($id);
            if($data->user==$uid){
                $DB->update('accounts',
                    array(
                        'user'=>$uid,
                        'shortname'=>$_POST['shortname'],
                        'longdesc'=>$_POST['longdesc'],
                        'balance'=>$_POST['balance']
                    ),
                    array('%d','%s','%s','%d'),
                    array('id'=>$id),
                    array('%d')
                );
            }
        }else{
            $DB->insert('accounts',
                array(
                    'user'=>$uid,
                    'shortname'=>$_POST['shortname'],
                    'longdesc'=>$_POST['longdesc'],
                    'balance'=>$_POST['balance']
                ),
                array('%d','%s','%s','%d')
            );
        }
        header('Location: /account');
    }

    private static function getAccountData($id){
        global $DB;
        $result=$DB->select('SELECT * FROM accounts WHERE id = ? LIMIT 1', array($id), array('%d'));
        if($result && count($result)>0){
            return $result[0];
        }else{
            return null;
        }
    }
}