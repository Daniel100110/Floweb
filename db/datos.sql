insert into acceso (tipo_acceso,status_acceso) values 
("Cliente", "disponible"),
("Empleado", "disponible"),
("Gerente", "disponible"),
("Administrador de TI", "disponible");

insert into cuenta values
("admin@gmail.com", "admin", 4,0, "Desconectado"),
("cliente@gmail.com", "cliente", 1,0, "Desconectado"),
("florista@gmail.com", "florista", 2,0, "Desconectado"),
("gerente@gmail.com", "gerente", 3,0, "Desconectado");

-- ALTER TABLE cuenta AUTO_INCREMENT = 7;