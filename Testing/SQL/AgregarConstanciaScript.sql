BEGIN

DECLARE _salida_cursante int;
DECLARE _salida_evento int;

CALL crear_cursante('15290932', 'Darío Alexis Vázquez', _salida_cursante);
CALL crear_evento(1, 1, 'Curso SQL 2018', 40, '2019-01-17', '2019-02-5', _salida_evento);
CALL crear_constancia(_salida_evento, _salida_cursante, '2019-03-04', 'Comentario');

END
