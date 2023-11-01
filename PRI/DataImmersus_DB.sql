	--Usuário
	create TABLE usuario(
					codusu serial NOT NULL,
					nome varchar(350) NOT NULL,
					email varchar(350) NOT NULL UNIQUE,
					senha varchar(150) NOT NULL,
			
		constraint PK_Usu PRIMARY KEY(codusu));
	--Local
	create TABLE local(
					CodSen serial NOT NULL,
					CodUsu int NOT NULL,
					nameLocal varchar(350) ,
		constraint PK_local PRIMARY KEY(Codsen),
		constraint PK_local_Usu FOREIGN KEY (CodUsu)
		references usuario(CodUsu));
	
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


INSERT INTO dados_ambiente VALUES(default,4,3500,70,29,'2023-11-01'),
													 (default,4,3426,62.9,28,'2023-11-02'),
													 (default,4,3386,60,29,'2023-11-03'),
													 (default,4,3100,59.28,29,'2023-11-04'),
													 (default,4,2956,57,27,'2023-11-05'),
													 (default,4,2755,50,22,'2023-11-06'),
													 (default,4,2800,65,19,'2023-11-07'),
													 (default,4,2500,72.5,22,'2023-11-08'),
													 (default,4,2400,80,26,'2023-11-09'),
													 (default,4,1000,75,30,'2023-11-10'),
													 (default,4,600,72.5,32,'2023-11-11'),
													 (default,4,3426,62.9,28,'2023-11-12'),
													 (default,4,3386,60,29,'2023-11-13'),
													 (default,4,3100,59.28,29,'2023-11-14'),
													 (default,4,2956,57,27,'2023-11-15'),
													 (default,4,2755,50,22,'2023-11-16'),
													 (default,4,2800,65,19,'2023-11-17'),
													 (default,4,2500,72.5,22,'2023-11-18'),
													 (default,4,2400,80,26,'2023-11-19'),
													 (default,4,1000,75,30,'2023-11-20'),
													 (default,4,600,72.5,32,'2023-11-21'),
													 (default,4,3426,62.9,28,'2023-11-22'),
													 (default,4,3386,60,29,'2023-11-23'),
													 (default,4,3100,59.28,29,'2023-11-24'),
													 (default,4,2956,57,27,'2023-11-25'),
													 (default,4,2755,50,22,'2023-11-26'),
													 (default,4,2800,65,19,'2023-11-27'),
													 (default,4,2500,72.5,22,'2023-11-28'),
													 (default,4,2800,65,19,'2023-11-29'),
													 (default,4,2500,72.5,22,'2023-11-30');
											
												

		