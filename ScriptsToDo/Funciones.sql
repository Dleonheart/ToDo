CREATE OR REPLACE FUNCTION FU_PORCENTAJE_PROGRESO (pk_proyecto IN PROYECTO.K_PROYECTO%TYPE) RETURN NUMBER IS
	--Declaracion de las variables
	--Numero de tareas asociadas al proyecto
	lq_tareas NUMBER:=0; 
	--CURSOR que obtiene todas las tareas relacionadas al proyecto, al igual que su prioridad, estado y 
		--las agrupoa por prioridad y estado de la tarea
	CURSOR c_tareas IS
		SELECT t.Q_PRIORIDAD, t.ESTADOTAR, COUNT(t.Q_PRIORIDAD) AS CANTIDAD 
			FROM TAREA t 
			WHERE t.K_PROYECTO = pk_proyecto 
			GROUP BY t.Q_PRIORIDAD, t.ESTADOTAR 
			ORDER BY t.Q_PRIORIDAD;	

	--Variable local a la cual se le asigna el valor calculado del porcentaje de progreso y se retorna
	l_sumatoriaT NUMBER := 0;

	BEGIN

		--Loop que recorre el cursor para calcular el numero total de tareas, sabiendo que poseen un valor segun su número
			--de prioridad
		FOR l_fila IN c_tareas LOOP
			lq_tareas := lq_tareas + (l_fila.Q_PRIORIDAD * l_fila.CANTIDAD);
		END LOOP;

		--Loop que consulta el porcentaje de progreso teniendo en cuenta unicamente las tareas que su estado indica
			--que ya fueron realizadas
		FOR l_fila IN c_tareas LOOP
			IF l_fila.ESTADOTAR = 1 THEN
				l_sumatoriaT := (l_sumatoriaT + ((l_fila.Q_PRIORIDAD*l_fila.CANTIDAD)/lq_tareas));
			END IF;
		END LOOP;

	--Retorno de la variable l_sumatoriaT
	RETURN l_sumatoriaT;

END FU_PORCENTAJE_PROGRESO;
/


--Funcionque recibe el codigo del empleado como variable de entrada
CREATE OR REPLACE FUNCTION FU_EMPPARTICIPACION (pk_empleado IN EMPLEADO.K_EMPLEADO%TYPE) RETURN NUMBER IS
--Declaracion de variables 
	--Variable local que va a contener el porcentaje de participación del empleado
	l_porcentajepar NUMBER := 0;

	--Variables que contienen el numero de proyectos creados por el empleado y el numero de proyectos en total de la empresa
	l_proyectos NUMBER; l_totalp NUMBER; 
	--Variables que contienen el numero de areas a cargo del empleado y el numero de areas en total de la empresa
	l_areas NUMBER; l_totala NUMBER; 
	--Variables que contienen el numero de tareas del empleado y el numero de tareas en total de la empresa
	l_tareas NUMBER; l_totalt NUMBER;	

	BEGIN
		--Selects que realizan la consulta de todas las variables descritas anteriormente relacionadas con el empreado		
		SELECT COUNT(p.K_PROYECTO) INTO l_proyectos FROM PROYECTO p WHERE p.K_EMPLEADO = pk_empleado;
		SELECT COUNT(p.K_PROYECTO) INTO  l_totalp FROM PROYECTO p;

		SELECT COUNT(a.K_AREA) INTO l_areas FROM AREA a WHERE a.K_EMPLEADO = pk_empleado;
		SELECT COUNT(a.K_AREA) INTO l_totala FROM AREA a;

		SELECT COUNT(t.K_TAREA) INTO l_tareas FROM TAREA t WHERE t.K_EMPLEADO = pk_empleado;
		SELECT COUNT(t.K_AREA) INTO l_totalt FROM TAREA t;

		--Se calcula el porcentaje de participacion deel codigo del empleado
		l_porcentajepar := ((l_proyectos*3)+(l_areas*2)+l_tareas)/((l_totalp*3)+(l_totala)*2+l_totalt);
		
	--Se retorna la variable l_porcentajepar, la cual contiene el porcentaje de participación del empleado cuyo codigo se paso
	-- a la función de forma inicial	
	RETURN l_porcentajepar;

END FU_EMPPARTICIPACION;
/