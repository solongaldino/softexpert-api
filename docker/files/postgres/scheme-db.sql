CREATE SCHEMA IF NOT EXISTS api;

-- -----------------------------------------------------
-- Table api.Taxe
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Taxe (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL
);