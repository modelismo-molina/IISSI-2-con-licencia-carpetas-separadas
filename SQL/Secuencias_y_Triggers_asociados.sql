DROP SEQUENCE sec_mod;
DROP SEQUENCE sec_mode;
DROP SEQUENCE sec_modelista;
DROP SEQUENCE sec_opciones;
DROP SEQUENCE sec_propuesta;
DROP SEQUENCE sec_pedido;
DROP SEQUENCE sec_enc;
DROP SEQUENCE sec_usuario;


--Modelo

CREATE SEQUENCE sec_mode;

CREATE OR REPLACE TRIGGER crea_id_modelo
BEFORE INSERT ON Modelos
FOR EACH ROW
BEGIN
    SELECT sec_mode.NEXTVAL INTO :NEW.IdModelo FROM DUAL;
END;
/




   

--Moderador

CREATE SEQUENCE sec_mod;

CREATE OR REPLACE TRIGGER crea_id_moderador
BEFORE INSERT ON Moderadores
FOR EACH ROW
BEGIN
    SELECT sec_mod.NEXTVAL INTO :NEW.IdModerador FROM DUAL;
END;
/



--Encuesta

CREATE SEQUENCE sec_enc;

CREATE OR REPLACE TRIGGER crea_id_encuesta
BEFORE INSERT ON Encuestas
FOR EACH ROW
BEGIN
    SELECT sec_enc.NEXTVAL INTO
    :NEW.IdEncuesta FROM DUAL;
END;
/


--Opciones
CREATE SEQUENCE sec_opciones;

CREATE OR REPLACE TRIGGER crea_id_opciones
BEFORE INSERT ON Opciones
FOR EACH ROW
BEGIN
    SELECT sec_opciones.NEXTVAL INTO :NEW.IdOpcion FROM DUAL;
END;
/


--Pedidos
CREATE SEQUENCE sec_pedido;

create or replace TRIGGER crea_id_pedido
BEFORE INSERT ON Pedidos
FOR EACH ROW
BEGIN
  SELECT SEC_PEDIDO.NEXTVAL INTO :NEW.IDPEDIDO FROM DUAL;
END;
/

/*
--Sorteos
--CORREGIR
CREATE SEQUENCE sec_sorteos;

CREATE OR REPLACE TRIGGER crea_id_sorteos
BEFORE INSERT ON Sorteos
FOR EACH ROW 
BEGIN

SELECT sec_sorteos.NEXTVAL INTO:NEW.idSorteo FROM DUAL;
END;
*/


--Modelistas

CREATE SEQUENCE sec_modelista;

CREATE OR REPLACE TRIGGER crea_id_modelista
BEFORE INSERT ON Modelistas
FOR EACH ROW
BEGIN
    SELECT sec_modelista.NEXTVAL INTO :NEW.IdModelista FROM DUAL;
END;
/





--Propuestas
CREATE SEQUENCE sec_propuesta;

create or replace TRIGGER crea_id_propuesta
BEFORE INSERT ON Propuestas
FOR EACH ROW
BEGIN
    SELECT sec_propuesta.NEXTVAL INTO :NEW.IdPropuestas FROM DUAL;
END;
/





--Usuario

CREATE SEQUENCE sec_usuario;

CREATE OR REPLACE TRIGGER crea_id_usuario
BEFORE INSERT ON Usuarios
FOR EACH ROW
BEGIN
    SELECT sec_usuario.NEXTVAL INTO :NEW.IdUsuario FROM DUAL;
END;
/

