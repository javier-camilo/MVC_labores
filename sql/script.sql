CREATE DATABASE labores_db;
USE labores_db;

CREATE TABLE labores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    labor VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    cantidad INT NOT NULL,
    tarifa DECIMAL(10,2) NOT NULL,
    empleado VARCHAR(100) NOT NULL,
    lote VARCHAR(100) NOT NULL
);

INSERT INTO labores (labor, fecha, cantidad, tarifa, empleado, lote) 
VALUES ('Siembra', '2024-02-10', 5, 20.00, 'Juan Pérez', 'Lote 1');
VALUES ('riego', '2025-02-12', 6, 200000.00, 'javier', 'lote 3');
