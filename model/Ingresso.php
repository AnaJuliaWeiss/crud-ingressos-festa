<?php
require_once 'Conexao.php';

class Ingresso {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function inserir($dados) {
        $stmt = $this->con->prepare("INSERT INTO ingressos (nome, email, evento, data_evento, valor, comprovante) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $dados['nome'],
            $dados['email'],
            $dados['evento'],
            $dados['data_evento'],
            $dados['valor'],
            $dados['comprovante'] ?? null
        ]);
    }

    public function listar() {
        $stmt = $this->con->query("SELECT * FROM ingressos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->con->prepare("SELECT * FROM ingressos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($dados) {
        $stmt = $this->con->prepare("UPDATE ingressos SET nome=?, email=?, evento=?, data_evento=?, valor=?, comprovante=? WHERE id=?");
        return $stmt->execute([
            $dados['nome'],
            $dados['email'],
            $dados['evento'],
            $dados['data_evento'],
            $dados['valor'],
            $dados['comprovante'],
            $dados['id']
        ]);
    }

    public function excluir($id) {
        $stmt = $this->con->prepare("DELETE FROM ingressos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
