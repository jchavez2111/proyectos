-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS gestion_clientes;

-- Usar la base de datos
USE gestion_clientes;

-- Crear la tabla `clientes`
CREATE TABLE IF NOT EXISTS `clientes` (
  `codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) DEFAULT NULL,
  `dni` VARCHAR(20) DEFAULT NULL,
  `telefono` VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
