CREATE TABLE PRODUCTO(
	codigo int not null AUTO_INCREMENT,
	nombre varchar(50) null,
	descripcion varchar(100) null,
	precio numeric(6,2) null,
	estado int null,
	imagen varchar(100) null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codigo)
);

--alter table PRODUCTO add rutimapro varchar(100) null;

INSERT INTO PRODUCTO (nombre,descripcion,precio,estado, imagen)
VALUES ('Teclado Full','Teclado tamaño completo, con un chasis de aluminio, teclas de PBT tipo retro y switches clicky.','295',1,'Full.jpg')
,('Teclado 40','Teclado 40%, en un chasis de aluminio, teclas de PBT y switches clicky.','115',1,'40.jpg')
,('Teclado 60','Teclado 60%, con un chasis de madera que incluye resposa muñecas, teclas de PBT y switches lineales.','149',1,'60.jpg')
,('Teclado 75','Teclado ten-key-less, en chasis de aluminio anodizado,teclas de PBT (SA CHALK) y switches tactiles.','225',1,'75.jpg');