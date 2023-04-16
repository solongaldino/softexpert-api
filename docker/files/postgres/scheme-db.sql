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
  value NUMERIC(8,2) NOT NULL,
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
  created_at TIMESTAMP NOT NULL,
  PRIMARY KEY (id)
);

-- -----------------------------------------------------
-- Table api.item
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS item (
  id SERIAL PRIMARY KEY,
  amount INTEGER NOT NULL,
  sale INTEGER NOT NULL,
  product INTEGER NOT NULL,
  PRIMARY KEY (id),
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