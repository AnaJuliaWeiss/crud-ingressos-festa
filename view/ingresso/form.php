<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Ingresso</title>
</head>
<body>
    <h1><?= isset($ingresso) ? 'Editar' : 'Novo' ?> Ingresso</h1>
    <form action="index.php?action=<?= isset($ingresso) ? 'update' : 'store' ?>" method="post" enctype="multipart/form-data">
        <?php if (isset($ingresso)): ?>
            <input type="hidden" name="id" value="<?= $ingresso['id'] ?>">
            <input type="hidden" name="comprovante_atual" value="<?= $ingresso['comprovante'] ?>">
        <?php endif; ?>
        <p>Nome: <input type="text" name="nome" value="<?= $ingresso['nome'] ?? '' ?>"></p>
        <p>Email: <input type="email" name="email" value="<?= $ingresso['email'] ?? '' ?>"></p>
        <p>Evento: <input type="text" name="evento" value="<?= $ingresso['evento'] ?? '' ?>"></p>
        <p>Data do Evento: <input type="date" name="data_evento" value="<?= $ingresso['data_evento'] ?? '' ?>"></p>
        <p>Valor: <input type="number" step="0.01" name="valor" value="<?= $ingresso['valor'] ?? '' ?>"></p>
        <p>Comprovante: <input type="file" name="comprovante"></p>
        <?php if (!empty($ingresso['comprovante'])): ?>
            <p>Atual: <a href="<?= $ingresso['comprovante'] ?>" target="_blank">Ver</a></p>
        <?php endif; ?>
        <p><button type="submit">Salvar</button></p>
    </form>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>
