<?php
/**
 * Created by PhpStorm.
 * User: rafaelgibam
 * Date: 06/04/2018
 * Time: 12:21
 */

namespace Models;

class Usuario extends Crud
{
    protected $id;
    protected $table = "usuario";
    private $login;
    private $senha;
    private $criadoem;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getCriadoem()
    {
        return $this->criadoem;
    }

    /**
     * @param mixed $criadoem
     */
    public function setCriadoem($criadoem)
    {
        $this->criadoem = $criadoem;
    }

    public function insert(){
        $sql = "INSERT INTO {$this->table}(login,senha)VALUES (:LOGIN, :SENHA)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":LOGIN", $this->login);
        $stmt->bindParam(":SENHA", $this->senha);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE id = :ID";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":ID", $id);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function update($id){
        $sql = "UPDATE {$this->table} SET login = :LOGIN, senha = :SENHA WHERE id = :ID";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":ID", $id);
        $stmt->bindParam(":LOGIN", $this->login);
        $stmt->bindParam(":SENHA", $this->senha);
        $stmt->execute();
        $stmt->closeCursor();
    }

}