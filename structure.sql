CREATE TABLE ingresoadministrador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);
INSERT INTO
    ingresoadministrador (id, nombre_usuario, contrasena)
VALUES 
     (1, 'admin', '12');
    

CREATE TABLE ingresos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(10) NOT NULL,
    tarifa BIGINT NOT NULL,
    hora_ingreso BIGINT NOT NULL,
    hora_salida BIGINT DEFAULT NULL
);

INSERT INTO
    ingresos (placa, tarifa, hora_ingreso, hora_salida)
VALUES
    ('XXX-450', 5000, 1740543692, null),
    ('RTD-50D', 5000, 1740543692, null),
    ('EEE-000', 5000, 1740543692, null);