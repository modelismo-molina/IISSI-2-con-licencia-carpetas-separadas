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
    Direccion VARCHAR2(50),
    FechaNacimiento DATE NOT NULL,
    contraseña VARCHAR2 (20) NOT NULL,
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
  IdUsuario VARCHAR2(50),
  Telefono INT NOT NULL,
  Contraseña VARCHAR2(20) NOT NULL,
  Email VARCHAR2(50) NOT NULL,
  Direccion VARCHAR2(50) NOT NULL,
  FechaNacimiento DATE ,
  DNI CHAR(9) NOT NULL UNIQUE,
  Nombre VARCHAR2(50) NOT NULL,
  Apellido VARCHAR2(50),
  PRIMARY KEY(IdUsuario)
  );
    
 

    


CREATE TABLE Propuestas (
    IdPropuestas VARCHAR2(50) PRIMARY KEY,
    Descripcion VARCHAR (144),
    Email VARCHAR2(50)
    );


CREATE TABLE Opciones (
    IdOpcion VARCHAR2(50) PRIMARY KEY,
    Titulo VARCHAR2(20),
    Descripcion VARCHAR(20),
    IdUsuario VARCHAR2(50),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios
    );

CREATE TABLE ENCUESTAS(
idEncuesta INT,
titulo varchar(50) NOT NULL,
fecha date NOT NULL,
PRIMARY KEY (idEncuesta)) ;



CREATE TABLE Modelistas ( 
  IdModelista INT,
  Telefono INT NOT NULL,
  Contraseña VARCHAR2(20) NOT NULL,
  Email VARCHAR2(50) NOT NULL,
  Direccion VARCHAR2(50) NOT NULL,
  FechaNacimiento DATE ,
  DNI CHAR(9) NOT NULL UNIQUE,
  Nombre VARCHAR2(50) NOT NULL,
  Apellido VARCHAR2(50),
  Motivos VARCHAR2(300),
  PRIMARY KEY(IdModelista)
  );
  

  
  

CREATE TABLE Modelos (
  IdModelo NUMBER(4),
  Imagen VARCHAR2(150),
  IdUsuario VARCHAR2(50),
  IdModelista INT,
  Descripcion VARCHAR2(2000),
  MiniDescripcion VARCHAR(100),
  EnlaceVideo VARCHAR2(150),
  EnlaceProductos VARCHAR2(150),
  Precio VARCHAR2(100),
  Nombre VARCHAR2(100),
  PRIMARY KEY (IdModelo),
  FOREIGN KEY (IdUsuario) references Usuarios,
  FOREIGN KEY (IdModelista) references Modelistas
  );
  
     

CREATE TABLE Pedidos (
 IdPedido VARCHAR2(50),
 Escala VARCHAR2(50),
 Material VARCHAR2(50),
 Calidaddeseada VARCHAR2(50),
 Descripcion VARCHAR2(3000),
 Metodopago VARCHAR2(100),
 Telefono NUMBER,
 Email VARCHAR2(50),
 PRIMARY KEY(IdPedido)
 );


 
 