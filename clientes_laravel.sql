DROP DATABASE IF EXISTS clientes_laravel;
CREATE DATABASE IF NOT EXISTS clientes_laravel;
use clientes_laravel;
select * from clients;
DESCRIBE clients;
INSERT INTO clients (first_name, last_name, phone_number, email, address) VALUES
('Ana', 'Pérez', '555-0101', 'ana.perez@email.com', 'Calle Sol 123'),
('Luis', 'García', '555-0102', 'luis.garcia@email.com', 'Calle Luna 234'),
('María', 'López', '555-0103', 'maria.lopez@email.com', 'Avenida Estrella 345'),
('Carlos', 'Sánchez', '555-0104', 'carlos.sanchez@email.com', 'Boulevard Oriente 456'),
('Lucía', 'Morales', '555-0105', 'lucia.morales@email.com', 'Calle Río 567'),
('Jorge', 'Torres', '555-0106', 'jorge.torres@email.com', 'Calle Bosque 678'),
('Elena', 'Ruiz', '555-0107', 'elena.ruiz@email.com', 'Avenida Montaña 789'),
('Daniel', 'Castro', '555-0108', 'daniel.castro@email.com', 'Calle Volcán 890'),
('Isabel', 'Ortiz', '555-0109', 'isabel.ortiz@email.com', 'Calle Océano 901'),
('David', 'Gómez', '555-0110', 'david.gomez@email.com', 'Avenida Tierra 012');
