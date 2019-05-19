DROP SEQUENCE sec_mod;
DROP SEQUENCE sec_mode;
DROP SEQUENCE sec_modelista;


--Moderador

CREATE SEQUENCE sec_mod
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_moderador
BEFORE INSERT ON Moderadores
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_mod.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdModerador := valorSecuencia;
END;


--Encuesta

CREATE SEQUENCE sec_enc
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_encuesta
BEFORE INSERT ON Encuestas
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_enc.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdEncuesta := valorSecuencia;
END;


--Opciones

CREATE SEQUENCE sec_opciones
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_opciones
BEFORE INSERT ON Opciones
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_opciones.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdOpcion := valorSecuencia;
END;



--Propuestas


CREATE SEQUENCE sec_prop
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_propuestas
BEFORE INSERT ON Propuestas
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_prop.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdPropuestas := valorSecuencia;
END;




--Sorteos

CREATE SEQUENCE sec_sorteos;

CREATE OR REPLACE TRIGGER crea_id_sorteos
BEFORE INSERT ON Sorteos
FOR EACH ROW 
BEGIN

SELECT sec_sorteos.NEXTVAL INTO:NEW.idSorteo FROM DUAL;
END;



--Modelistas

CREATE SEQUENCE sec_modelista
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_modelista
BEFORE INSERT ON Modelistas
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_modelista.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdModelista := valorSecuencia;
END;




--Modelo

CREATE SEQUENCE sec_mode
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_modelo
BEFORE INSERT ON Modelos
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_mode.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdModelo := valorSecuencia;
END;


--Pedido

CREATE SEQUENCE sec_ped;

CREATE OR REPLACE TRIGGER crea_id_pedido
BEFORE INSERT ON Pedidos
FOR EACH ROW 
BEGIN

SELECT sec_ped.NEXTVAL INTO:NEW.idPedido FROM DUAL;
END;




--Usuario


CREATE SEQUENCE sec_usuario
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER crea_id_usuario
BEFORE INSERT ON Usuarios
FOR EACH ROW
DECLARE valorSecuencia NUMBER := 0;
BEGIN
    SELECT sec_usuario.NEXTVAL INTO valorSecuencia FROM DUAL;
    :NEW.IdUsuario := valorSecuencia;
END;
