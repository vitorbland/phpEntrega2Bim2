<?php
include_once "../dao/ConnectionFactory.php";
include_once "../dao/CarroDao.php";
include_once "../model/Carro.php";

$carro = new Carro();
$carroDao = new CarroDao();


$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    $carro->setPlaca($d['placa']);
    $carro->setFabricante($d['fabricante']);
    $carro->setModelo($d['modelo']);
    $carro->setCor($d['cor']);
    $carro->setAno($d['ano']);
    

    $carroDao->inserir($carro);
    header("Location: ../CarroForm.php");
}
else if(isset($_GET['del'])){
    $carro->setPlaca($_GET['del']);
    $carroDao->delete($carro);
    header("Location: ../CarroForm.php");
}
?>