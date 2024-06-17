<?php
class UsuarioDao{

    public function inserir(Usuario $usuario){
        try{
            $sql = "insert into usuario (documento, nome, endereco) values 
                    (:nome, :endereco, :documento);";
            $con_sql = ConnectionFactory::getConnection()->prepare($sql);
            $con_sql->bindValue(":documento", $usuario->getDocumento());
            $con_sql->bindValue(":nome", $usuario->getNome());
            $con_sql->bindValue(":endereco", $usuario->getEndereco());
            return $con_sql->execute();
        }catch(Exception $e){
            print "<p>Erro ao inserir Usuario </p> <p> $e </p>";
        }
    }

    public function read(){
        try{
            $sql = "SELECT * FROM usuario";
            $result = ConnectionFactory::getConnection()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach($lista as $l){
                $usuario_lista[] = $this->listaUsuario($l);
            }
            return $usuario_lista;
        }catch(Exception $e){
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
        
    }

    public function listaUsuario($row){
        $usuario = new Usuario;
        $usuario->setDocumento($row['documento']);
        $usuario->setNome($row['nome']);
        $usuario->setEndereco($row['endereco']);
        

        return $usuario;
    }

    public function delete(Usuario $usuario) {
        try {
            $sql = "DELETE FROM usuario WHERE documento = :documento";
            $p_sql = ConnectionFactory::getConnection()->prepare($sql);
            $p_sql->bindValue(":documento", $usuario->getDocumento());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir Usuario<br> $e <br>";
        }
    }
}
?>