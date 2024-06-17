<?php
class UsuarioDao{

    public function inserir(Carro $carro){
        try{
            $sql = "insert into carro (placa, fabricante, modelo, cor, ano, valor) values 
                    (:placa, :fabricante, :modelo, :cor, :ano, :valor);";
            $con_sql = ConnectionFactory::getConnection()->prepare($sql);
            $con_sql->bindValue(":placa", $carro->getPlaca());
            $con_sql->bindValue(":fabricante", $fabricante->getFabricante());
            $con_sql->bindValue(":modelo", $carro->getModelo());
            $con_sql->bindValue(":cor", $carro->getCor());
            $con_sql->bindValue(":ano", $carro->getAno());
            $con_sql->bindValue(":valor", $carro->getValor());
            return $con_sql->execute();
        }catch(Exception $e){
            print "<p>Erro ao inserir Carro </p> <p> $e </p>";
        }
    }

    public function read(){
        try{
            $sql = "SELECT * FROM carro";
            $result = ConnectionFactory::getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach($lista as $l){
                $carro_lista[] = $this->listaCarro($l);
            }
            return $carro_lista;
        }catch(Exception $e){
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
        
    }

    public function listaCarro($row){
        $carro = new Carro;
        $carro->setPlaca($row['placa']);
        $fabricante->setFabricante($row['fabricante']);
        $carro->setModelo($row['modelo']);
        $carro->setCor($row['cor']);
        $carro->setAno($row['ano']);
        $carro->setValor($row['valor']);

        return $carro;
    }

    public function delete(Carro $carro) {
        try {
            $sql = "DELETE FROM carro WHERE placa = :placa";
            $p_sql = ConnectionFactory::getConnection()->prepare($sql);
            $p_sql->bindValue(":placa", $carro->getPlaca());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir Carro<br> $e <br>";
        }
    }
}
?>