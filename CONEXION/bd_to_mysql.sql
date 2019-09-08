create database Floweb2;
  use Floweb2;

  create table acceso(
    no_acceso int primary key not null,
    tipo_acceso varchar(35),
    status_acceso varchar(30)
  );

    create table cuenta(
    no_cuenta int primary key not null,
    nom_usuario varchar(50),
    apll_paterno varchar(35),
    apll_materno varchar(35),
    tel_usuario varchar(30),
    dir_usuario varchar(75),
    correo_cuenta varchar(55),
    contra_cuenta varchar(55),
    no_acceso int not null,
    foreign key (no_acceso) references acceso(no_acceso),
    status_cuenta varchar(30)
  );

    create table material(
    no_material int primary key not null,
    nom_material varchar(50),
    cant_material INT,
    status_material varchar(30)
  );


  create table producto(
    no_producto int primary key not null,
    foto_producto varchar(100),
    nom_producto varchar(50),
    precio_producto int,
    cantidad_producto int,
    status_producto varchar(30)
  );

  create table fabricacion(
    no_lista int primary key not null,
    no_material int not null,
    cant_material int,
    no_producto int not null,
    foreign key (no_material) references material(no_material),
    foreign key (no_producto) references producto(no_producto)
  );

  create table carrito(
    no_carrito int primary key not null,
    no_cuenta int,
    status_carrito varchar(30),
    foreign key(no_cuenta) references cuenta(no_cuenta)
  );

  create table carrito_producto(
    no_carrito_producto int primary key not null,
    no_producto int,
    cantidad int,
    no_carrito int,
    foreign key (no_producto) references producto(no_producto),
    foreign key (no_carrito) references carrito(no_carrito)
  );

  create table iva(
    no_iva int primary key not null,
    cantidad_iva float,
    status_iva varchar(30)
  );

  create table pedido(
    no_pedido int primary key not null,
    no_carrito int,
    precio_subtotal float,
    no_iva int,
    precio_total float,
    status_pedido varchar(30),
    foreign key (no_iva) references iva(no_iva),
    foreign key (no_carrito) references carrito(no_carrito)
  );
