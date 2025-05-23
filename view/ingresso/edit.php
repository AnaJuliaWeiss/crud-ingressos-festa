<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Editar Ingresso</title>
    <link rel="stylesheet" href="../../style.css" />
</head>
<body>
    <h1>Editar Ingresso</h1>
    <form action="router.php?acao=update&id=<?= $ingresso['id'] ?>" method="post" enctype="multipart/form-data">
        <label>Nome Comprador:</label><br/>
        <input type="text" name="nome_comprador" value="<?= htmlspecialchars($ingresso['nome_comprador']) ?>" required/><br/><br/>

        <label>CPF:</label><br/>
        <input type="text" name="cpf" value="<?= htmlspecialchars($ingresso['cpf']) ?>" required/><br/><br/>

        <label>Nome da Festa:</label><br/>
        <input type="text" name="nome_festa" value="<?= htmlspecialchars($ingresso['nome_festa']) ?>" required/><br/><br/>

        <label>Data da Festa:</label><br/>
        <input type="date" name="data_festa" value="<?= htmlspecialchars($ingresso['data_festa']) ?>" required/><br/><br/>

        <label>Tipo de Ingresso:</label><br/>
        <input type="text" name="tipo_ingresso" value="<?= htmlspecialchars($ingresso['tipo_ingresso']) ?>" /><br/><br/>

        <label>Comprovante Atual:</label><br/>
        <?php if ($ingresso['comprovante_pagamento']): ?>
            <a href="../../<?= $ingresso['comprovante_pagamento'] ?>" download>Download</a>
        <?php else: ?>
            -
        <?php endif; ?>
        <input type="hidden" name="comprovante_pagamento_atual" value="<?= $ingresso['comprovante_pagamento'] ?>" /><br/><br/>

        <label>Alterar Comprovante:</label><br/>
        <input type="file" name="comprovante" /><br/><br/>

        <button type="submit">Atualizar</button>
    </form>
    <br/>
    <a href="router.php">Voltar para a lista</a>
</body>
</html>
