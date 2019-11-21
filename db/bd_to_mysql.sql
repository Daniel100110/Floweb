create database Floweb;
  use Floweb;

  create table acceso(
    no_acceso int primary key not null AUTO_INCREMENT,
    tipo_acceso varchar(35),
    status_acceso varchar(50) not null
  );

  create table cuenta(
    correo_cuenta varchar(60) primary key not null,
    contra_cuenta varchar(55) not null,
    no_acceso int not null,
    status_cuenta varchar(50) not null,
    foreign key (no_acceso) references acceso(no_acceso)
  );

  create table datosPersonales(
    no_registro int primary key not null AUTO_INCREMENT,
    correo_cuenta varchar(60),
    nom_completo varchar(255) not null,
    tel_usuario varchar(15) not null,
    dir1_usuario varchar(75) not null,
    dir2_usuario varchar(75) not null,
    saldo_usuario int not null,
    foreign key (correo_cuenta) references cuenta(correo_cuenta)
  );
  
  create table producto(
    no_producto int primary key not null AUTO_INCREMENT,
    nom_producto varchar(50) not null,
    cantidad_producto int not null,
    precio_producto int not null,
    foto_producto varchar(100) not null,
    status_producto varchar(50) not null
  );

  create table carrito(
    correo_cuenta varchar(60),
    no_producto int not null,
    cantidad int not null,
    precio int not null,
    status_carrito varchar(50) not null,
    foreign key (correo_cuenta) references cuenta(correo_cuenta),
    foreign key (no_producto) references producto(no_producto)
  );

  create table pedido(
    no_pedido int primary key not null AUTO_INCREMENT,
    correo_cuenta varchar(60),
    lista_productos varchar(100),
    subtotal_pedido float,
    iva_pedido float,
    total_pedido float,
    foreign key (correo_cuenta) references cuenta(correo_cuenta)
  );

