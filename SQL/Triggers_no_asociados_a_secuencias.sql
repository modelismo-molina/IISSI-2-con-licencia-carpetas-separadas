CREATE OR REPLACE TRIGGER RealizaSorteo
AFTER UPDATE OF IdSorteo ON Sorteos
FOR EACH ROW
BEGIN
IF: NEW.IdSorteo > 30
THEN SELECT column FROM
( SELECT column FROM Sorteos
ORDER BY dbms_random.value )
WHERE rownum = 1;
END IF;
END;

CREATE OR REPLACE TRIGGER DenegarOpcion
BEFORE UPDATE OF IdUsuario ON Opciones
FOR EACH ROW
BEGIN
IF :NEW.IdUsuario = :OLD.IdUsuario
THEN raise_application_error
('Un usuario solo puede votar una vez');
END IF;
END;

create or replace trigger creacion_sorteo
before insert on sorteo
for each row
  declare
    numero_pedidos integer;
  begin
    select count(*) into numero_pedidos from pedido where fechasolicitud > sysdate - 31;
    
    if (to_char(:new.fechainicio, 'DD') < '28' or numero_pedidos < 10) then
      raise_application_error(-20002, 'No se ha podido crear sorteo.');
    end if;
  
  end creacion_sorteo;

CREATE OR REPLACE TRIGGER SISTEMA_ENCUESTA 
before insert on opcion
for each row
  declare
    fecha date;
  begin
    select fechainicio into fecha from encuesta where idencuesta = :new.idencuesta;
    
    if (fecha < sysdate - 7) then
        raise_application_error(-20001, 'La encuesta ha expirado.');
    end if;
    
  end sistema_encuesta;
/
