<?php
require_once ('DataBase.php');
class Produto {
    public $id;
    public $nome;
    public $valor;
    public $quantidade;

    public function cadastrar() {
        $cx = (new DataBase())->getCx();
        $cmdSql = 'CALL produto_listar( :nome :valor :quantidade)';
        $cx_preparado = $cx->prepare($cmdSql);
        $cx_preparado->bindValue(':nome',$this-> nome);
        $cx_preparado->bindValue(':valor',$this-> valor);
        $cx_preparado->bindValue(':quantidade',$this-> quantidade);

        return $result  = $cx_preparado->execute() ;
    }

    public function listar($filtro = "") {
        $cx = (new DataBase())->getCx();
        $cmdSql = 'CALL produto_listar(:filtro)';
        $cx_preparado = $cx->prepare($cmdSql);
        $cx_preparado->bindValue(':filtro', $filtro, PDO::PARAM_STR); // Certifique-se de usar o tipo de dado correto

        if ($cx_preparado->execute()) {
            if ($cx_preparado->rowCount()) {
                $lista_produto = $cx_preparado->fetchAll(PDO::FETCH_CLASS, __CLASS__);
                return $lista_produto;
            }
        }

        return false;
    }
}