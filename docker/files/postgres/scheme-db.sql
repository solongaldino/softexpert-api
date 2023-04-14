CREATE SCHEMA IF NOT EXISTS api;

-- -----------------------------------------------------
-- Table api.ProductType
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ProductType (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200),
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP
);


-- -----------------------------------------------------
-- Table api.Product
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Product (
  id SERIAL PRIMARY KEY,
  product_type INTEGER NOT NULL,
  name VARCHAR(200) NOT NULL,
  value NUMERIC(8,2) NOT NULL,
  description VARCHAR(1000),
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP,
  CONSTRAINT fk_Product_ProductType
    FOREIGN KEY (product_type)
    REFERENCES ProductType (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table api.Taxe
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Taxe (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  percentage SMALLINT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP
);


-- -----------------------------------------------------
-- Table api.ProductType_has_Taxe
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ProductType_has_Taxe (
  ProductType_id INTEGER NOT NULL,
  Taxe_id INTEGER NOT NULL,
  PRIMARY KEY (ProductType_id, Taxe_id),
  CONSTRAINT fk_ProductType_has_Taxe_ProductType1
    FOREIGN KEY (ProductType_id)
    REFERENCES ProductType (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ProductType_has_Taxe_Taxe1
    FOREIGN KEY (Taxe_id)
    REFERENCES Taxe (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);