-- CAMBIOS REALIZADOS

USE constancias;

CALL crear_cursante('15290932', 'Darío Alexis Vázquez Magaña');
CALL crear_evento('curso', 'Curso de SQL', 500, '2019/01/20', '2019/03/24', 'Dep. Sistemas');
CALL crear_constancia('curso de sql', '15290932', '2019/04/01', 'Sin comentarios');


-- FALLAS ----------------------------------------------------------------------
-- #1 22/01/2019: 11:56 - Las fechas no se guardan conrrectamente
--    SOLUCIÓN: Utilizar comillas entre la fecha, usando el formato YYYY/MM/DD
-- #2 22/01/2019: 12:00 - Los registros de la base de datos no guardan acentos
--    de manera correcta
--    SOLUCIÓN: Problema de la consola (CMD), los acentos están siendo guardados
--    correctamente y pueden observarse en phpmyadmin

--  FUNCIONAMIENTO ESPERADO 23/01/2019: 12:22
