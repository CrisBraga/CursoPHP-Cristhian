<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Estoque - Gemini</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        form {
            background: #d8d8d8;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        button.editar {
            background: #007bff;
        }
    </style>
</head>

<body>

    <h2><?= $produtoEditar ? "Editar Produto" : "Cadastrar Novo Produto" ?></h2>

    <form action="exercicio_pratico.php" method="POST">
        <input type="hidden" name="id_escondido" value="<?= $produtoEditar['id'] ?? '' ?>">

        <div class="campo">
            <label>Nome do Produto:</label>
            <input type="text" name="txt_nome" value="<?= $produtoEditar['nome'] ?? '' ?>" required>
        </div>

        <div class="campo">
            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="txt_preco" value="<?= $produtoEditar['preco'] ?? '' ?>" required>
        </div>

        <button type="submit" class="<?= $produtoEditar ? 'editar' : '' ?>">
            <?= $produtoEditar ? "Salvar Alterações" : "Cadastrar Produto" ?>
        </button>

        <?php if ($produtoEditar): ?>
            <a href="exercicio_pratico.php">Cancelar Edição</a>
        <?php endif; ?>
    </form>

    <hr>

    <h3>Estoque Atual (Controlado por Trigger)</h3>
</body>

</html>