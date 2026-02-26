<!-- form é o corpo do código, sera colocado tudo dentro dele -->
<form class="meu-formulario" action="" method="POST">
    <!-- h2 é o cabeçalho -->
    <h1>Cadastrar Equipamentos</h1>

    <!-- div é onde define um espaço entao tudo que estiver fora dele pula uma linha para não ficarem colados -->
    <div class="campo">
        <label>Tipo de Item</label>
        <select id="tipo_item" name="tipo_item" onchange="verificarTipo()">
            <option value="">Selecionar</option>
            <option value="equipamento">Equipamento</option>
            <option value="semente">Semente</option>
        </select>
    </div>

    <div id="campo_semente" style="display: none;" class="campo">
        <label>Tipo de Semente:</label>
        <input type="text" name="txt_tipo">
    </div>

    <div class="campo">
        <!-- label é o texto que será visto pelo usuario -->
        <label>Nome do Equipamento: </label>
        <!-- input é onde fica o quadrado de texto ou etc. aqui é texto mesmo, mas pode ser number e submit
     o required é onde eu faço o usuario adicionar os dados -->
        <input type="text" name="txt_nome" required>
    </div>

    <div class="campo">
        <label>Preço:</label>
        <!-- step define quantas casas decimais para tras pode ir, placehololder é o texto que fica dentro da caixa -->
        <input type="number" step="0.01" placeholder="0,00" name="txt_preco" required>
    </div>

    <div class="campo">
        <label>Vincular ao Estoque</label>
        <select name="sel_estoque">
            <option value="">Selecione...</option>

            <!-- vamos supor que categorias é um baú cheio de informações que vieram do banco 
         "as $cat" é a mão que vai tirando as informações uma por uma
         o $cat id é o id do item e o cat nome é o nome que vai aparecer desse item-->
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>">
                    <?= $cat['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit">Cadastrar</button>
</form>