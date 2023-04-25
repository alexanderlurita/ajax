CREATE DATABASE dbajax;
USE dbajax;

CREATE TABLE productos
(
	idproducto		INT AUTO_INCREMENT PRIMARY KEY,
	nombre 			VARCHAR(50)		NOT NULL,
	marca				VARCHAR(50)		NOT NULL,
	precio			DECIMAL(7,2) 	NOT NULL,
	create_at   	DATETIME 		NOT NULL DEFAULT NOW(),
	update_at		DATETIME			NULL 
) ENGINE = INNODB;

INSERT INTO productos (nombre, marca, precio)
	VALUES
		('Teclado standart', 'Logitech', 45),
		('SSD 240Gb', 'Samsung', 100),
		('Audífonos M100', 'Micronics', 30);
-- Agregamos una restricción UNIQUE (generar errores)
ALTER TABLE productos ADD CONSTRAINT uk_nombre UNIQUE (nombre, marca);
		
SELECT * FROM productos;