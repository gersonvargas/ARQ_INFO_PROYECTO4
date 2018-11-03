/*
	-- SCRIPT DE BASE DE DATOS MYSQL 5.7
	-- ARQUITECTURA DE INFORMACIÓN
	-- PROYECTO 4, UNA 2018
	-- GERSON VARGAS & OSVALDO AGUERO
*/

/* ref_tariff_types */
INSERT INTO PHONEBILL.ref_tariff_types VALUES(1,'TariffType_01');
INSERT INTO PHONEBILL.ref_tariff_types VALUES(2,'TariffType_02');

/* Tariff */
INSERT INTO PHONEBILL.Tariffs VALUES(1,1,'Tariff_01',4,'Detail_01');
INSERT INTO PHONEBILL.Tariffs VALUES(2,2,'Tariff_02',5,'Detail_02');

/* CUSTOMER */
INSERT INTO PHONEBILL.CUSTOMER VALUES(1,'Gerson','gerson@gmail.com','En la escuela',1,'First customer!');
INSERT INTO PHONEBILL.CUSTOMER VALUES(2,'Osvaldo','osvaldo@gmail.com','En la Universidad',1,'Second customer!');
