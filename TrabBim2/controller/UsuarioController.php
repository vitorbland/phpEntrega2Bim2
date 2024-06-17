<?php
include_once "../dao/ConnectionFactory.php";
include_once "../dao/UsuarioDao.php";
include_once "../model/Usuario.php";

$usuario = new Usuario();
$usuarioDao = new UsuarioDao();


$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    $usuario->setDocumento($d['documento']);
    $usuario->setNome($d['nome']);
    $usuario->setEndereco($d['endereco']);
    

    $usuarioDao->inserir($usuario);
    header("Location: ../usuario.php");
}
else if(isset($_GET['del'])){
    $usuario->setDocumento($_GET['del']);
    $usuarioDao->delete($usuario);
    header("Location: ../usuario.php");
}
?>