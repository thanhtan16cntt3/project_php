<?php
class Controller
{

    public function View($viewname, $data = [])
    {
        require_once './MVC/Views/' . $viewname . '.php';
    }

    public function Model($modelname)
    {
        require_once './MVC/Models/' . $modelname . '.php';
        return new $modelname;
    }

    public function setSession($key, $value)
    {
        if (!empty($key) && !empty($value)) {
            $_SESSION[$key] = $value;
        }
    }

    public function getSession($key)
    {
        if (!empty($key)) {
            return $_SESSION[$key];
        }
    }

    public function unsetSession($key)
    {
        if (!empty($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function destroySession()
    {
        session_destroy();
    }

    public function setFlash($key, $msg)
    {
        if (!empty($key) && !empty($msg)) {
            $_SESSION[$key] = $msg;
        }
    }

    public function flash($key, $className)
    {
        if (!empty($key) && !empty($className) && isset($_SESSION[$key])) {
            $msg = $_SESSION[$key];
            echo "<div class='" . $className . "'>" . $msg . "</div>";
            unset($_SESSION[$key]);
        }
    }

    public function redirect($path)
    {
        header("location: ../../Project_web_admin/" . $path);
    }

}
