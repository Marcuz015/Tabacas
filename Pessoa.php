<?php
require_once ('DataBase.php');
class Pessoa {
    public $id;
    public $email;
    public $senha;

    public function cadastrar() {
        $cx = (new DataBase())->getCx();
        $cmdSql = 'CALL pessoa_listar( :email, :senha)';
        $cx_preparado = $cx->prepare($cmdSql);
        $cx_preparado->bindValue(':email',$this-> email);
        $cx_preparado->bindValue(':senha',$this-> senha);
        return $result  = $cx_preparado->execute() ;
    }

    public function listar($filtro = "") {
        $cx = (new DataBase())->getCx();
        $cmdSql = 'CALL time_listar(:filtro)';
        $cx_preparado = $cx->prepare($cmdSql);
        $cx_preparado->bindValue(':filtro', $filtro, PDO::PARAM_STR); // Certifique-se de usar o tipo de dado correto

        if ($cx_preparado->execute()) {
            if ($cx_preparado->rowCount()) {
                $lista = $cx_preparado->fetchAll(PDO::FETCH_CLASS, __CLASS__);
                return $lista;
            }
        }

        return false;
    }
}