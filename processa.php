<?php

    class DataBase{

        private $pdo;

        public function __construct($dbname,$host,$user,$senha)
        {
            try{
                $this->pdo = new PDO("mysql:dbname".$dbname.";host".$host,$user,$senha);
            }
            catch(Exception $e)
            {
                echo "Erro com banco de dados: ".$e->getMessage();
            }
            catch(Exception $e)
            {
                echo "Erro generico: ".$e->getMessage();
            }
            
        }

        public function selectDataBase()
        {
            
        }

        public function InsertDataBase($nome,$telefone,$email){
            $cmd = $this->pdo->prepare("SELECT idPerfil from perfil WHERE =:e");
            $cmd -> bindValue(":e",$email);
            $cmd->execute();
            if($cmd->rowCount()>0)
            {
                return false;
            }
            else
            {
                $cmd = $this->pdo->prepare("INSERT perfil (username,telefene,email)");//alterar nome das tabelas e atributos 
                $cmd-> bindValue(":n",$nome);
                $cmd-> bindValue(":t",$telefone);
                $cmd-> bindValue(":e",$email);
                $cmd->execute();
                return true;
            }

        }



    }