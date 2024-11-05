USE eti;
-- Ejercicio 1
-- Verificar si el procedimiento almacenado existe
DROP PROCEDURE IF EXISTS listarAlumno;
-- Crear el procedimiento almacenado listarAlumno
DELIMITER //
CREATE PROCEDURE listarAlumno()
BEGIN
    SELECT 
    a.id,a.apellido,a.nombre,
    a.idcarrera,ca.nomcar,a.idcurso,cu.nomcur,
-- DATE_FORMAT(a.inicio,'%d/%m/%Y') as inicio,
-- DATE_FORMAT(a.fin,'%d/%m/%Y') as fin,
a.inicio,a.fin,
a.nota,a.estado
FROM alumno a
inner join carrera ca
on ca.idcarrera=a.idcarrera
inner join curso cu
on cu.idcurso=a.idcurso;
END //
DELIMITER ;

-- Ejercicio 1
-- Verificar si el procedimiento almacenado existe
DROP PROCEDURE IF EXISTS listarCarrera;
-- Crear el procedimiento almacenado listarAlumno
DELIMITER //
CREATE PROCEDURE listarCarrera()
BEGIN
    SELECT idcarrera,nomcar 
FROM  carrera ;
END //
DELIMITER ;


-- Ejercicio 2
-- Verificar si el procedimiento almacenado existe
DROP PROCEDURE IF EXISTS insertarAlumno;
-- Crear el procedimiento almacenado insertarAlumno
DELIMITER //

CREATE PROCEDURE insertarAlumno(    
    IN p_nombre VARCHAR(100),
IN p_apellido VARCHAR(100),
    IN p_idcarrera int(11),
    IN p_idcurso int(11),
    IN p_inicio DATE,
    IN p_fin DATE,
    IN p_nota DECIMAL(8,2),
    IN p_estado VARCHAR(100)
)
BEGIN
    DECLARE codigo VARCHAR(11);
    DECLARE contador INT;
    -- Obtener el último código de alumno
    SELECT MAX(RIGHT(id, 5)) INTO contador FROM alumno;
    SET contador = IFNULL(contador, 0) + 1;
    -- Formatear el nuevo código de alumno
    SET codigo = CONCAT('A', LPAD(contador, 5, '0'));
    -- Insertar el nuevo registro en la tabla alumno
    INSERT INTO alumno (id, apellido, nombre, idcarrera, idcurso, inicio, fin, nota, estado) 
    VALUES (codigo, p_apellido, p_nombre, p_idcarrera, p_idcurso, p_inicio, p_fin, p_nota, p_estado);
END //
DELIMITER ;


-- Ejercicio 3
-- Verificar si el procedimiento almacenado existe
DROP PROCEDURE IF EXISTS actualizarAlumno;
-- Crear el procedimiento almacenado actualizarAlumno
DELIMITER //

CREATE PROCEDURE actualizarAlumno(
	IN p_id char(11),
    IN p_apellido VARCHAR(100),
    IN p_nombre VARCHAR(100),
    IN p_idcarrera int(11),
    IN p_idcurso int(11),
    IN p_inicio DATE,
    IN p_fin DATE,
    IN p_nota DECIMAL(8,2),
    IN p_estado VARCHAR(100)
)
BEGIN
   update alumno
  SET apellido = p_apellido,
            nombre = p_nombre,
            idcarrera = p_idcarrera,
            idcurso = p_idcurso,
            inicio = p_inicio,
            fin = p_fin,
            nota = p_nota,
            estado = p_estado
    where id=p_id;    
END //
DELIMITER ;


-- Ejercicio 4
-- Verificar si el procedimiento almacenado existe
DROP PROCEDURE IF EXISTS eliminarAlumno;
-- Crear el procedimiento almacenado eliminarAlumno
DELIMITER //

CREATE PROCEDURE eliminarAlumno(
	IN p_id char(11)
)
BEGIN
   delete from alumno 
    where id=p_id;    
END //
DELIMITER ;

-- Ejecutar procedimientos alamcenados
CALL insertarAlumno('Perez', 'Juan', '1', '1', '2024-04-18', '2024-07-18', 15.50, 'Aprobado');
CALL actualizarAlumno('A00001', 'Lios', 'Armando', '1', '1', '2024-01-01', '2024-12-31', 11, 'Aprobado');
call eliminarAlumno('A00002');
CALL listarAlumno();

