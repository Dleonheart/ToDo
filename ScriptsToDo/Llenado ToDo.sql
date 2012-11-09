-- EMPLEADO --

--DP
INSERT INTO EMPLEADO VALUES (1,'Carlos Ernesto','Saenz Vega','CC','1023456098','DP','A');
INSERT INTO EMPLEADO VALUES (2,'David Fernando','Castañeda Sanchez','CC','1000456034','DP','A');
INSERT INTO EMPLEADO VALUES (3,'Diego Armando','Castaño Castiblanco','CC','1029151098','DA','A');
INSERT INTO EMPLEADO VALUES (4,'Camilo','Mojica Pisciotti','CC','1980456092','PP','A');
INSERT INTO EMPLEADO VALUES (5,'Pedro Andres','Pineda Romero','CC','1091006098','DA','A');
INSERT INTO EMPLEADO VALUES (6,'Maria Catalina','Lopez Castilla','CC','1021580098','DA','A');
INSERT INTO EMPLEADO VALUES (7,'Juan Sebastian','Pumarejo Rosales','CC','1122560078','I','A');
INSERT INTO EMPLEADO VALUES (8,'Jesus','Niño Divino','CC','1020701238','PP','A');
INSERT INTO EMPLEADO VALUES (9,'Luisa Fernanda','Reyes Aguilar','CC','1903346098','PP','A');
INSERT INTO EMPLEADO VALUES (10,'Miriam','Gallo Romero','CC','1034091280','PP','A');
INSERT INTO EMPLEADO VALUES (11,'Sergio','Puulido Rojas','CC','1122561178','I','A');
INSERT INTO EMPLEADO VALUES (12,'Sandra Patricia','Pinzon Duarte','CC','1000560078','I','A');


-- PROYECTO --

INSERT INTO PROYECTO VALUES (1,1,'Desarrollo aplicacion Web ToDO',to_date('2012/02/15','yyyy/mm/dd'),to_date('2012/11/25','yyyy/mm/dd'),'A');
INSERT INTO PROYECTO VALUES (2,2,'Desarrollo plan de negocio para venta de Zimbra',to_date('2011/07/18','yyyy/mm/dd'),to_date('2012/09/02','yyyy/mm/dd'),'DB');
INSERT INTO PROYECTO VALUES (3,1,'Desarrollo proyecto de tesis Universidad Distrital',to_date('2012/10/14','yyyy/mm/dd'),to_date('2013/08/25','yyyy/mm/dd'),'A');
INSERT INTO PROYECTO VALUES (4,2,'Desarrollo aplicacion Web para el cambio de papel a moneditas de oro',to_date('2011/11/08','yyyy/mm/dd'),to_date('2013/01/15','yyyy/mm/dd'),'A');



-- AREA --
--(PROYECTO, AREA, EMPLEADO, NOMBRE)

-- PROYECTO1 --
INSERT INTO AREA VALUES(1,1,1,'Direccion');
INSERT INTO AREA VALUES(1,2,3,'Interfaz Grafica');
INSERT INTO AREA VALUES(1,3,6,'Desarrollo');

-- PROYECTO2 --
INSERT INTO AREA VALUES(2,4,2,'Direccion');
INSERT INTO AREA VALUES(2,5,5,'Auditoria');

-- PROYECTO3 --
INSERT INTO AREA VALUES(3,6,1,'Direccion');
INSERT INTO AREA VALUES(3,7,3,'Auditoria');
INSERT INTO AREA VALUES(3,8,5,'Desarrollo');
INSERT INTO AREA VALUES(3,9,6,'Bases de Datos');

-- PROYECTO4 --
INSERT INTO AREA VALUES(4,10,2,'Direccion');

-- TAREA --
--(kTAREA, kEMPLADO, kPROYECTO, kAREA, DESCRIPCION, PRIORIDAD,ESTADO)

INSERT INTO TAREA VALUES(1,10,1,1,'Reunir informacion',2,0);
INSERT INTO TAREA VALUES(2,4,1,2,'Reclutar personal capacitado',5,1);
INSERT INTO TAREA VALUES(3,9,1,3,'Reunir informacion',4,1);
INSERT INTO TAREA VALUES(4,8,2,4,'Calcular costos a largo plazo',1,1);
INSERT INTO TAREA VALUES(5,4,2,5,'Evaulacion de resultados actuales',3,0);
INSERT INTO TAREA VALUES(6,9,3,6,'Reunir informacion',5,1);
INSERT INTO TAREA VALUES(7,8,3,7,'Despedir a alguien',1,0);
INSERT INTO TAREA VALUES(8,8,3,8,'Mejorar el desarrollo hasta ahora',2,1);
INSERT INTO TAREA VALUES(9,4,3,9,'Reunir informacion',4,1);
INSERT INTO TAREA VALUES(10,8,3,7,'Disminuir el costo de los porocesos',3,1);
INSERT INTO TAREA VALUES(11,4,4,10,'Reclutar personal capacitado',2,1);
INSERT INTO TAREA VALUES(12,5,3,8,'Reunir informacion',4,1);
INSERT INTO TAREA VALUES(13,4,1,2,'Disminuir el costo de los porocesos',5,1);
INSERT INTO TAREA VALUES(14,9,1,3,'Reunir informacion',2,0);
INSERT INTO TAREA VALUES(15,8,2,5,'Reclutar personal capacitado',4,0);
INSERT INTO TAREA VALUES(16,7,1,2,'Reunir informacion',2,1);
INSERT INTO TAREA VALUES(17,4,3,9,'Reclutar personal capacitado',3,0);
