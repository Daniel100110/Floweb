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
    saldo_cuenta float not null,
    status_cuenta varchar(50) not null,
    foreign key (no_acceso) references acceso(no_acceso)
  );

  create table datosPersonales(
    correo_cuenta varchar(60) not null,
    nom_persona varchar(60) not null,
    tel_persona varchar(13) not null,
    dir1_persona varchar(100) not null,
    dir2_persona varchar(100) not null,
    estado_persona varchar(100) not null,
    ciudad_persona varchar(100) not null,
    cp_persona int not null,
    foreign key (correo_cuenta) references cuenta(correo_cuenta)
  );
  
  create table producto(
    no_producto int primary key not null AUTO_INCREMENT,
    nom_producto varchar(50) not null,
    cantidad_producto int not null,
    precio_producto float not null,
    foto_producto varchar(100) not null,
    status_producto varchar(50) not null
  );

  create table carrito(
    correo_cuenta varchar(60),
    no_producto int not null,
    cantidad int not null,
    precio float not null,
    status_carrito varchar(50) not null,
    foreign key (correo_cuenta) references cuenta(correo_cuenta),
    foreign key (no_producto) references producto(no_producto)
  );

  create table pedido(
    no_pedido int primary key not null AUTO_INCREMENT,
    correo_cuenta varchar(60),
    lista_productos varchar(100),
    subtotal_pedido float not null,
    iva_pedido float not null,
    total_pedido float not null,
    nom_persona varchar(60) not null,
    tel_persona varchar(13) not null,
    dir1_persona varchar(100) not null,
    dir2_persona varchar(100) not null,
    estado_persona varchar(100) not null,
    ciudad_persona int not null,
    cp_persona int not null,
    foreign key (correo_cuenta) references cuenta(correo_cuenta)
  );

  create table cupones(
    codigo_cupon varchar(16) primary key not null,
    status_cupon varchar(20)
  );
