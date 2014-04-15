<?php
namespace App\pages;

class Auth extends \App\Controller{
    var $isProtected=false;
    var $title="Auth";
    public function doLogout(){
        $_SESSION['auth']=null;
        session_destroy();
        session_start();
        header('Location: /');
    }
    public function doRegisterForm(){
        $this->title="Register";
    }
    public function doLoginForm(){
        $this->title="Login";
    }

    public function doRegisterSubmit(){
        die("no registration in alpha stage");
        self::register($_POST['username'],$_POST['password']);
        return $this->doLoginSubmit();
    }

    public function doLoginSubmit(){
        $this->title="Login";

        $checkResult=self::checkLogin($_POST['username'],$_POST['password']);

        if($checkResult){
            return $this->loginSuccess($checkResult);
        }else{
            return $this->loginFail();
        }
    }

    private function loginSuccess($user){
        $this->title="Login successful!";
        $_SESSION['auth']=array('valid'=>true,'userSer'=>serialize($user),'userObj'=>$user);
    }

    private function loginFail(){
        $this->title="Login failed";
    }

    private static function register($user,$pw){
        global $DB;
        $salt=self::salt($pw);
        $hash=self::hash($pw,$salt);
        $DB->insert('users', array('username'=>$user,'pwhash'=>$hash,'pwsalt'=>$salt), array('%s','%s','%s'));
    }

    private static function checkLogin($user,$pw){
        global $DB;
        $result=$DB->select('SELECT * FROM users WHERE username = ? LIMIT 1', array($user), array('%s'));
        if(count($result)<1) return false; // wrong username
        $result=$result[0]; // only get one anyway...

        if(self::checkHash($pw,$result->pwsalt,$result->pwhash)){
            return $result;
        }else{
            return false; // wrong password
        }
    }

    private static function checkHash($pw,$salt,$hash){
        return self::hash($pw,$salt)===$hash;
    }

    private static function hash($pw,$salt){
        return hash('sha512', $pw.$salt);
    }

    private static function salt($pw){
        return hash('sha512', $pw.microtime()).hash('sha512', uniqid('Pfeffer ',true)).hash('sha512',implode(',',$_SERVER));
    }
}