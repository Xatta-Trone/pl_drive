<?php 

/**
* Session
*/
class Session{


	public static function init(){
      if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
                ob_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                ob_start();
            }
        }
     }

     public static function set($key,$value){
     	$_SESSION[$key] = $value;
     }

     public static function get($key){
     	if (isset($_SESSION[$key])) {
     		return $_SESSION[$key];
     	}else{
     		return false;
     	}
     }

     public static function chkAdminSession(){
     	self::init();
     	if (self::get("isAdmin")== false) {
     		self::destroy();
     		header("Location: login.php");
     	}
     }

     public static function chkLogin(){
        self::init();
        if (self::get("isAdmin")== true) {
            header("Location:index.php");
        }
     }
     public static function chkUserLogin(){
     	self::init();
	    if (self::get("isLoggedIn")!== true) {
	    	header("Location:login.php");
	    }
     }

    public static function destroy(){
      session_destroy();
      header("Location:login.php");
     }

	
	
}//end of class


?>