<?php
namespace includes;

class Session {

    public static function startSession() {
        session_start();
        $_SESSION['username'] = '';
        $_SESSION['userlevel'] = 0;
    }

    public static function resetSession() {
        session_reset();
        $_SESSION['username'] = '';
        $_SESSION['userlevel'] = 0;
    }

    public static function endSession() {
        session_destroy();
        session_unset();
    }

    public static function setSessionVariable($varname, $value) {
        $_SESSION[$varname] = $value;
    }

    public static function getSessionVariable($varname) {
        return $_SESSION[$varname];
    }

    public static function removeSessionVariable($varname) {
        unset($_SESSION[$varname]);
    }

    public static function isSessionVariableSet($varname) {
        return isset($_SESSION[$varname]);
    }

}

Session::startSession();