CREATE OR REPLACE FUNCTION FU_PORCENTAJE_PROGRESO (pk_proyecto IN PROYECTO.K_PROYECTO%TYPE) RETURN NUMBER IS
	--Declaracion de las variables
	--Numero de tareas asociadas al proyecto
	lq_tareas NUMBER:=0; 

	CURSOR c_tareas IS
		SELECT t.Q_PRIORIDAD, t.ESTADOTAR, COUNT(t.Q_PRIORIDAD) AS CANTIDAD 
			FROM TAREA t 
			WHERE t.K_PROYECTO = pk_proyecto 
			GROUP BY t.Q_PRIORIDAD, t.ESTADOTAR 
			ORDER BY t.Q_PRIORIDAD;	

	l_sumatoriaT NUMBER := 0;

	BEGIN

		FOR l_fila IN c_tareas LOOP
			lq_tareas := lq_tareas + (l_fila.Q_PRIORIDAD * l_fila.CANTIDAD);
		END LOOP;

		DBMS_OUTPUT.PUT_LINE('Sumatoria de tareas y prioridad'||lq_tareas);

		FOR l_fila IN c_tareas LOOP
			IF l_fila.ESTADOTAR = 1 THEN
				l_sumatoriaT := (l_sumatoriaT + ((l_fila.Q_PRIORIDAD*l_fila.CANTIDAD)/lq_tareas));
			END IF;
		END LOOP;

	RETURN l_sumatoriaT;

END FU_PORCENTAJE_PROGRESO;
/

CREATE OR REPLACE FUNCTION FU_EMPPARTICIPACION (pk_empleado IN EMPLEADO.K_EMPLEADO%TYPE) RETURN NUMBER IS

	l_porcentajepar NUMBER := 0;

	l_proyectos NUMBER; l_totalp NUMBER; l_areas NUMBER; l_totala NUMBER; l_tareas NUMBER; l_totalt NUMBER;	

	BEGIN		
		SELECT COUNT(p.K_PROYECTO) INTO l_proyectos FROM PROYECTO p WHERE p.K_EMPLEADO = pk_empleado;
		SELECT COUNT(p.K_PROYECTO) INTO  l_totalp FROM PROYECTO p;

		SELECT COUNT(a.K_AREA) INTO l_areas FROM AREA a WHERE a.K_EMPLEADO = pk_empleado;
		SELECT COUNT(a.K_AREA) INTO l_totala FROM AREA a;

		SELECT COUNT(t.K_TAREA) INTO l_tareas FROM TAREA t WHERE t.K_EMPLEADO = pk_empleado;
		SELECT COUNT(t.K_AREA) INTO l_totalt FROM TAREA t;

		l_porcentajepar := ((l_proyectos*3)+(l_areas*2)+l_tareas)/((l_totalp*3)+(l_totala)*2+l_totalt);
		
		
	RETURN l_porcentajepar;

END FU_EMPPARTICIPACION;
/