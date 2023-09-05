CREATE DATABASE IF NOT EXISTS gmao;
USE gmao;

CREATE TABLE IF NOT EXISTS users (
    id                   INTEGER(255) not null auto_increment,
    nombre               VARCHAR(50) not null,
    apellido             VARCHAR(50) not null,
    username             VARCHAR(100) not null unique,
    email                VARCHAR(100),
    password             VARCHAR(100) not null,
    role				 VARCHAR(15),
	created_at		 	 datetime,
	updated_at			 datetime,
	remember_token		 VARCHAR(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS taller (
    id                   INTEGER(255) not null auto_increment,
    nombre               VARCHAR(100) not null,
    area                 VARCHAR(100) not null,
    created_at		 	 datetime,
	updated_at			 datetime,
    CONSTRAINT pk_taller PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS maquinaria (
    id                      INTEGER(255) not null auto_increment,
    serial_institucion      VARCHAR(150) not null unique,
    serial_maquina          VARCHAR(150) not null,
    nombre                  VARCHAR(100) not null,
    marca                   VARCHAR(50),
    modelo                  VARCHAR(50),
    capacidad               FLOAT(10,3),
    capacidad_medida        VARCHAR(5),
    condicion               VARCHAR(20) not null,
    observacion             TEXT,
    created_at		 	    datetime,
	updated_at			    datetime,
    id_taller               INTEGER(255),
    CONSTRAINT pk_maquinaria PRIMARY KEY(id),
    CONSTRAINT fk_maquinaria_taller FOREIGN KEY(id_taller) REFERENCES taller(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS plan_mantenimiento (
    id                   INTEGER(255) not null auto_increment,
    fecha                DATE,
    tipo_mantenimiento   VARCHAR(100),
    criticidad           VARCHAR(20),
    descripcion          TEXT,
    estatus              VARCHAR(30),
    created_at		 	 datetime,
	updated_at			 datetime,
    id_maquina           INTEGER(255),
    id_usuario           INTEGER(255),
    CONSTRAINT pk_plan_mantenimiento PRIMARY KEY(id),
    CONSTRAINT fk_mantenimiento_maquinaria FOREIGN KEY(id_maquina) REFERENCES maquinaria(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_mantenimiento_usuario FOREIGN KEY(id_usuario) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS herramientas (
    id                   INTEGER(255) not null auto_increment,
    nombre               VARCHAR(100) not null,
    dimensiones          FLOAT(10,2),
    dimensiones_medida   VARCHAR(5),
    capacidad            FLOAT(10),
    capacidad_medida     VARCHAR(5),
    created_at		 	 datetime,
	updated_at			 datetime,
    CONSTRAINT pk_herramientas PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS herramienta_plan (
    id                   INTEGER(255) not null auto_increment,
    created_at		 	 datetime,
	updated_at			 datetime,
    id_herramienta       INTEGER(255),
    id_plan              INTEGER(255),
    CONSTRAINT pk_herramientas_plan PRIMARY KEY(id),
    CONSTRAINT fk_herramientas_plan FOREIGN KEY(id_herramienta) REFERENCES herramientas(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_plan_herramientas FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS personal (
    id                   INTEGER(255) not null auto_increment,
    ci                   INTEGER(10) not null unique,
    nombre               VARCHAR(50) not null,
    apellido             VARCHAR(50) not null,
    nro_telefono         INTEGER(12),
    correo_electronico   VARCHAR(50),
    area                 VARCHAR(50),
    created_at		 	 datetime,
	updated_at			 datetime,
    CONSTRAINT pk_personal PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS personal_plan (
    id                   INTEGER(255) not null auto_increment,
    created_at		 	 datetime,
	updated_at			 datetime,
    id_personal          INTEGER(255),
    id_plan              INTEGER(255),
    CONSTRAINT pk_personal_plan PRIMARY KEY(id),
    CONSTRAINT fk_personal_plan FOREIGN KEY(id_personal) REFERENCES personal(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_plan_personal FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS repuestos (
    id                   INTEGER(255) not null auto_increment,
    nombre               VARCHAR(100) not null,
    dimensiones          FLOAT(10,2),
    dimensiones_medida   VARCHAR(5),
    capacidad            FLOAT(10,2),
    capacidad_medida     VARCHAR(5),
    costo_estimado       FLOAT(12,2),
    created_at		 	 datetime,
	updated_at			 datetime,
    id_plan              INTEGER(255),
    CONSTRAINT pk_repuestos PRIMARY KEY(id),
    CONSTRAINT fk_repuestos_plan FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS compra_repuestos (
    id                   INTEGER(255) not null auto_increment,
    fecha_compra         DATE,
    costo_total          FLOAT(12),
    medio_pago           VARCHAR(20),
    estatus              VARCHAR(15),
    created_at		 	 datetime,
	updated_at			 datetime,
    CONSTRAINT pk_compra_repuestos PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS compra_repuestos_nm (
    id                   INTEGER(255) not null auto_increment,
    created_at		 	 datetime,
	updated_at			 datetime,
    id_repuesto          INTEGER(255),
    id_compra_repuesto   INTEGER(255),
    CONSTRAINT pk_compra_repuestos_nm PRIMARY KEY(id),
    CONSTRAINT fk_compra_repuestos_repuestos FOREIGN KEY(id_repuesto) REFERENCES repuestos(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_repuestos_compra_repuestos FOREIGN KEY(id_compra_repuesto) REFERENCES compra_repuestos(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;