	--Usuário
CREATE EXTENSION IF NOT EXISTS pgcrypto;

	create TABLE usuario(
					codusu serial NOT NULL,
					nome varchar(350) NOT NULL,
					email varchar(350) NOT NULL,
					senha varchar(150) NOT NULL,
			
		constraint pk_usuario PRIMARY KEY(codusu),
		CONSTRAINT email_unico UNIQUE(email)
		
		);
--Local
	create TABLE local(
					CodSen serial NOT NULL,
					CodUsu int NOT NULL,
					nameLocal varchar(350) ,
		constraint PK_local PRIMARY KEY(Codsen),
		constraint fK_local_usuario FOREIGN KEY (CodUsu)
		references usuario(CodUsu) ON DELETE CASCADE);
	
	--Dados_Ambiente
	create TABLE dados_ambiente(
					idDadosAmb serial NOT NULL,
					CodSen int NOT NULL,
					ValorLumi float NOT NULL,
					ValorUmi float NOT NULL,
					ValorTemp float NOT NULL,
					DataCaptura date NOT NULL,
					
		constraint pk_dadosAmb PRIMARY KEY(idDadosAmb),
		constraint fk_dados_ambiente_local FOREIGN KEY(CodSen)
		references local(CodSen)
	);


INSERT INTO dados_ambiente VALUES(default, 1, 500, 78,8, 22.2, '2023-10-01'),
(default, 1, 2000, 72.5, 24.7, '2023-10-02'),
(default, 1, 700, 77.5, 24, '2023-10-03'),
(default, 1, 550, 64.1, 28.6, '2023-10-04'),
(default, 1, 2100, 57.9, 30.1, '2023-10-05'),
(default, 1, 750, 61.8, 29.9, '2023-10-06'),
(default, 1, 500, 50.5, 30.4, '2023-10-07'),
(default, 1, 2000, 57.6, 28.1, '2023-10-08'),
(default, 1, 700, 55.5, 29.5, '2023-10-09'),
(default, 1, 500, 76.6, 24, '2023-10-10'),
(default, 1, 2000, 72.4, 25.7, '2023-10-11'),
(default, 1, 700, 54.2, 28.5, '2023-10-12'),
(default, 1, 550, 64, 27.8, '2023-10-13'),
(default, 1, 2100, 85.5, 22.6, '2023-10-14'),
(default, 1, 750, 83.4, 22.7, '2023-10-15'),
(default, 1, 500, 73.2, 26.3, '2023-10-16'),
(default, 1, 2000, 60, 28.3, '2023-10-17'),
(default, 1, 700, 75.1, 25.4, '2023-10-18'),
(default, 1, 500, 81.5, 21.9, '2023-10-19'),
(default, 1, 2000, 84, 20.5, '2023-10-20'),
(default, 1, 700, 86.3, 20.7, '2023-10-21'),
(default, 1, 550, 78.9, 21.9, '2023-10-22'),
(default, 1, 2100, 67.3, 24.8, '2023-10-23'),
(default, 1, 750, 61.1, 27.5, '2023-10-24'),
(default, 1, 500,74.3, 25.7, '2023-10-25'),
(default, 1, 2000, 75.2, 25.8, '2023-10-26'),
(default, 1, 700, 80.8, 25.1, '2023-10-27'),
(default, 1, 500, 77.8, 26.6, '2023-10-28'),
(default, 1, 2000, 64.4, 28.5, '2023-10-29'),
(default, 1, 700, 66.5, 28.3, '2023-10-30'),