DROP TABLE Pedidos;
DROP TABLE Modelos;
DROP TABLE Modelistas;
DROP TABLE Encuestas;
DROP TABLE Opciones;
DROP TABLE Propuestas;
DROP TABLE Usuarios;
DROP TABLE Sorteos;
DROP TABLE Moderadores;



CREATE TABLE Moderadores (
    IdModerador INT,
    Nombre VARCHAR2(20) NOT NULL,
    Apellido VARCHAR2(20) NOT NULL,
    DNI VARCHAR2 (10) NOT NULL,
    Telefono NUMBER (9),
    eMail VARCHAR2(20),
    Direccion VARCHAR2(20),
    FechaNacimiento DATE NOT NULL,
    contraseña VARCHAR2 (20) NOT NULL UNIQUE,
    PRIMARY KEY (IdModerador)
    );

CREATE TABLE Sorteos (
    IdSorteo VARCHAR2(50) PRIMARY KEY,
    FechaInicio DATE NOT NULL,
    Contenido VARCHAR2 (144),
    IdModerador INT,
    FOREIGN KEY (IdModerador) REFERENCES Moderadores(IdModerador)
    );
    
CREATE TABLE Usuarios (
  IdUsuario VARCHAR2(50) NOT NULL,
  Telefono INT NOT NULL,
  Contraseña VARCHAR2(20) NOT NULL,
  Email VARCHAR2(50) NOT NULL,
  Direccion VARCHAR2(50) NOT NULL,
  FechaNacimiento DATE ,
  DNI CHAR(9) NOT NULL,
  Nombre VARCHAR2(50) NOT NULL,
  Apellido VARCHAR2(50),
  PRIMARY KEY(IdUsuario)
  );
    INSERT INTO Usuarios VALUES ('1',123456789,'123456','asdf@exam.es','Calle miraflores',null,'12332255G','Pepe','Soto');
    INSERT INTO Usuarios VALUES ('2',984654654,'123456','oqwekfj@exam.es','Calle asuncion',null,'78987654E','Pedro','Picapiedras');
    INSERT INTO Usuarios VALUES ('3',545666555,'123456','ooioqwer@exam.es','Avenida fernandez',null,'74848484R','Maria','Dolores');
    INSERT INTO Usuarios VALUES ('4',111555444,'123456','pqowkepr@exam.es','Calle austria',null,'78987654G','Rompe','Ralfh');
    INSERT INTO Usuarios VALUES ('5',789789789,'123456','plllgkkj@exam.es','Calle miraflores',null,'48789887E','Alex','Noalex');
    INSERT INTO Usuarios VALUES ('6',159444888,'123456','qwepof@exam.es','Avenida reyes catolicos',null,'22266458H','David','Broncano');
    INSERT INTO Usuarios VALUES ('7',666555444,'123456','qwpoef@exam.es','Calle tetuan',null,'45844444Q','Elena','Gomez');
    INSERT INTO Usuarios VALUES ('8',111222555,'123456','oqwpeofkj@exam.es','Calle paseo fluvial',null,'78987654R','Marta','Lorenzo');
    
 



CREATE TABLE Propuestas (
    IdPropuestas VARCHAR2(50) PRIMARY KEY,
    Descripcion VARCHAR (144),
    IdUsuario VARCHAR2(50),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios
    );

CREATE TABLE Opciones (
    IdOpcion VARCHAR2(50) PRIMARY KEY,
    Titulo VARCHAR2(20),
    Descripcion VARCHAR(20),
    IdUsuario VARCHAR (50),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios
    );

CREATE TABLE Encuestas (
    IdEncuesta NUMBER(2)PRIMARY KEY
);
  
CREATE TABLE Modelistas ( 
  IdModelista VARCHAR2(50) NOT NULL,
  Telefono INT NOT NULL,
  Contraseña VARCHAR2(20) NOT NULL,
  Email VARCHAR2(50) NOT NULL,
  Direccion VARCHAR2(50) NOT NULL,
  FechaNacimiento DATE ,
  DNI CHAR(9) NOT NULL,
  Nombre VARCHAR2(50) NOT NULL,
  Apellido VARCHAR2(50),
  PRIMARY KEY(IdModelista)
  );
  
  INSERT INTO Modelistas VALUES ('1',159753468,'asdf','modelista1@mal.sc','Avenida Alemania',null,'12654963D','Mario','Fontanero');
  INSERT INTO Modelistas VALUES ('2',777888777,'asdf','modelista2@mal.sc','Calle lola',null,'14555999F','Laura','Modelista');
  INSERT INTO Modelistas VALUES ('3',666555666,'asdf','modelista3@mal.sc','Calle bolonia',null,'87888777H','Oscar','Nogano');
  INSERT INTO Modelistas VALUES ('4',555484848,'asdf','modelista4@mal.sc','Avenida Reina mercedes',null,'12345656R','Blanca','Flor');
  
  
  

CREATE TABLE Modelos (
  IdModelo VARCHAR2(50) NOT NULL,
  Imagen BLOB ,
  IdUsuario VARCHAR2(50),
  IdModelista VARCHAR2(50),
  Descripcion VARCHAR2(100),
  EnlaceVideo VARCHAR2(50),
  EnlaceProductos VARCHAR2(50),
  Precio INT,
  Nombre VARCHAR2(50),
  PRIMARY KEY (IdModelo),
  FOREIGN KEY (IdUsuario) references Usuarios,
  FOREIGN KEY (IdModelista) references Modelistas
  );
  
     INSERT INTO Modelos VALUES ('1',null,'2','1','25cm de pura magia de Lothlórien','https://www.youtube.com/watch?v=pXRviuL6vMY','Noup',1000,'Dios');
     INSERT INTO Modelos VALUES ('2',null,'3','3','Segunda descripcion del producto','enlace video 2','enlaceproducto2',30,'Segunda Prueba');
     INSERT INTO Modelos VALUES ('3',null,'3','2','Tercera descripcion del producto','enlace video 3','enlaceproducto3',40,'Tercera Prueba');
     INSERT INTO Modelos VALUES ('4',null,'4','3','Cuarta descripcion del producto','enlace video 4','enlaceproducto4',15,'Cuarta Prueba');
     INSERT INTO Modelos VALUES ('5',null,'5','1','Quinta descripcion del producto','enlace video 5','enlaceproducto5',48,'Quinta Prueba');
     INSERT INTO Modelos VALUES ('6',null,'4','4','Sexta descripcion del producto','enlace video 6','enlaceproducto6',50,'Sexta Prueba');
     INSERT INTO Modelos VALUES ('7',null,null,'4','Septima descripcion del producto','enlace video 7','enlaceproducto7',55,'Septima Prueba');
  

CREATE TABLE Pedidos (
 IdPedido INT,
 Descripcion VARCHAR(400),
 FomaPago VARCHAR2(50),
 FechaSolicitud DATE,
 IdModelista VARCHAR2(50),
 IdUsuario VARCHAR2(50),
 pRIMARY KEY(IdPedido),
 FOREIGN KEY(IdModelista) references Modelistas(IdModelista),
 FOREIGN KEY(IdUsuario) references Usuarios(IdUsuario));
 


 
 