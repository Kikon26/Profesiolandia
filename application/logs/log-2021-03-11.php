<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-11 11:36:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesio' at line 31 - Invalid query: select  
            s.nombre as estado,            
            e.nombre as profesion,
            p.especialidad,
            p.descripcion,
            p.costo_consulta,
            p.imagen,
            concat(p.nombre,' ',p.paterno,' ',p.materno )  as profesionista,
            o.opinion,
            ifnull(o.calificacion,0) as calificacion,              
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
            p.email

            
            from cat_profesionales as p inner join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.id_cat_profesional= and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional 
ERROR - 2021-03-11 11:36:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-03-11 11:36:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-03-11 11:36:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-03-11 11:36:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-03-11 11:36:49 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:36:49 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:36:49 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:36:49 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:36:49 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:42:02 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:42:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:42:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:42:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:42:28 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:42:28 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:42:28 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:42:28 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:42:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:43:14 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:43:15 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:43:15 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:43:15 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:43:15 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:02 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:45:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:45:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:24 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:45:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:45:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:43 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:45:43 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:45:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:45:44 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:47:09 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:47:10 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:47:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:47:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:47:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:47:36 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:47:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:47:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:47:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:47:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:50:01 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:50:01 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:50:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:50:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:50:02 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:53:00 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:53:01 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:53:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:53:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:53:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:55:19 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 11:55:19 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 11:55:19 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:55:19 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 11:55:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:00:02 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:00:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:00:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:00:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:00:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:02:00 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:02:00 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:02:00 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:02:00 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:02:00 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:03:07 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:03:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:03:08 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:03:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:03:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:09:08 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:09:09 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:09:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:09:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:09:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:31:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:31:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:31:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:31:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:31:47 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:34:43 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:34:44 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:34:44 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:34:44 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:34:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:35:21 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:35:21 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:35:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:35:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:35:22 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:45:28 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:45:29 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:45:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:45:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:45:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:53:31 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 12:53:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 12:53:31 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:53:31 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 12:53:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 13:03:06 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 13:03:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 13:03:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 13:03:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 13:03:07 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 13:03:58 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 13:03:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 13:03:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 13:03:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 13:03:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:00:54 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:00:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:00:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:00:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:00:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:01:38 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:01:39 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:01:39 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:01:39 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:01:39 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:19:40 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:19:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:19:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:19:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:19:42 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:19:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:19:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:19:57 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:19:57 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:19:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:25:17 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:25:17 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:25:17 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:25:17 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:25:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:38:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:38:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:38:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:38:18 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:38:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:51:26 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:51:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:51:26 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:51:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:51:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:53:22 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:53:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:53:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:53:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:53:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:54:08 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:54:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:54:09 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:54:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:54:09 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:54:24 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-11 15:54:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-11 15:54:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:54:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-11 15:54:26 --> 404 Page Not Found: Assets/libs
