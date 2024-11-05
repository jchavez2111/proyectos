
-- Seleccionar la base de datos 'eti' para las siguientes operaciones
USE eti;


-- Insertar datos en la tabla 'directores'
INSERT INTO directores (iddirector, nombres, peliculas) VALUES
(1, ' Martin Scorsese', 'Taxi Driver, Uno de los nuestros'),
(2, ' Billy Wilder ', 'El crepúsculo de los dioses, El apartamento'),
(3, ' Steven Spielberg ', 'La lista de Schindler, Salvar al soldado Ryan'),
(4, ' Ingmar Bergman ', 'El séptimo sello'),
(5, ' Federico Fellini ', 'La Strada, La dolce vita'),
(6, ' Roman Polanski ', 'La semilla del diablo, El pianista'),
(7, ' Michael Haneke ', 'Amor, La cinta blanca'),
(8, ' Francis Ford Coppola ', 'Apocalypse Now, El Padrino'),
(9, ' Alfred Hitchcock ', 'Psicosis, Vértigo'),
(10, ' Paolo Sorrentino ', 'La gran belleza');


-- Insertar datos en la tabla 'proveedores'
INSERT INTO proveedores (idproveedor, nombreempresa, nombrecontacto, cargocontacto, direccion, ciudad, region, codigopostal, pais, telefono, fax) VALUES
(1, 'Tiendas Charlotte', 'Charlotte Cooper', 'Gerente de compras', '88 Gilbert St.', 'Londres', NULL, 'EC1 4SD', 'Reino Unido', '(171) 555-2222', NULL),
(2, 'New Orleans Cajun Delights', 'Shelley Burke', 'Administrador de pedidos', 'P.O. Box 78934', 'New Orleans', 'LA', '70117', 'Estados Unidos', '(100) 555-4888', '12'),
(3, 'Grandma Kelly\'s Homestead', 'Regina Murphy', 'Representante de ventas', '707 Oxford Rd.', 'Ann Arbor', 'MI', '48104', 'Estados Unidos', '(313) 555-5735', '(313) 555-3349'),
(4, 'Tokyo Traders', 'Yoshi Nagase', 'Gerente de marketing', '9-8 SekimaiMusashino-shi', 'Tokyo', NULL, '100', 'Japón', '(03) 3555-5011', '(015) - 634'),
(5, 'Cooperativa de Quesos \'Las Cabras\'', 'Antonio del Valle Saavedra ', 'Administrador de exportaciones', 'Calle del Rosal 4', 'Oviedo', 'Asturias', '33007', 'España', '(98) 598 76 54', NULL),
(6, 'Mayumi\'s', 'Mayumi Ohno', 'Representante de marketing', '92 Setsuko\r\nChuo-ku', 'Osaka', NULL, '545', 'Japón', '(06) 431-7877', NULL),
(7, 'Pavlova, Ltd.', 'Ian Devling', 'Gerente de marketing', '74 Rose St.\r\nMoonie Ponds', 'Melbourne', 'Victoria', '3058', 'Australia', '(03) 444-2343', '(03) 444-6588'),
(8, 'Specialty Biscuits, Ltd.', 'Peter Wilson', 'Representante de ventas', '29 King\'s Way', 'Manchester', NULL, 'M14 GSD', 'Reino Unido', '(161) 555-4448', NULL),
(9, 'PB Knäckebröd AB', 'Lars Peterson', 'Agente de ventas', 'Kaloadagatan 13', 'Göteborg', NULL, 'S-345 67', 'Suecia', '031-987 65 43', '031-987 65 91'),
(10, 'Refrescos Americanas LTDA', 'Carlos Diaz', 'Gerente de marketing', 'Av. das Americanas 12.890', 'São Paulo', NULL, '5442', 'Brasil', '(11) 555 4640', NULL);



-- Insertar datos en la tabla 'carrera'
INSERT INTO carrera (idcarrera,nomcar) VALUES 
(null, 'Desarrollo de Software'),
(null, 'Ingenieria de Software con Inteligencia Artificial');



-- Insertar datos en la tabla 'curso'
INSERT INTO curso (idcurso,nomcur) VALUES 
(null, 'Desarrollo de Software I'),
(null, 'Java Foundation');

-- Insertar datos en la tabla 'alumno'
INSERT INTO alumno (id, apellido, nombre, idcarrera, idcurso, inicio, fin, nota,estado) 
VALUES
('A00001', 'Paredes', 'Armando', '1', '1', '2023-05-01', '2023-05-30', 16,'Aprobado'),
('A00002', 'Perez', 'Juan', '2', '2', '2023-05-01', '2023-05-30', 16,'Aprobado');

-- Insertar datos en la tabla 'articulos'
INSERT INTO `articulos` (`descripcion`, `precio`) VALUES
('Camiseta', 15.99),
('Pantalón', 29.99),
('Zapatos', 49.99),
('Gorra', 9.99),
('Bufanda', 12.50),
('Calcetines', 5.99),
('Chaqueta', 59.99),
('Vestido', 39.99),
('Sombrero', 14.99),
('Pulsera', 7.50),
('Collar', 18.99),
('Reloj', 99.99),
('Anillo', 24.99),
('Bolso', 34.99),
('Cinturón', 19.99),
('Gafas de sol', 29.99),
('Chaleco', 45.99),
('Botas', 59.99),
('Paraguas', 8.99),
('Pendientes', 11.99);



-- Insertar datos en la tabla 'usuario'
INSERT INTO usuario (id, usr, psw) VALUES
(1, 'admin', 'admin'),
(2, 'alumno', '123456');
