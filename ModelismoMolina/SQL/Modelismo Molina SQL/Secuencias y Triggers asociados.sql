DROP SEQUENCE sec_mod;
DROP SEQUENCE sec_mode;
DROP SEQUENCE sec_modelista;
DROP SEQUENCE sec_opciones;
DROP SEQUENCE sec_prop;
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




    INSERT INTO Modelos VALUES ('','images/goku.png','2','1','25cm de pura magia de Lothlórien','No deberiamos ni haber llegaddddddo hasta aqui, Pero henos aqui, igual','https://www.youtube.com/watch?v=-4dlfLTbZl8','Noup',1000,'Dios');
    INSERT INTO Modelos VALUES ('','images/l.png','3','3','Segunda descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 2','enlaceproducto2',30,'Segunda Prueba');
    INSERT INTO Modelos VALUES ('','images/logo.png','3','2','Tercera descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 3','enlaceproducto3',40,'Tercera Prueba');
    INSERT INTO Modelos VALUES ('','images/naruto.png','4','3','Cuarta descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 4','enlaceproducto4',15,'Cuarta Prueba');
    INSERT INTO Modelos VALUES ('','images/riuk.png','5','1','Quinta descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 5','enlaceproducto5',48,'Quinta Prueba');
    INSERT INTO Modelos VALUES ('','images/robot.png','4','4','Sexta descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 6','enlaceproducto6',50,'Sexta Prueba');
    INSERT INTO Modelos VALUES ('','images/spiderman.png',null,'4','Septima descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 7','enlaceproducto7',55,'Septima Prueba');
    INSERT INTO Modelos VALUES ('','images/satelite.png','2','1','Octava descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 8','enlaceproducto8',15,'Octava Prueba');
    INSERT INTO Modelos VALUES ('','images/deadpool.png','3','4','Novena descripcion del producto','No deberíamos ni haber llegado hasta aquí, Pero henos aquí, igual','enlace video 9','enlaceproducto9',22,'Novena Prueba');
    INSERT INTO Modelos VALUES ('',null,'3','3','Decima descripcion del producto',null,'enlace video 10','enlaceproducto10',17,'Decima Prueba');
    INSERT INTO Modelos VALUES ('',null,'4','2','Undecima descripcion del producto',null,'enlace video 11','enlaceproducto11',43,'Undecima Prueba');
    INSERT INTO Modelos VALUES ('',null,'1','2','Duodecima descripcion del producto',null,'enlace video 12','enlaceproducto12',14,'Duodecima Prueba');
    INSERT INTO Modelos VALUES ('',null,'1','1','Treceava descripcion del producto',null,'enlace video 13','enlaceproducto13',19,'Treceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'2','3','Catorceava descripcion del producto',null,'enlace video 14','enlaceproducto14',6,'Catorceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');
    INSERT INTO Modelos VALUES ('',null,'5','4','Quinceava descripcion del producto',null,'enlace video 15','enlaceproducto15',87,'Quinceava Prueba');


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






--Pedido
--CORREGIR
/*CREATE SEQUENCE sec_ped;

CREATE OR REPLACE TRIGGER crea_id_pedido
BEFORE INSERT ON Pedidos
FOR EACH ROW 
BEGIN

SELECT sec_ped.NEXTVAL INTO:NEW.idPedido FROM DUAL;
END;*/




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
