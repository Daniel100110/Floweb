insert into acceso (tipo_acceso,status_acceso) values 
("Cliente", "disponible"),
("Empleado", "disponible"),
("Gerente", "disponible"),
("Administrador de TI", "disponible");

insert into cuenta (correo_cuenta,contra_cuenta,no_acceso,status_cuenta)values
("admin@gmail.com", "admin", 4, "online"),
("cliente@gmail.com", "cliente", 1, "online"),
("florista@gmail.com", "florista", 2, "online"),
("gerente@gmail.com", "gerente", 3, "online");

-- ALTER TABLE cuenta AUTO_INCREMENT = 7;