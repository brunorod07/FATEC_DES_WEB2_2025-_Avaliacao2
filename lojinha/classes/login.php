<?php
session_start();

/**
 * Classe responsável por gerenciar o login do usuário.
 */
class Login {
    private $name = 'admin'; 
    private $password = 'admin'; 

    public function verificar_credenciais($name, $password) { 
        if ($name == $this->name && $password == $this->password) {
            $_SESSION["logged_in"] = TRUE;
            return TRUE;
        }
        return FALSE;
    }

    public function verificar_logado() { 
        if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== TRUE) {
            $this->logout();
        }
        return TRUE;
    }

    public function logout() { 
        session_destroy();
        header("Location: index.php");
        exit();
    } 
}
?>
