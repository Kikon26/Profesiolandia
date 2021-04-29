<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-21 12:40:23 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Se produjo un error durante el intento de conexión ya que la parte conectada no respondió adecuadamente tras un periodo de tiempo, o bien se produjo un error en la conexión establecida ya que el host conectado no ha podido responder C:\xampp\htdocs\CATO\Profesiolandia_Martin\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2021-04-21 12:40:23 --> Unable to connect to the database
ERROR - 2021-04-21 12:40:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Se produjo un error durante el intento de conexión ya que la parte conectada no respondió adecuadamente tras un periodo de tiempo, o bien se produjo un error en la conexión establecida ya que el host conectado no ha podido responder C:\xampp\htdocs\CATO\Profesiolandia_Martin\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2021-04-21 12:40:58 --> Unable to connect to the database
ERROR - 2021-04-21 12:41:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): Se produjo un error durante el intento de conexión ya que la parte conectada no respondió adecuadamente tras un periodo de tiempo, o bien se produjo un error en la conexión establecida ya que el host conectado no ha podido responder C:\xampp\htdocs\CATO\Profesiolandia_Martin\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2021-04-21 12:41:58 --> Unable to connect to the database
ERROR - 2021-04-21 13:18:34 --> Severity: Warning --> Undefined array key "id_cat_profesion" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 20
ERROR - 2021-04-21 13:18:34 --> Severity: Warning --> Undefined array key "id_cat_estado" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 21
ERROR - 2021-04-21 13:18:51 --> 404 Page Not Found: Assets/css
ERROR - 2021-04-21 13:20:36 --> 404 Page Not Found: CAdministraCuenta/index
ERROR - 2021-04-21 13:20:41 --> 404 Page Not Found: CConfiguracion/index
ERROR - 2021-04-21 13:20:49 --> Severity: Warning --> Undefined array key "id_cat_profesion" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 20
ERROR - 2021-04-21 13:20:49 --> Severity: Warning --> Undefined array key "id_cat_estado" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 21
ERROR - 2021-04-21 13:20:49 --> Severity: Warning --> Undefined array key "filtrar" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 41
ERROR - 2021-04-21 13:23:43 --> 404 Page Not Found: Assets/css
ERROR - 2021-04-21 13:31:03 --> 404 Page Not Found: Assets/css
ERROR - 2021-04-21 13:32:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-04-21 13:43:39 --> Severity: Warning --> Undefined array key "id_cat_profesion" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 20
ERROR - 2021-04-21 13:43:39 --> Severity: Warning --> Undefined array key "id_cat_estado" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 21
ERROR - 2021-04-21 13:43:39 --> Severity: Warning --> Undefined array key "filtrar" C:\xampp\htdocs\CATO\Profesiolandia\application\views\VBuscar.php 41
ERROR - 2021-04-21 13:43:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-04-21 13:43:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-04-21 13:43:41 --> 404 Page Not Found: Assets/images
ERROR - 2021-04-21 13:43:53 --> 404 Page Not Found: CConfiguracion/index
ERROR - 2021-04-21 13:43:58 --> 404 Page Not Found: CAdministraCuenta/index
ERROR - 2021-04-21 13:44:14 --> 404 Page Not Found: CPreguntaExperto/index
ERROR - 2021-04-21 13:44:19 --> 404 Page Not Found: CAgendaCita/index
ERROR - 2021-04-21 13:44:24 --> 404 Page Not Found: CContenido/index
ERROR - 2021-04-21 13:44:32 --> 404 Page Not Found: CQuienesSomos/index
ERROR - 2021-04-21 13:45:27 --> 404 Page Not Found: Preguntaphp/index
ERROR - 2021-04-21 20:31:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
            s.nombre as estado,                                    
			p.usuario,
            p.nombre,
			p.paterno,
			p.materno,
			p.email,
			p.imagen,
            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel                                    
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-21 20:55:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
              p.id_cat_profesional, 
              s.nombre as estado,
              d.municipio,
              e.nombre as profesion,
              p.especialidad,
              p.descripcion,
              p.costo_consulta,
              p.imagen,
              concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
              o.opinion, 
              ifnull(o.calificacion,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=   order by calificacion desc 
ERROR - 2021-04-21 20:55:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
            s.nombre as estado,                                    
			p.usuario,
            p.nombre,
			p.paterno,
			p.materno,
			p.email,
			p.imagen,
            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel                                    
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-21 21:21:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
            s.nombre as estado,                                    
			p.usuario,
            p.nombre,
			p.paterno,
			p.materno,
			p.email,
			p.imagen,
            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel                                    
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
