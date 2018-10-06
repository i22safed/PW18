Create database Empleados;
use Empleados;


create table empleados
	(dni INT(8) ,
	nombreCompleto VARCHAR(64),
	estudiosSuperiores VARCHAR(16) not null,
	situacionLaboral VARCHAR(16) not null,
	email VARCHAR(32) not null,
	localidad INT(3) not null,
	fechaNacimiento date not null,
	telefono INT(14));


insert into empleados
values (30983712, 'Jose Perez Perez', 'Basicos', 'Parado','jpp@gmail.com',5,'1982-02-10',662234293);
insert into empleados
values (41867538, 'Laura Valenzuela Ferrer', 'Doctorado', 'Activo','lavafe@gmail.com',4,'1999-09-11',722657395);
insert into empleados
values (44826745, 'Pedro Jimenez Santos', 'Basicos', 'Estudiante','jimsanped@yahoo.es',4,'2000-09-10',625336491);
insert into empleados
values (30725352, 'Marta Sanchez Rodriguez', 'Ninguno', 'Parado','martita00@hotmail.com',1,'1987-01-05',654825492);
insert into empleados
values (45245264, 'Ana María Expósito Escudero', 'Superiores', 'Activo','expositoeam@yahoo.es',6,'1955-07-11',692547885);
insert into empleados
values (31075940, 'Alberto Nuñez Fernandez', 'Basicos', 'Jubilado','anfernandez@outlook.com',1,'1948-05-10',666350983);
insert into empleados
values (45374737, 'Carolina Lopez Muriel', 'Basicos', 'Activo','karolop90@hotmail.com',5,'1964-11-12',643176224);
insert into empleados
values (30852845, 'Pablo Morales Raigan', 'Doctorado', 'Activo','morapa@telefonica.es',2,'1987-03-03',677534816);
insert into empleados
values (45628436, 'Manuel Medina Alvarez', 'Superiores', 'Activo','manuelmedinalv@gmail.com',11,'1948-01-06',625826487);
insert into empleados
values (31087814, 'Luisa Cano Vega', 'Ninguno', 'Activo','louisecave@yahoo.es',3,'1945-06-04',645623736);
insert into empleados
values (45657294, 'Alvaro Diaz Gomez', 'Basicos', 'Estudiante','alvadigo@ono.es',5,'1955-08-05',757427827);
insert into empleados
values (08727847, 'Estrella Ortiz Mengual', 'Superiores', 'Jubilado','esomen@gmail.com',4,'1948-01-04',611892544);
insert into empleados
values (75648104, 'Hector Mendoza Hernandez', 'Doctorado', 'Parado','he2men@yahoo.es',1,'1482-10-10',654264027);
insert into empleados
values (80762946, 'Andres Carrasco Cruz', 'Basicos', 'Activo','andrescaracruz@yahoo.es',7,'1188-09-10',699427546);
insert into empleados
values (30559073, 'Lucia Hoyos Martin', 'Basicos', 'Parado','hoyosmalu@hotmail.com',9,'1378-03-04',721988562);
insert into empleados
values (30559074, 'Martin Hoyos Martin', 'Basicos', 'Activo','hoyosmama@hotmail.com',9,'1999-03-06',721988563);
insert into empleados
values (30559075, 'Jose Hoyos Martin', 'Superiores', 'Activo','hoyosmaj@hotmail.com',9,'1998-01-01',721988560);
