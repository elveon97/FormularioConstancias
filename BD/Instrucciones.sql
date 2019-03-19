USE constancias;

-- 1.- Quitar constraint de constancia
ALTER TABLE constancia DROP FOREIGN KEY constancia_ibfk_2;

-- 2.- Drop primary key de cursante
ALTER TABLE cursante DROP PRIMARY KEY;

-- 3.- Crear columna cursante id
ALTER TABLE cursante ADD cursante_id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

-- 4.- Crear nueva columna de relación en constancia 'cursante_id'
ALTER TABLE constancia ADD COLUMN cursante_id int(8) NOT NULL AFTER evento;

-- 5.- Correr procedimiento para actualizar Foreign key
DROP PROCEDURE IF EXISTS ROWPERROW;
DELIMITER ;;

CREATE PROCEDURE ROWPERROW()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
DECLARE varCodigo VARCHAR(20) DEFAULT 'c';
DECLARE varId INT(8) DEFAULT 0;
SELECT COUNT(*) FROM cursante INTO n;
SET i=0;
WHILE i<n DO
  SELECT codigo INTO varCodigo FROM cursante LIMIT i,1;
  SELECT cursante_id INTO varId FROM cursante LIMIT i,1;
  UPDATE constancia SET cursante_id = varId WHERE cursante = varCodigo;
  SET i = i + 1;
END WHILE;
End;
;;

DELIMITER ;

CALL ROWPERROW();

-- 6.- Dropear columna constancia.cursante
ALTER TABLE constancia DROP COLUMN cursante;

-- 7.- Cambiar nombre constancia.cursante_id a constancia.cursante
ALTER TABLE constancia CHANGE `cursante_id` `cursante` int(8);

-- 8.- Agregar Foreign key constancia -> cursante
ALTER TABLE constancia ADD FOREIGN KEY (cursante) REFERENCES cursante(cursante_id);

-- 9.- Eliminar procedimiento
DROP PROCEDURE IF EXISTS ROWPERROW;
