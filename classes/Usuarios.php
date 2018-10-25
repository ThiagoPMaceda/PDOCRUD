<?php

require_once 'Crud.php';
//classe herda os atributos de crud
class Usuarios extends Crud{

	//tabela = nome da tabela que foi definida no db
	protected $table = 'usuarios';
	private $nome;
	private $email;

	//é possivel fazer validações 
	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	
	//inserir
	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, email) VALUES (:nome, :email)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		return $stmt->execute(); 

	}

	//update
	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, email = :email WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}