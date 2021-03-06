Create database Empleados;
use Empleados;


create table empleados
	(dni INT(8) not null,
	imagen VARCHAR(64),
	nombreCompleto VARCHAR(64) not null,
	sexo VARCHAR(16) not null,
	estudiosSuperiores VARCHAR(16) not null,
	certificaciones VARCHAR(7),
	situacionLaboral VARCHAR(16) not null,
	email VARCHAR(32) not null,
	localidad INT(3) not null,
	fechaNacimiento date not null,
	telefono INT(14),
	constraint ck_sexo CHECK (sexo in ('Hombre','Mujer','Otro')));


insert into empleados
values (30983712,'30983712.png','Jose Perez Perez','Hombre','Basicos','0000000','Parado','jpp@gmail.com',5,'1982-02-10',662234293);
insert into empleados
values (41867538,'41867538.png','Laura Valenzuela Ferrer','Mujer','Doctorado','0000000','Activo','lavafe@gmail.com',4,'1999-09-11',722657395);
insert into empleados
values (44826745,'44826745.png','Pedro Jimenez Santos','Hombre','Basicos','0000000','Estudiante','jimsanped@yahoo.es',4,'2000-09-10',625336491);
insert into empleados
values (30725352,'30725352.png','Marta Sanchez Rodriguez','Mujer','Ninguno','0000000','Parado','martita00@hotmail.com',1,'1987-01-05',654825492);
insert into empleados
values (45245264,'45245264.png','Ana María Expósito Escudero','Mujer','Superiores','0000000','Activo','expositoeam@yahoo.es',5,'1955-07-11',692547885);
insert into empleados
values (31075940,'31075940.png','Alberto Nuñez Fernandez','Hombre','Basicos','0000000','Jubilado','anfernandez@outlook.com',1,'1948-05-10',666350983);
insert into empleados
values (45374737,'45374737.png','Carolina Lopez Muriel','Mujer','Basicos','0000000','Activo','karolop90@hotmail.com',5,'1964-11-12',643176224);
insert into empleados
values (30852845,'30852845.png','Pablo Morales Raigan','Hombre','Doctorado','0000000','Activo','morapa@telefonica.es',2,'1987-03-01',677534816);
insert into empleados
values (45628436,'45628436.png','Manuel Medina Alvarez','Hombre','Superiores','0000000','Activo','manuelmedinalv@gmail.com',3,'1948-01-01',625826487);
insert into empleados
values (31087814,'31087814.png','Luisa Cano Vega','Mujer','Ninguno','0000000','Activo','louisecave@yahoo.es',3,'1955-06-03',645623736);
insert into empleados
values (45657294,'45657294.png','Alvaro Diaz Gomez','Hombre','Basicos','0000000','Estudiante','alvadigo@ono.es',5,'1929-08-19',757427827);
insert into empleados
values (18727847,'08727847.png','Estrella Ortiz Mengual','Otro','Superiores','0000000','Jubilado','esomen@gmail.com',4,'1923-01-23',611892544);
insert into empleados
values (75648104,'75648104.png','Hector Mendoza Hernandez','Hombre','Doctorado','0000000','Parado','he2men@yahoo.es',1,'1914-10-16',654264027);
insert into empleados
values (80762946,'80762946.png','Andres Carrasco Cruz','Hombre','Basicos','0000000','Activo','andrescaracruz@yahoo.es',5,'1911-09-12',699427546);
insert into empleados
values (30559073,'30559073.png','Lucia Hoyos Martin','Otro','Basicos','0000000','Parado','hoyosmalu@hotmail.com',1,'1931-03-18',721988562);
insert into empleados
values (30559074,'30559074.png','Martin Hoyos Martin','Hombre','Basicos','0000000','Activo','hoyosmama@hotmail.com',4,'1901-03-06',721988563);
insert into empleados
values (30559075,'30559075.png','Jose Hoyos Martin','Hombre','Superiores','0000000','Activo','hoyosmaj@hotmail.com',3,'1922-01-03',721988560);





