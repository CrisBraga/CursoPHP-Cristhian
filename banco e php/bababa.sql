ALTER TABLE tb_entrada_estoque RENAME COLUMN nf TO ene_nota_fiscal;

ALTER TABLE tb_entrada_estoque RENAME COLUMN fornecedor TO ene_fornecedor;

ALTER TABLE tb_entrada_estoque RENAME COLUMN data_entrada TO ene_data_entrada;

ALTER TABLE tb_entrada_estoque RENAME COLUMN loja_destino_id TO loj_codigo_destino;

ALTER TABLE tb_entrada_estoque RENAME COLUMN usuario_id TO usu_codigo;

-------------------------------------------------------------------------------------

ALTER TABLE tb_info_itens_venda RENAME COLUMN quantidade TO ini_quantidade;

ALTER TABLE tb_info_itens_venda RENAME COLUMN preco_unitario TO ini_preco_un;

ALTER TABLE tb_info_itens_venda RENAME COLUMN produtos_id TO pro_codigo;

ALTER TABLE tb_info_itens_venda RENAME COLUMN vendas_id TO ven_codigo;

-------------------------------------------------------------------------------------

ALTER TABLE tb_item_entrada RENAME COLUMN quantidade TO ite_quantidade;

ALTER TABLE tb_item_entrada RENAME COLUMN valor_custo TO ite_valor_custo;

ALTER TABLE tb_item_entrada RENAME COLUMN produtos_id TO pro_codigo;

ALTER TABLE tb_item_entrada RENAME COLUMN entrada_id TO ene_codigo_entrada;

-------------------------------------------------------------------------------------

ALTER TABLE tb_produtos RENAME COLUMN nome TO pro_nome;

ALTER TABLE tb_produtos RENAME COLUMN preco TO pro_preco;

ALTER TABLE tb_produtos RENAME COLUMN tipo TO pro_tipo;

-------------------------------------------------------------------------------------

ALTER TABLE tb_loja RENAME COLUMN nome TO loj_nome;

ALTER TABLE tb_loja RENAME COLUMN cnpj TO loj_cnpj;

ALTER TABLE tb_loja RENAME COLUMN endereco TO loj_endereco;

ALTER TABLE tb_loja RENAME COLUMN status TO loj_status;

-------------------------------------------------------------------------------------

ALTER TABLE tb_saldo_estoque RENAME COLUMN quantidade TO sae_quantidade;

ALTER TABLE tb_saldo_estoque RENAME COLUMN produtos_id TO pro_codigo;

ALTER TABLE tb_saldo_estoque RENAME COLUMN loja_id TO loj_codigo;

-------------------------------------------------------------------------------------

ALTER TABLE tb_usuario RENAME COLUMN nome TO usu_nome;

ALTER TABLE tb_usuario RENAME COLUMN deslogin TO usu_login;

ALTER TABLE tb_usuario RENAME COLUMN dessenha TO usu_senha;

ALTER TABLE tb_usuario RENAME COLUMN cargo TO usu_cargo;

-------------------------------------------------------------------------------------

ALTER TABLE tb_venda RENAME COLUMN data_venda TO ven_data_venda;

ALTER TABLE tb_venda RENAME COLUMN usuario_id TO usu_codigo;

ALTER TABLE tb_venda RENAME COLUMN loja_id TO loj_codigo;




