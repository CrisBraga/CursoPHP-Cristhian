CREATE OR REPLACE FUNCTION atualizar_estoque()
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