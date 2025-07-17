-- SQL Server script to create initial tables

CREATE TABLE usuarios (
    id INT IDENTITY PRIMARY KEY,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas (
    id INT IDENTITY PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    vencimento DATE,
    prioridade VARCHAR(50),
    status VARCHAR(50),
    topico_id INT,
    pasta_id INT
);

CREATE TABLE topicos (
    id INT IDENTITY PRIMARY KEY,
    nome VARCHAR(255)
);

CREATE TABLE pastas (
    id INT IDENTITY PRIMARY KEY,
    nome VARCHAR(255)
);

CREATE TABLE pessoas (
    id INT IDENTITY PRIMARY KEY,
    nome VARCHAR(255)
);

CREATE TABLE interessados (
    tarefa_id INT NOT NULL,
    pessoa_id INT NOT NULL,
    PRIMARY KEY (tarefa_id, pessoa_id)
);
GO
