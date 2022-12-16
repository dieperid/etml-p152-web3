-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Fri Dec 16 09:58:31 2022 
-- * LUN file: D:\CFC\3eme-annee\Projets\P_150-web3\etml-p152-web3\db_pWeb3.lun 
-- * Schema: mld 
-- ********************************************* 


-- Database Section
-- ________________ 

DROP DATABASE IF EXISTS db_pWeb3;
CREATE DATABASE db_pWeb3;
USE db_pWeb3;

DROP USER IF EXISTS 'dbWeb3'@'localhost';
CREATE USER 'dbWeb3'@'localhost' IDENTIFIED BY 'Pa$$w0rd';
GRANT ALL PRIVILEGES ON db_pWeb3.* TO 'dbWeb3'@'localhost' WITH GRANT OPTION;

-- Tables Section
-- _____________ 

create table t_brand (
     idBrand int not null auto_increment,
     braName varchar(20) not null,
     constraint ID_t_brand_ID primary key (idBrand));

--
-- Data insertion in `t_brand`
--
INSERT INTO `t_brand` (`idBrand`, `braName`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Reebok'),
(5, 'Prada'),
(6, 'Lowa'),
(7, 'Converse'),
(8, 'Brooks');

create table t_shoes (
     idShoes int not null auto_increment,
     shoName varchar(50) not null,
     shoDesc varchar(200) not null,
     shoPrice int not null,
     shoQuantity int not null,
     shoAvgNote int not null,
	 shoImg	varchar(30)	not	null,
     fkBrand int not null,
     constraint ID_t_shoes_ID primary key (idShoes));

--
-- Data insertion in `t_shoes`
--
INSERT INTO `t_shoes` (`idShoes`, `shoName`, `shoDesc`, `shoPrice`, `shoQuantity`, `shoAvgNote`, `shoImg`, `fkBrand`) VALUES
(1, 'Brooks Trance 10', 'Elle vous offre une très bonne stabilité pour vous accompagner lors de toutes vos sorties. Grâce à son mesh aéré sur le chausson, votre pied restera au frais.', 95, 10, 4.5, 'chaussure1.jpg', 8),
(2, 'Brooks Transcend', 'La chaussure Brooks Transcend pour femme vous permet de garder votre corps naturellement aligné grâce au Ideal Heal qui décale le point de choque sous toute la surface de la semelle.', 95, 25, 3, 'chaussure2.jpg', 8),
(3, 'Converse 130114C', 'Couleur : Vert', 75, 15, 2, 'chaussure3.jpg', 7),
(4, 'Baskets Jack Purcell OX blanches', 'Baskets basses en sergé blanches. Bout rond renforcé en caoutchouc ton sur ton à rayure noire', 80, 7, 4, 'chaussure4.jpg', 7),
(5, 'Lowa CATALAN', 'La chaussure de marche Lowa CATALAN pour Hommes est une chaussure de marche de hauteur moyenne de la collection All Terrain Classic.', 199.90, 10, 2, 'chaussure5.jpg', 6),
(6, 'Chuck Taylor sneakers', '', 89.95, 10, 4.5, 'chaussure6.jpg', 7),
(7, 'Free Trainer 5.0', 'La chaussure de training Nike Free TR 5.0 offre un bon maintien tout en permettant au pied de bouger naturellement pour vous aider à répondre aux exigences des entraînements intenses.', 145, 4, 5, 'chaussure7.jpg', 1),
(8, 'Taja Commissioner', 'Elle ressemble à une chukka boot, se sent comme une sneaker et va avec tout ce que vous avez dans votre placard.', 139, 30, 2, 'chaussure8.jpg', 5);

create table t_user (
     idUser bigint not null auto_increment,
     useLogin varchar(20) not null,
     usePassword varchar(20) not null,
     useRight int not null,
     constraint ID_t_user_ID primary key (idUser));

create table t_message (
     idMessage bigint not null auto_increment,
     mesTitle varchar(30) not null,
     mesContent varchar(250) not null,
     fkUser int not null,
     constraint ID_t_message_ID primary key (idMessage));

create table t_order (
     idOrder int not null auto_increment,
     ordDelivery varchar(20) not null,
     ordPayment varchar(20) not null,
     fkUser int not null,
     constraint ID_t_order_ID primary key (idOrder));

create table t_orderShoes (
     idOrder int not null,
     idShoes int not null,
     quantity int not null,
     constraint ID_t_ordered_ID primary key (idShoes, idOrder));


-- Constraints Section
-- ___________________ 

alter table t_shoes add constraint FKhave_FK
     foreign key (fkBrand)
     references t_brand (idBrand);

alter table t_message add constraint FKwrite_FK
     foreign key (fkUser)
     references t_user (idUser);

alter table t_order add constraint FKmake_FK
     foreign key (fkUser)
     references t_user (idUser);

alter table t_orderShoes add constraint FKt_o_t_s
     foreign key (idShoes)
     references t_shoes (idShoes);

alter table t_orderShoes add constraint FKt_o_t_o_FK
     foreign key (idOrder)
     references t_order (idOrder);


-- Index Section
-- _____________ 

create unique index ID_t_brand_IND
     on t_brand (idBrand);

create unique index ID_t_shoes_IND
     on t_shoes (idShoes);

create index FKhave_IND
     on t_shoes (fkBrand);

create unique index ID_t_user_IND
     on t_user (idUser);

create unique index ID_t_message_IND
     on t_message (idMessage);

create index FKwrite_IND
     on t_message (fkUser);

create unique index ID_t_order_IND
     on t_order (idOrder);

create index FKmake_IND
     on t_order (fkUser);

create unique index ID_t_ordered_IND
     on t_orderShoes (idShoes, idOrder);

create index FKt_o_t_o_IND
     on t_orderShoes (idOrder);

