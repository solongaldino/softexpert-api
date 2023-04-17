CREATE SCHEMA IF NOT EXISTS api;

-- -----------------------------------------------------
-- Table api.product_type
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS product_type (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP
);

-- -----------------------------------------------------
-- Table api.product
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS product (
  id SERIAL PRIMARY KEY,
  product_type INTEGER NOT NULL,
  name VARCHAR(200) NOT NULL,
  value NUMERIC(8,2) NOT NULL,
  description VARCHAR(1000),
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP,
  CONSTRAINT fk_product_product_type
    FOREIGN KEY (product_type)
    REFERENCES product_type (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table api.taxe
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS taxe (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  percentage NUMERIC(8,2) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP
);

-- -----------------------------------------------------
-- Table api.product_type_has_taxe
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS product_type_has_taxe (
  product_type_id INTEGER NOT NULL,
  taxe_id INTEGER NOT NULL,
  PRIMARY KEY (product_type_id, taxe_id),
  CONSTRAINT fk_ProductType_has_Taxe_ProductType1
    FOREIGN KEY (product_type_id)
    REFERENCES product_type (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ProductType_has_Taxe_Taxe1
    FOREIGN KEY (taxe_id)
    REFERENCES taxe (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table api.sale
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sale (
  id SERIAL PRIMARY KEY,
  amount DECIMAL(8,2) NULL,
  taxe DECIMAL(8,2) NULL,
  created_at TIMESTAMP NOT NULL
);

-- -----------------------------------------------------
-- Table api.item
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS item (
  id SERIAL PRIMARY KEY,
  amount INTEGER NOT NULL,
  sale INTEGER NOT NULL,
  product INTEGER NOT NULL,
  CONSTRAINT fk_item_sale
    FOREIGN KEY (sale)
    REFERENCES sale (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_item_product
    FOREIGN KEY (product)
    REFERENCES product (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO taxe (name, percentage, created_at)
VALUES
('ICMS', 17, current_timestamp),
('PIS', 0.65, current_timestamp),
('COFINS', 3, current_timestamp),
('IRPJ', 15, current_timestamp),
('CSLL', 9, current_timestamp),
('IPI', 24.75, current_timestamp);

INSERT INTO product_type (name, created_at)
VALUES
('unificado', current_timestamp),
('parcial', current_timestamp);

INSERT INTO product_type_has_taxe (product_type_id, taxe_id)
VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3);

INSERT INTO product (product_type, name, value, description, created_at)
VALUES
(1, 'Lâmpada led 6W', 6.75, 'Resistente a chuva IPV5', current_timestamp),
(1, 'Lâmpada led 7W', 8.40, 'Resistente a chuva IPV5', current_timestamp),
(1, 'Lâmpada led 9W', 10, 'Resistente a chuva IPV5', current_timestamp),
(1, 'Lâmpada led 12W', 14.60, 'Resistente a chuva IPV5', current_timestamp),
(2, 'Refletor led 50W', 76.20, 'Resistente a chuva IPV5 com base de fixação', current_timestamp),
(2, 'Refletor led 90W', 145.90, 'Resistente a chuva IPV5 com base de fixação', current_timestamp);