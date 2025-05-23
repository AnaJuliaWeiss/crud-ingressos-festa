CREATE DATABASE festa;
USE festa;

CREATE TABLE ingressos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    evento VARCHAR(100) NOT NULL,
    data_evento DATE NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    comprovante VARCHAR(255)
);
