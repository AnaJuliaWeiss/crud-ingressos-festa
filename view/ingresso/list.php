<!DOCTYPE html>
<html>
<head>
    <title>Lista de Ingressos</title>
</head>
<body>
    <h1>Ingressos</h1>
    <a href="index.php?action=create">Novo Ingresso</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Evento</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Comprovante</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($ingressos as $ing): ?>
        <tr>
            <td><?= $ing['id'] ?></td>
            <td><?= $ing['nome'] ?></td>
            <td><?= $ing['email'] ?></td>
            <td><?= $ing['evento'] ?></td>
            <td><?= $ing['data_evento'] ?></td>
            <td>R$ <?= $ing['valor'] ?></td>
            <td>
                <?php if ($ing['comprovante']): ?>
                    <a href="<?= $ing['comprovante'] ?>" target="_blank">Ver</a>
                <?php else: ?>
                    Nenhum
                <?php endif; ?>
            </td>
            <td>
                <a href="index.php?action=edit&id=<?= $ing['id'] ?>">Editar</a>
                <a href="index.php?action=destroy&id=<?= $ing['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
