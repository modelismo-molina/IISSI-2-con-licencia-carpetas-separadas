--DROP PROCEDURE altaModerador;
--DROP PROCEDURE eliminarModerador;

--DROP PROCEDURE altaUsuario;
--DROP PROCEDURE eliminarUsuario;
--DROP PROCEDURE actualizarUsuario;

--DROP PROCEDURE altaModelista;
--DROP PROCEDURE eliminarModelista;


--DROP PROCEDURE altaOpcion;
--DROP PROCEDURE eliminarOpcion;


DROP PROCEDURE INSERTAR_PROPUESTA;
DROP PROCEDURE MODIFICAR_PROPUESTA;
DROP PROCEDURE QUITAR_PROPUESTA;

DROP PROCEDURE INSERTAR_PEDIDO;
DROP PROCEDURE MODIFICAR_PEDIDO;
DROP PROCEDURE QUITAR_PEDIDO;


--DROP PROCEDURE eliminarEncuesta;


DROP PROCEDURE altaModelo;
DROP PROCEDURE eliminarModelo;
DROP PROCEDURE actualizarModelo;


--Modelo

CREATE OR REPLACE PROCEDURE altaModelo
(w_img IN Modelos.imagen%TYPE,
w_id_usu IN Modelos.IdUsuario%TYPE,
w_Id_mod IN Modelos.IdModelista%TYPE,
w_des IN Modelos.descripcion%TYPE,
w_mini IN Modelos.minidescripcion%TYPE,
w_vid IN Modelos.enlaceVideo%TYPE,
w_prod IN Modelos.enlaceProductos%TYPE,
w_pre IN Modelos.precio%TYPE,
w_nom IN Modelos.nombre%TYPE) IS
BEGIN
INSERT INTO Modelos(IdModelo,imagen,IdUsuario,IdModelista,descripcion,minidescripcion,enlaceVideo,enlaceProductos,precio,nombre) 
VALUES (sec_mode.nextval,w_img,w_id_usu,w_id_mod,w_des,w_mini,w_vid,w_prod,w_pre,w_nom);
COMMIT WORK;
END altaModelo;
/

CREATE OR REPLACE PROCEDURE eliminarModelo
( u_IdModelo IN Modelos.IdModelo%TYPE) IS
BEGIN
  DELETE FROM modelos WHERE IdModelo = u_IdModelo;
END;
/

create or replace PROCEDURE actualizarModelo
(w_id_mode IN Modelos.IdModelo%TYPE,
w_mini IN Modelos.minidescripcion%TYPE,
w_pre IN Modelos.precio%TYPE,
w_nom IN Modelos.nombre%TYPE) IS
BEGIN
  UPDATE modelos SET  minidescripcion = w_mini, precio = w_pre, nombre = w_nom
  WHERE IdModelo = w_id_mode;
END;
/



/*
CREATE OR REPLACE PROCEDURE consultarModelo
IS CURSOR C IS
		SELECT * FROM modelos;
	w_modelos modelos%ROWTYPE;
BEGIN
OPEN C;
		FETCH C INTO w_modelos;
		DBMS_OUTPUT.PUT_LINE(RPAD('Imagen:',25) || RPAD('Nombre:', 25) || RPAD('Descripcion:', 25) || RPAD('Enlace Video:', 25)|| RPAD('Precio:', 25));
		DBMS_OUTPUT.PUT_LINE(LPAD('-', 100, '-'));
		WHILE C%FOUND LOOP 
			DBMS_OUTPUT.PUT_LINE( RPAD(w_modelos.imagen, 25) || RPAD(w_modelos.nombre, 25) || RPAD(w_modelos.descripcion, 25) || RPAD(w_modelos.enlaceVideo, 25)|| RPAD(w_modelos.precio, 25));
		FETCH C INTO w_modelos;
		END LOOP;
		CLOSE C;
	END consultarModelo;
/
*/



--Moderador
/*
CREATE OR REPLACE PROCEDURE altaModerador
(w_nom IN Moderadores.nombre%TYPE,
w_ap IN Moderadores.apellido%TYPE,
w_dni IN MODERADORES.DNI%TYPE,
w_ema IN Moderadores.email%TYPE,
w_dir IN Moderadores.direccion%TYPE,
w_fec IN Moderadores.fechanacimiento%TYPE,
w_con IN Moderadores.contraseña%TYPE ) IS
BEGIN
INSERT INTO Moderadores(IdModerador,nombre,apellido,DNI,email, direccion, fechanacimiento, contraseña) 
VALUES (sec_mod.nextval,w_nom,w_ap,w_dni,w_ema,w_dir,w_fec,w_con);

COMMIT WORK;
END altaModerador;

CREATE OR REPLACE PROCEDURE eliminarModerador
( u_IdModerador IN MODERADORES.IDMODERADOR%TYPE) IS
BEGIN 
DELETE FROM Modelistas WHERE IdModerador = u_IdModerador;
END;
/



--Usuario

CREATE OR REPLACE PROCEDURE altaUsuario
(w_nom IN Usuarios.nombre%TYPE,
w_ap IN Usuarios.apellido%TYPE,
w_dni IN Usuarios.DNI%TYPE,
w_ema IN Usuarios.email%TYPE,
w_dir IN Usuarios.direccion%TYPE,
w_fec IN Usuarios.fechanacimiento%TYPE,
w_con IN Usuarios.contraseña%TYPE ) IS
BEGIN
INSERT INTO Usuarios (IdUsuario,nombre,apellido,DNI,email, direccion, fechanacimiento, contraseña) 
VALUES (sec_usuario.nextval,w_nom,w_ap,w_dni,w_ema,w_dir,w_fec,w_con);
COMMIT WORK;
END altaUsuario;
/


CREATE OR REPLACE PROCEDURE eliminarUsuario
( u_IdUsuario IN USUARIOS.IDUSUARIO%TYPE) IS
BEGIN 
DELETE FROM Usuarios WHERE IdUsuario = u_IdUsuario;
END;
/


/*CREATE OR REPLACE PROCEDURE actualizarUsuario
(w_id_usu IN Usuarios.IdUsuario%TYPE,
w_tel IN Usuarios.telefono%TYPE,
w_con IN Usuarios.CONTRASEÑA%TYPE,
w_ema IN Usuarios.EMAIL%TYPE,
w_dir IN Usuarios.DIRECCION%TYPE,
w_fec_nac IN Usuarios.FECHANACIMIENTO%TYPE,
w_dni IN Usuarios.DNI%TYPE,
w_nomm IN Usuarios.NOMBRE%TYPE,
w_ape IN Usuarios.APELLIDO%TYPE) IS
BEGIN
  UPDATE usuarios SET imagen = w_img, IdUsuario = w_id_usu, IdModelista= w_id_mod, descripcion = w_des, enlaceVideo = w_vid, enlaceProductos = w_prod, precio = w_pre, nombre = w_nom
  WHERE IdUsuarios = w_id_usu;
END;
/

--Modelista

CREATE OR REPLACE PROCEDURE altaModelista
(w_nom IN Modelistas.nombre%TYPE,
w_ap IN Modelistas.apellido%TYPE,
w_dni IN Modelistas.DNI%TYPE,
w_ema IN Modelistas.email%TYPE,
w_dir IN Modelistas.direccion%TYPE,
w_fec IN Modelistas.fechanacimiento%TYPE,
w_con IN Modelistas.contraseña%TYPE) IS
BEGIN
INSERT INTO Modelistas (IdModelista,nombre,apellido,DNI,email, direccion, fechanacimiento, contraseña) 
VALUES (sec_modelista.nextval,w_nom,w_ap,w_dni,w_ema,w_dir,w_fec,w_con);

COMMIT WORK;
END altaModelista;

CREATE OR REPLACE PROCEDURE eliminarModelista
( u_IdModelista IN MODELISTAS.IDMODELISTA%TYPE) IS
BEGIN 
DELETE FROM Modelistas WHERE IdModelista = u_IdModelista;
END;
/



--Opcion

CREATE OR REPLACE PROCEDURE altaOpcion
(w_tit IN Opciones.titulo%TYPE,
 w_desc IN Opciones.Descripcion%TYPE) IS
BEGIN
INSERT INTO Opciones (IdOpcion,titulo,descripcion,IdUsuario) 
VALUES (sec_opciones.nextval,w_tit,w_desc,sec_usuario.nextval);

COMMIT WORK;
END añadirOpcion;

CREATE OR REPLACE PROCEDURE eliminarOpcion
( u_IdOpcion IN OPCIONES.IDOPCION%TYPE) IS
BEGIN 
DELETE FROM OPCIONES WHERE IdOpcion = u_IdOpcion;
END;
/

*/

--Propuesta

create or replace PROCEDURE INSERTAR_PROPUESTA
(w_des IN Propuestas.descripcion%TYPE,
w_ema IN PROPUESTAS.EMAIL%TYPE) IS
BEGIN
INSERT INTO Propuestas (IdPropuestas,descripcion,email) 
VALUES (sec_propuesta.nextval,w_des,w_ema);

COMMIT WORK;
END INSERTAR_PROPUESTA;

/

create or replace PROCEDURE MODIFICAR_PROPUESTA
(ID_PROPUESTA_A_MOD IN PROPUESTAS.IDPROPUESTAS%TYPE,
 DESC_PROP_A_MOD IN PROPUESTAS.DESCRIPCION%TYPE) IS
BEGIN
  UPDATE PROPUESTAS SET DESCRIPCION=DESC_PROP_A_MOD
  WHERE IDPROPUESTAS = ID_PROPUESTA_A_MOD;
END;

/

create or replace PROCEDURE QUITAR_PROPUESTA
( u_IdPropuestas IN Propuestas.IdPropuestas%TYPE) IS
BEGIN
  DELETE FROM Propuestas WHERE IdPropuestas = u_IdPropuestas;
END;


/

--Encuesta
/*

CREATE OR REPLACE PROCEDURE eliminarEncuesta
( u_IdEncuesta IN ENCUESTAS.IDENCUESTA%TYPE) IS
BEGIN 
DELETE FROM Encuestas WHERE IdEncuesta = u_IdEncuesta;
END;
/

*/

--Pedido

create or replace PROCEDURE MODIFICAR_PEDIDO
(ID_PEDIDO_A_MOD IN PEDIDOS.IDPEDIDO%TYPE,
 ESC_PED_A_MOD IN PEDIDOS.ESCALA%TYPE,
 MAT_PED_A_MOD IN PEDIDOS.MATERIAL%TYPE,
 CAL_PED_A_MOD IN PEDIDOS.CALIDADDESEADA%TYPE,
 DES_PED_A_MOD IN PEDIDOS.DESCRIPCION%TYPE,
 MET_PED_A_MOD IN PEDIDOS.METODOPAGO%TYPE,
 TEL_PED_A_MOD IN PEDIDOS.TELEFONO%TYPE,
 EMA_PED_A_MOD IN PEDIDOS.EMAIL%TYPE) IS
BEGIN
  UPDATE PEDIDOS SET ESCALA=ESC_PED_A_MOD,
  MATERIAL=MAT_PED_A_MOD,
  CALIDADDESEADA=CAL_PED_A_MOD,
  DESCRIPCION=DES_PED_A_MOD,
  METODOPAGO=MET_PED_A_MOD,
  TELEFONO=TEL_PED_A_MOD,
  EMAIL=EMA_PED_A_MOD
 
 WHERE IDPEDIDO = ID_PEDIDO_A_MOD;
END;
/

create or replace PROCEDURE QUITAR_PEDIDO
( u_IdPedido IN Pedidos.IdPedido%TYPE) IS
BEGIN
  DELETE FROM Pedidos WHERE IdPedido = u_IdPedido;
END;
/
create or replace PROCEDURE INSERTAR_PEDIDO
(w_esc IN PEDIDOS.ESCALA%TYPE,
w_mat IN PEDIDOS.MATERIAL%TYPE,
w_cal IN PEDIDOS.CALIDADDESEADA%TYPE,
w_des IN PEDIDOS.DESCRIPCION%TYPE,
w_met IN PEDIDOS.METODOPAGO%TYPE,
w_tel IN PEDIDOS.TELEFONO%TYPE,
w_ema IN PEDIDOS.EMAIL%TYPE) IS
BEGIN
INSERT INTO PEDIDOS (IdPedido,escala,material,calidaddeseada,descripcion,metodopago,telefono,email) 
VALUES (sec_pedido.nextval,w_esc,w_mat,w_cal,w_des,w_met,w_tel,w_ema);

COMMIT WORK;
END INSERTAR_PEDIDO;
/