-- Create database Empleados;
use Empleados;


create table usuarios
	(dni INT(8) not null,
	usuario VARCHAR(32) not null,
	pass VARCHAR(32) not null, 
	rol VARCHAR(32) not null );


insert into usuarios
values (78978977,'Administrador','1234','Admin');
insert into usuarios
values (98798777,'Moderador','1234','Moder');
insert into usuarios
values (65465466,'Invitado','1234','Invi');








