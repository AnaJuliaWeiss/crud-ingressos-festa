<?php
require_once __DIR__ . '/../model/Ingresso.php';

class IngressoController {
    private $model;

    public function __construct() {
        $this->model = new Ingresso();
    }

    public function index() {
        $ingressos = $this->model->listar();
        require __DIR__ . '/../view/ingresso/list.php';
    }

    public function create() {
        require __DIR__ . '/../view/ingresso/form.php';
    }

    public function store() {
        $dados = $_POST;

        // Upload do comprovante
        if (isset($_FILES['comprovante']) && $_FILES['comprovante']['error'] == 0) {
            $pasta = 'uploads/';
            $nome = basename($_FILES['comprovante']['name']);
            $destino = $pasta . uniqid() . '-' . $nome;
            move_uploaded_file($_FILES['comprovante']['tmp_name'], $destino);
            $dados['comprovante'] = $destino;
        }

        $this->model->inserir($dados);
        header('Location: index.php');
    }

    public function edit($id) {
        $ingresso = $this->model->buscar($id);
        require __DIR__ . '/../view/ingresso/form.php';
    }

    public function update() {
        $dados = $_POST;

        if (isset($_FILES['comprovante']) && $_FILES['comprovante']['error'] == 0) {
            $pasta = 'uploads/';
            $nome = basename($_FILES['comprovante']['name']);
            $destino = $pasta . uniqid() . '-' . $nome;
            move_uploaded_file($_FILES['comprovante']['tmp_name'], $destino);
            $dados['comprovante'] = $destino;
        } else {
            $dados['comprovante'] = $_POST['comprovante_atual'] ?? null;
        }

        $this->model->atualizar($dados);
        header('Location: index.php');
    }

    public function destroy($id) {
        $this->model->excluir($id);
        header('Location: index.php');
    }
}
