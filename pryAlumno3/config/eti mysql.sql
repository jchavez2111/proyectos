-- Consultar si la base de datos 'eti' existe y eliminarla si es necesario
DROP DATABASE IF EXISTS eti;

-- Crear la base de datos 'eti' con la codificación utf8_general_ci
CREATE DATABASE eti;

-- Seleccionar la base de datos 'eti' para las siguientes operaciones
USE eti;

-- Verificar si la tabla existe 
DROP TABLE IF EXISTS directores;

-- Crear la tabla 'directores'
CREATE TABLE directores (
  iddirector int(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombres varchar(50) DEFAULT NULL,
  peliculas varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- Verificar si la tabla existe 
DROP TABLE IF EXISTS proveedores;

-- Crear la tabla 'proveedores'
CREATE TABLE proveedores (
  idproveedor int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombreempresa varchar(40) NOT NULL,
  nombrecontacto varchar(30) DEFAULT NULL,
  cargocontacto varchar(30) DEFAULT NULL,
  direccion varchar(60) DEFAULT NULL,
  ciudad varchar(15) DEFAULT NULL,
  region varchar(15) DEFAULT NULL,
  codigopostal varchar(10) DEFAULT NULL,
  pais varchar(15) DEFAULT NULL,
  telefono varchar(24) DEFAULT NULL,
  fax varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Verificar si la tabla existe 
DROP TABLE IF EXISTS carrera;

-- Crear la tabla 'carrera'
CREATE TABLE carrera (
  idcarrera int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,  
  nomcar varchar(100)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Verificar si la tabla existe 
DROP TABLE IF EXISTS curso;

-- Crear la tabla 'curso'
CREATE TABLE curso (
  idcurso int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,  
  nomcur varchar(100)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Verificar si la tabla existe 
DROP TABLE IF EXISTS alumno;

-- Crear la tabla 'alumno'
CREATE TABLE alumno (
  id char(11) NOT NULL primary key,
  apellido varchar(100) NOT NULL,
  nombre varchar(100)  NOT NULL,
  idcarrera int(11) NOT NULL,
  idcurso int(11) NOT NULL,
  inicio date  NOT NULL,
  fin date NOT NULL,
  nota decimal(8,2),
estado varchar(100),
FOREIGN KEY (idcarrera) references carrera(idcarrera),
FOREIGN KEY (idcurso) references curso(idcurso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




-- Verificar si la tabla existe 
DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
  id int(11) NOT NULL primary key AUTO_INCREMENT,
  usr varchar(100) NOT NULL,
  psw varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- Verificar si la tabla existe 
DROP TABLE IF EXISTS articulos;

-- Crear la tabla 'articulos'
CREATE TABLE `articulos` (
  `codigo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;