<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-08 10:59:33 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37  order by calificacion desc 
ERROR - 2021-09-08 11:03:20 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:03:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:03:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:03:20 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:03:54 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:03:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:03:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:03:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:04:40 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37  order by calificacion desc 
ERROR - 2021-09-08 11:23:00 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37  order by calificacion desc 
ERROR - 2021-09-08 11:23:31 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37  order by calificacion desc 
ERROR - 2021-09-08 11:23:43 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:23:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:23:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:23:43 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:23:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
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
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=   order by calificacion desc 
ERROR - 2021-09-08 11:27:44 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:27:44 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:27:44 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:27:44 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:27:44 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              /*ifnull(o.calificacion,0) as calificacion,*/
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37 
ERROR - 2021-09-08 11:27:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 21 - Invalid query: select 
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
              /*ifnull(o.calificacion,0) as calificacion,*/
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-09-08 11:28:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 21 - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-09-08 11:28:28 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:28:28 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:28:28 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:28:28 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:28:29 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37 
ERROR - 2021-09-08 11:28:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 21 - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-09-08 11:29:38 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:29:38 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:29:38 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:29:38 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:29:38 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37 
ERROR - 2021-09-08 11:29:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 21 - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-09-08 11:30:25 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37 
ERROR - 2021-09-08 11:30:27 --> Query error: Table 'profesiolandia.cat_opiniones' doesn't exist - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario= 37 
ERROR - 2021-09-08 11:30:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:30:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:30:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:30:32 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:30:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 21 - Invalid query: select 
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
              ifnull(0,0) as calificacion,
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion                           
              from 
			  cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-09-08 11:31:34 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 11:31:34 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:31:34 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:31:34 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:33:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 11:33:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:33:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 11:33:45 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 13:22:26 --> 404 Page Not Found: PreguntaExperto/index
ERROR - 2021-09-08 13:22:40 --> 404 Page Not Found: CPreguntaExperto/index
ERROR - 2021-09-08 13:42:19 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:42:19 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:42:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 13:42:19 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 13:42:22 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 13:42:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 13:42:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:42:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:43:08 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 13:43:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:43:08 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 13:43:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:43:09 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 13:43:10 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 13:43:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:43:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:49:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 13:49:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:49:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 13:49:18 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:03:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:03:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:03:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:03:25 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:03:32 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:03:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:03:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:03:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:04:41 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:04:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:04:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:04:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:04:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:04:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:04:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:04:47 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:08:53 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:08:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:08:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:08:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:08:55 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:08:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:08:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:08:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:09:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:09:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:09:01 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:09:10 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:09:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:09:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:09:10 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:12:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 14:12:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 14:19:13 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:19:13 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:19:13 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:19:13 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:42:57 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:42:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:42:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:42:58 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:46:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:46:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:46:45 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:46:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:50:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:50:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:50:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:50:11 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:50:44 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:50:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:50:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:50:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:50:59 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:50:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:50:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:50:59 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:53:09 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:53:09 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:53:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:53:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:54:20 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:54:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:54:20 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:54:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:56:25 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:56:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:56:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:56:26 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:57:15 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:57:15 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:57:15 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:57:15 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:57:47 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:57:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:57:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:57:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:58:27 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 14:58:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 14:58:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:58:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 14:58:35 --> Severity: Warning --> Use of undefined constant email - assumed 'email' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\Profesiolandia\application\controllers\CAltaProfesional.php 446
ERROR - 2021-09-08 14:58:35 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\xampp\htdocs\Profesiolandia\application\controllers\CAltaProfesional.php 446
ERROR - 2021-09-08 15:00:12 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 15:00:12 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 15:00:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:00:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:02:50 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 15:02:50 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:02:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 15:02:50 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 15:06:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 15:06:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:06:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:10:29 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 15:10:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:10:29 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 15:10:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:10:58 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 15:10:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:10:59 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 15:10:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:18:56 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 15:18:57 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 15:18:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:18:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 15:23:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_publicacion' at line 1 - Invalid query: select  * from cat_publicaciones where id_cat_profesional=  order by id_cat_publicacion
ERROR - 2021-09-08 15:23:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-09-08 15:23:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-09-08 15:23:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 46 - Invalid query: select  
            s.nombre as estado,   
            e.id_cat_profesion,         
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
            v.opinion,
            
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,

            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel,
            
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            p.metodos_pago,
            p.email,

            r.id_cat_red_social,
            r.business_card,
            r.google_maps,
            r.whatsapp,
            r.facebook,
            r.instagram,
            r.twitter,
            r.pagina_web,
            r.activo
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_valoraciones as v on v.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional= 
ERROR - 2021-09-08 15:23:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-09-08 15:23:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-09-08 15:26:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 46 - Invalid query: select  
            s.nombre as estado,   
            e.id_cat_profesion,         
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
            v.opinion,
            
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,

            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel,
            
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            p.metodos_pago,
            p.email,

            r.id_cat_red_social,
            r.business_card,
            r.google_maps,
            r.whatsapp,
            r.facebook,
            r.instagram,
            r.twitter,
            r.pagina_web,
            r.activo
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_valoraciones as v on v.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional= 
ERROR - 2021-09-08 15:26:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-09-08 15:26:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-09-08 15:26:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-09-08 15:26:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-09-08 15:26:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_publicacion' at line 1 - Invalid query: select  * from cat_publicaciones where id_cat_profesional=  order by id_cat_publicacion
ERROR - 2021-09-08 15:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-09-08 15:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_publicacion' at line 1 - Invalid query: select  * from cat_publicaciones where id_cat_profesional=  order by id_cat_publicacion
ERROR - 2021-09-08 15:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 46 - Invalid query: select  
            s.nombre as estado,   
            e.id_cat_profesion,         
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
            v.opinion,
            
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,

            d.id_cat_estado,
            d.municipio,
            d.colonia,
            d.calle,
            d.num,
            d.cp,
            d.tel,
            
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            p.metodos_pago,
            p.email,

            r.id_cat_red_social,
            r.business_card,
            r.google_maps,
            r.whatsapp,
            r.facebook,
            r.instagram,
            r.twitter,
            r.pagina_web,
            r.activo
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_valoraciones as v on v.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional= 
ERROR - 2021-09-08 15:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-09-08 15:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-09-08 15:30:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
