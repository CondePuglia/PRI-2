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
					CodSen serial NOT NULL,
					ValorLumi float NOT NULL,
					ValorUmi float NOT NULL,
					ValorTemp float NOT NULL,
					DataCaptura varchar(50) NOT NULL,
					
		constraint pk_dadosAmb PRIMARY KEY(idDadosAmb),
		constraint fk_dados_ambiente_local FOREIGN KEY(CodSen)
		references local(CodSen)
	);


		