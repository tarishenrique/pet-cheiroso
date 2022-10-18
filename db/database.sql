
CREATE TABLE cliente(
    cliente_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(100)
    
);


CREATE TABLE especie(
    especie_id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(100)
); 

CREATE TABLE raca(
    raca_id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(100) ,
    especie_id int,
    FOREIGN KEY(especie_id) REFERENCES especie(especie_id)
); 

CREATE TABLE pet(
    pet_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE,
    macho_femea VARCHAR(100),
    peso FLOAT,
    cor VARCHAR(100),
    obs VARCHAR(255),
    especie_id int,
    raca_id INT,
    cliente_id INT,
    FOREIGN KEY(especie_id) REFERENCES especie(especie_id),
    FOREIGN KEY(raca_id) REFERENCES raca(raca_id),
    FOREIGN KEY(cliente_id) REFERENCES cliente(cliente_id)
); 

CREATE TABLE tipo_agendamento(
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(100)
); 

CREATE TABLE agendamento(
    agendamentos_id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    eventos_data DATE NOT NULL,
    pet_id INT,
    cliente_id INT,
    tipo_agendamento_id int,
    FOREIGN KEY(pet_id) REFERENCES pet(pet_id),
    FOREIGN KEY(cliente_id) REFERENCES cliente(cliente_id),
    FOREIGN KEY(tipo_agendamento_id) REFERENCES tipo_agendamento(id)
);

insert into especie (descricao) values
('Cachorro'),
('Gato'),
('Passaro');

insert into raca (descricao, especie_id) values
('Sem Raça Definida', 1),
('Shih Tzu', 1),
('Yorkshire', 1),
('Poodle', 1),
('Lhasa Apso', 1),
('Buldogue Francês', 1),
('Pinscher', 1),
('Golden Retriever', 1),
('Spitz Alemão', 1),
('Maltês', 1),
('Rottweiler', 1),
('Pug', 1),
('Pastor Alemão', 1),
('Yorkshire Terrier', 1),
('Border Collie', 1),
('Labrador', 1),
('Dachshund - Salsicha', 1),
('Sem Raça Definida', 2),
('Persa', 2),
('Siamês', 2),
('Maine Coon', 2),
('Angorá', 2),
('Sphynx', 2),
('Ragdoll', 2),
('Ashera', 2),
('American Shorthair', 2),
('Himalaia', 2);

