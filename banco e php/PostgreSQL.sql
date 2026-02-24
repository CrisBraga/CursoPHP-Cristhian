CREATE TYPE status_loja as ENUM (
	'ativa',
	'inativa',
	'reforma'
);

CREATE TYPE nivel_cargo as ENUM (
	'adm',
	'gestor',
	'encarregado',
	'funcionario'
);	

CREATE TYPE tipo_produto AS ENUM (
    'flores_corte', 
    'plantas_vaso', 
    'arranjos_buques', 
    'jardinagem', 
    'presentes', 
    'mudas_sementes'
);

CREATE TABLE loja(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	nome VARCHAR(256),
	cnpj VARCHAR(14),
	endereco VARCHAR (100),
	status status_loja DEFAULT 'ativa'
);

CREATE TABLE usuario(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	nome VARCHAR(100),
	deslogin VARCHAR(256),
	dessenha VARCHAR(256),
	cargo nivel_cargo DEFAULT 'funcionario'
);

CREATE TABLE produtos(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	nome VARCHAR(100),
	preco DECIMAL(10,2) NOT NULL,
	tipo tipo_produto
);

CREATE TABLE vendas(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	data_venda TIMESTAMP,
	usuario_id INTEGER REFERENCES usuario(id),
	loja_id INTEGER REFERENCES loja(id)
);

CREATE TABLE entrada_produto(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	nf VARCHAR(44),
	fornecedor VARCHAR,
	data_entrada TIMESTAMP,
	loja_destino_id INTEGER REFERENCES loja(id),
	usuario_id INTEGER REFERENCES usuario(id)
);

CREATE TABLE estoque_saldo(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	quantidade INTEGER,
	produtos_id INTEGER REFERENCES produtos(id),
	loja_id INTEGER REFERENCES loja(id),
	-- serve como uma trava, para não criar o mesmo produto mais de uma vez na loja, ao inves de ter uma linha com 10 e outra com 5
	-- soma o mesmo produto em uma unica linha e adiciona 15
	CONSTRAINT produto_unico UNIQUE (produtos_id, loja_id)
);

CREATE TABLE item_entrada(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	quantidade INTEGER,
	valor_custo DECIMAL(10,2),
	produtos_id INTEGER REFERENCES produtos(id),
	entrada_id INTEGER REFERENCES entrada_produto(id)
);

CREATE TABLE item_venda(
	id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	quantidade INTEGER,
	preco_unitario DECIMAL(10,2),
	produtos_id INTEGER REFERENCES produtos(id),
	vendas_id INTEGER REFERENCES vendas(id) ON DELETE CASCADE
);


--crie ou atualize a função atualizar_estoque caso ja exista
CREATE OR REPLACE FUNCTION	atualizar_estoque()
--return trigger avisa ao banco que estou criando uma função que só pode ser usada com gatilho
RETURNS TRIGGER AS $$
BEGIN

	IF (TG_TABLE_NAME = 'item_entrada') THEN
		INSERT INTO estoque_saldo (produtos_id, loja_id, quantidade)
		SELECT NEW.produtos_id, ept.loja_destino_id, NEW.quantidade
		FROM entrada_produto ept WHERE ept.id = NEW.entrada_id
		ON CONFLICT (produtos_id, loja_id)
		DO UPDATE SET quantidade = estoque_saldo.quantidade + EXCLUDED.quantidade;

	ELSIF (TG_TABLE_NAME = 'item_venda') THEN
		UPDATE estoque_saldo
		SET quantidade = quantidade - NEW.quantidade
		WHERE produtos_id = NEW.produtos_id
			AND loja_id = (SELECT loja_id FROM vendas WHERE id = NEW.vendas_id);
	END IF;

	RETURN NEW;
END;
$$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS trg_att_estoque_entrada ON item_entrada;
CREATE TRIGGER trg_att_estoque_entrada
AFTER INSERT ON item_entrada
FOR EACH ROW EXECUTE FUNCTION atualizar_estoque();

DROP TRIGGER IF EXISTS trg_att_estoque_venda ON item_venda;
CREATE TRIGGER trg_att_estoque_venda
AFTER INSERT ON item_venda
FOR EACH ROW EXECUTE FUNCTION atualizar_estoque();






	