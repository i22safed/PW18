Create database Empleados;
use Empleados;


create table empleados
	(dni INT(8) ,
	imagen VARCHAR(64),
	nombreCompleto VARCHAR(64),
	estudiosSuperiores VARCHAR(16) not null,
	situacionLaboral VARCHAR(16) not null,
	email VARCHAR(32) not null,
	localidad INT(3) not null,
	fechaNacimiento date not null,
	telefono INT(14));


insert into empleados
values (30983712, '30983712.png', 'Jose Perez Perez', 'Basicos', 'Parado','jpp@gmail.com',5,'1982-02-10',662234293);
insert into empleados
values (41867538, '41867538.png', 'Laura Valenzuela Ferrer', 'Doctorado', 'Activo','lavafe@gmail.com',4,'1999-09-11',722657395);
insert into empleados
values (44826745, '44826745.png', 'Pedro Jimenez Santos', 'Basicos', 'Estudiante','jimsanped@yahoo.es',4,'2000-09-10',625336491);
insert into empleados
values (30725352, '30725352.png', 'Marta Sanchez Rodriguez', 'Ninguno', 'Parado','martita00@hotmail.com',1,'1987-01-05',654825492);
insert into empleados
values (45245264, '45245264.png', 'Ana María Expósito Escudero', 'Superiores', 'Activo','expositoeam@yahoo.es',6,'1955-07-11',692547885);
insert into empleados
values (31075940, '31075940.png', 'Alberto Nuñez Fernandez', 'Basicos', 'Jubilado','anfernandez@outlook.com',1,'1948-05-10',666350983);
insert into empleados
values (45374737, '45374737.png', 'Carolina Lopez Muriel', 'Basicos', 'Activo','karolop90@hotmail.com',5,'1964-11-12',643176224);
insert into empleados
values (30852845, '30852845.png', 'Pablo Morales Raigan', 'Doctorado', 'Activo','morapa@telefonica.es',2,'1987-03-01',677534816);
insert into empleados
values (45628436, '45628436.png', 'Manuel Medina Alvarez', 'Superiores', 'Activo','manuelmedinalv@gmail.com',11,'1948-01-01',625826487);
insert into empleados
values (31087814, '31087814.png', 'Luisa Cano Vega', 'Ninguno', 'Activo','louisecave@yahoo.es',3,'05-06-81',645623736);
insert into empleados
values (45657294, '45657294.png', 'Alvaro Diaz Gomez', 'Basicos', 'Estudiante','alvadigo@ono.es',5,'29-08-99',757427827);
insert into empleados
values (08727847, '08727847.png', 'Estrella Ortiz Mengual', 'Superiores', 'Jubilado','esomen@gmail.com',4,'23-01-53',611892544);
insert into empleados
values (75648104, '75648104.png', 'Hector Mendoza Hernandez', 'Doctorado', 'Parado','he2men@yahoo.es',1,'14-10-86',654264027);
insert into empleados
values (80762946, '80762946.png', 'Andres Carrasco Cruz', 'Basicos', 'Activo','andrescaracruz@yahoo.es',7,'11-09-92',699427546);
insert into empleados
values (30559073, '30559073.png', 'Lucia Hoyos Martin', 'Basicos', 'Parado','hoyosmalu@hotmail.com',9,'31-03-98',721988562);
insert into empleados
values (30559074, '30559074.png', 'Martin Hoyos Martin', 'Basicos', 'Activo','hoyosmama@hotmail.com',9,'01-03-96',721988563);
insert into empleados
values (30559075, '30559075.png', 'Jose Hoyos Martin', 'Superiores', 'Activo','hoyosmaj@hotmail.com',9,'22-01-93',721988560);
