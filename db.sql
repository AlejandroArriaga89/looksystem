CREATE TABLE tipo_consumible(
    id_tipo_consumible serial primary key,
    tipo_consumible varchar(100)
);
CREATE TABLE proveedor_consumible(
    id_proveedor_consumible serial primary key,
    proveedor_consumible varchar(100),
    telefono varchar(15),
    direccion_web varchar(255)
);
CREATE TABLE consumible(
    id_consumible SERIAL PRIMARY KEY,
    id_tipo_consumible INT REFERENCES tipo_consumible(id_tipo_consumible),
    cantidad INT,
    color varchar(100),
    id_proveedor_consumible INT references proveedor_consumible(id_proveedor_consumible)
);
CREATE TABLE puesto(
    id_puesto SERIAL PRIMARY KEY,
    puesto varchar(100)
);
CREATE TABLE empleado(
    id_empleado SERIAL PRIMARY KEY,
    nombre varchar(255),
    id_puesto INT REFERENCES puesto(id_puesto),
    usuario varchar(100),
    contrasenia varchar(32)
);
INSERT INTO puesto (puesto)
VALUES ('ADMINISTRADOR');
INSERT INTO empleado(NOMBRE, ID_PUESTO, USUARIO, CONTRASENIA)
VALUES ('ALEJANDRO', 1, 'ADMIN_ALEX', md5('ADMIN_ALEX'));
CREATE TABLE historial(
    id_historial SERIAL PRIMARY KEY,
    fecha timestamp,
    accion varchar(100),
    id_empleado int references empleado(id_empleado)
);
CREATE TABLE historial_consumible(
    id_historial int references historial(id_historial),
    id_consumible INT REFERENCES consumible(id_consumible),
    cantidad INT
);
CREATE TABLE tipo_prenda(
    id_tipo_prenda serial primary key,
    tipo_prenda varchar(100)
);
CREATE TABLE proveedor_prenda(
    id_proveedor_prenda serial primary key,
    proveedor_prenda varchar(100),
    telefono varchar(15),
    direccion_web varchar(255)
);
CREATE TABLE prenda(
    id_prenda SERIAL PRIMARY KEY,
    id_tipo_prenda INT REFERENCES tipo_prenda(id_tipo_prenda),
    cantidad INT,
    talla varchar(10),
    id_proveedor_prenda INT references proveedor_prenda(id_proveedor_prenda),
    color varchar(100)
);
CREATE TABLE orden(
    id_orden serial primary key,
    fecha_entrega timestamp,
    fecha_orden timestamp,
    id_prenda int references prenda(id_prenda),
    status varchar(50),
    id_historial int references historial(id_historial)
);
CREATE TABLE prenda_orden(
    id_prenda int references prenda(id_prenda),
    id_orden int references orden(id_orden)
);
CREATE TABLE configuracion (
    id_configuracion SERIAL PRIMARY KEY,
    id_empleado INT references empleado(id_empleado),
    stock_minimo INT default 5
);
DROP TABLE configuracion;
/ / Intermedio
INSERT INTO proveedor_consumible(PROVEEDOR_CONSUMIBLE, TELEFONO, DIRECCION_WEB)
VALUES ('', '', '');
SELECT *
FROM proveedor_consumible;
INSERT INTO tipo_consumible(tipo_consumible)
VALUES ('tinta'),
    ('vinyl');
INSERT INTO tipo_prenda(tipo_prenda)
VALUES ('Playera'),
    ('Hoodie'),
    ('Gorra');
SELECT *
FROM consumible
    JOIN proveedor_consumible pc on pc.id_proveedor_consumible = consumible.id_proveedor_consumible
    JOIN tipo_consumible tc on tc.id_tipo_consumible = consumible.id_tipo_consumible;
INSERT INTO consumible(
        id_tipo_consumible,
        cantidad,
        color,
        id_proveedor_consumible
    )
VALUES ();
DELETE FROM consumible
WHERE id_consumible = 1;
SELECT *
FROM prenda
    JOIN tipo_prenda tp on prenda.id_tipo_prenda = tp.id_tipo_prenda
    JOIN proveedor_prenda pp on pp.id_proveedor_prenda = prenda.id_proveedor_prenda;
INSERT INTO prenda (
        id_tipo_prenda,
        cantidad,
        talla,
        id_proveedor_prenda,
        color
    )
VALUES ();
SELECT *
FROM configuracion;
SELECT *
FROM empleado;
INSERT INTO historial(fecha, accion, id_empleado)
VALUES (now(), '', 1);
INSERT INTO historial_consumible(id_historial, id_consumible, cantidad)
VALUES (,,);
UPDATE configuracion
SET stock_minimo = 6
WHERE id_empleado = 1;
insert into configuracion(id_empleado)
VALUES (1)
SELECT *
FROM historial_consumible
    JOIN historial h on h.id_historial = historial_consumible.id_historial
    JOIN consumible c on c.id_consumible = historial_consumible.id_consumible
    JOIN empleado e on e.id_empleado = h.id_empleado
    JOIN proveedor_consumible pc on c.id_proveedor_consumible = pc.id_proveedor_consumible;