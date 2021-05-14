<?
    session_start();
    
    $dominio = '/aulaphp';
    $urlAbs = 'http://'.$_SERVER['HTTP_HOST'].$dominio;

    
    if (!isset($_SESSION['login'])) {
        header('Location:'.$urlAbs);
    }
?>