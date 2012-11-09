/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     06/11/2012 02:11:09 p.m.                     */
/*==============================================================*/


alter table AREA
   drop constraint FK_AREA_DIRECTOR__EMPLEADO;

alter table AREA
   drop constraint FK_AREA_ES_SECCIO_PROYECTO;

alter table PROYECTO
   drop constraint FK_PROYECTO_DIRECTOR__EMPLEADO;

alter table TAREA
   drop constraint FK_TAREA_ASIGNADA_EMPLEADO;

alter table TAREA
   drop constraint FK_TAREA_ES_DESARR_AREA;

drop index DIRECTOR_AREA_FK;

drop index ES_SECCION_FK;

drop table AREA cascade constraints;

drop table EMPLEADO cascade constraints;

drop index DIRECTOR_PROYECTO_FK;

drop table PROYECTO cascade constraints;

drop index ASIGNADA_FK;

drop index ES_DESARROLLADA_FK;

drop table TAREA cascade constraints;

/*==============================================================*/
/* Table: AREA                                                  */
/*==============================================================*/
create table AREA 
(
   K_PROYECTO           NUMBER(10,0)         not null,
   K_AREA               NUMBER(10,0)         not null,
   K_EMPLEADO           NUMBER(10,0)         not null,
   N_NOMBRE             VARCHAR2(100)        not null,
   constraint PK_AREA primary key (K_PROYECTO, K_AREA)
);

/*==============================================================*/
/* Index: ES_SECCION_FK                                         */
/*==============================================================*/
create index ES_SECCION_FK on AREA (
   K_PROYECTO ASC
);

/*==============================================================*/
/* Index: DIRECTOR_AREA_FK                                      */
/*==============================================================*/
create index DIRECTOR_AREA_FK on AREA (
   K_EMPLEADO ASC
);

/*==============================================================*/
/* Table: EMPLEADO                                              */
/*==============================================================*/
create table EMPLEADO 
(
   K_EMPLEADO           NUMBER(10,0)         not null,
   N_NOMBRES            VARCHAR2(25)         not null,
   N_APELLIDOS          VARCHAR2(25)         not null,
   TIPO_DOCUMENTO       VARCHAR2(2)          not null
      constraint CKC_TIPO_DOCUMENTO_EMPLEADO check (TIPO_DOCUMENTO in ('CC','DI')),
   Q_DOCUMENTO          NUMBER(12)           not null,
   CARGO                VARCHAR2(2)          not null
      constraint CKC_CARGO_EMPLEADO check (CARGO in ('DP','DA','PP','I')),
   ESTADOEMP            VARCHAR2(1)          default 'A'
      constraint CKC_ESTADOEMP_EMPLEADO check (ESTADOEMP is null or (ESTADOEMP in ('A','D'))),
   constraint PK_EMPLEADO primary key (K_EMPLEADO)
);

/*==============================================================*/
/* Table: PROYECTO                                              */
/*==============================================================*/
create table PROYECTO 
(
   K_PROYECTO           NUMBER(10,0)         not null,
   K_EMPLEADO           NUMBER(10,0)         not null,
   N_NOMBRE             VARCHAR2(100)        not null,
   F_INICIO             DATE                 not null,
   F_FIN                DATE                 not null,
   ESTADOPRO            VARCHAR2(2)          default 'A' not null
      constraint CKC_ESTADOPRO_PROYECTO check (ESTADOPRO in ('A','DB')),
   constraint PK_PROYECTO primary key (K_PROYECTO)
);

/*==============================================================*/
/* Index: DIRECTOR_PROYECTO_FK                                  */
/*==============================================================*/
create index DIRECTOR_PROYECTO_FK on PROYECTO (
   K_EMPLEADO ASC
);

/*==============================================================*/
/* Table: TAREA                                                 */
/*==============================================================*/
create table TAREA 
(
   K_TAREA              NUMBER(10,0)         not null,
   K_EMPLEADO           NUMBER(10,0),
   K_PROYECTO           NUMBER(10,0),
   K_AREA               NUMBER(10,0),
   DESCRIPCION          VARCHAR2(250)        not null,
   Q_PRIORIDAD          NUMBER(1)            default 1 not null
      constraint CKC_Q_PRIORIDAD_TAREA check (Q_PRIORIDAD between 1 and 5),
   ESTADOTAR            NUMBER(1)            default 0 not null
      constraint CKC_ESTADOTAR_TAREA check (ESTADOTAR between 0 and 1 and ESTADOTAR in (0,1)),
   constraint PK_TAREA primary key (K_TAREA)
);

/*==============================================================*/
/* Index: ES_DESARROLLADA_FK                                    */
/*==============================================================*/
create index ES_DESARROLLADA_FK on TAREA (
   K_PROYECTO ASC,
   K_AREA ASC
);

/*==============================================================*/
/* Index: ASIGNADA_FK                                           */
/*==============================================================*/
create index ASIGNADA_FK on TAREA (
   K_EMPLEADO ASC
);

alter table AREA
   add constraint FK_AREA_DIRECTOR__EMPLEADO foreign key (K_EMPLEADO)
      references EMPLEADO (K_EMPLEADO);

alter table AREA
   add constraint FK_AREA_ES_SECCIO_PROYECTO foreign key (K_PROYECTO)
      references PROYECTO (K_PROYECTO);

alter table PROYECTO
   add constraint FK_PROYECTO_DIRECTOR__EMPLEADO foreign key (K_EMPLEADO)
      references EMPLEADO (K_EMPLEADO);

alter table TAREA
   add constraint FK_TAREA_ASIGNADA_EMPLEADO foreign key (K_EMPLEADO)
      references EMPLEADO (K_EMPLEADO);

alter table TAREA
   add constraint FK_TAREA_ES_DESARR_AREA foreign key (K_PROYECTO, K_AREA)
      references AREA (K_PROYECTO, K_AREA);

