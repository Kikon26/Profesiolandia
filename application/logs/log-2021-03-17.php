<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-17 09:39:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesio' at line 40 - Invalid query: select  
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
            
            from cat_profesionales as p inner join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.id_cat_profesional= and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
ERROR - 2021-03-17 09:39:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-03-17 09:39:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-03-17 09:39:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-03-17 09:39:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-03-17 09:39:52 --> Query error: Unknown column 'activo' in 'where clause' - Invalid query: select * from cat_redes_sociales where id_cat_profesional=3 and activo=1
ERROR - 2021-03-17 09:45:26 --> 404 Page Not Found: Assets/images
ERROR - 2021-03-17 09:46:03 --> 404 Page Not Found: Assets/images
ERROR - 2021-03-17 10:01:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:01:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:01:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:01:54 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:03:28 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:03:28 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:03:28 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:03:29 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:04:30 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:04:30 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:04:30 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:04:31 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:07:41 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:07:42 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:07:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:07:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:08:09 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:08:10 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:08:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:08:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:09:26 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:09:26 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:09:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:09:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:09:29 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:09:29 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:09:31 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:09:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:09:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:09:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:12:54 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:12:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:12:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:12:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:13:22 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:13:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:13:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:13:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:15:27 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:15:28 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:15:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:15:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:16:11 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:16:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:16:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:16:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:17:08 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 10:17:08 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 10:17:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:17:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 10:30:43 --> 404 Page Not Found: CPerfilAdministrador/index
ERROR - 2021-03-17 10:31:03 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 10:31:03 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 10:45:13 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 10:45:13 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:19:00 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:19:00 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:21:35 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:21:35 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:23:38 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:23:38 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:23:51 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:23:51 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:24:14 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:24:14 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:24:24 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:24:24 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:24:30 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 11:24:31 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 11:24:31 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 11:24:31 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 11:26:00 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:26:00 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:26:01 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 11:26:02 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 11:26:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 11:26:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 11:26:22 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:26:22 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:26:23 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 11:26:23 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 11:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesio' at line 40 - Invalid query: select  
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
            
            from cat_profesionales as p inner join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.id_cat_profesional= and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
ERROR - 2021-03-17 11:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-03-17 11:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-03-17 11:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-03-17 11:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-03-17 13:14:17 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 13:14:17 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 13:16:36 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 13:16:36 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 13:18:03 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 13:18:03 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 13:20:41 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 13:20:41 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 13:21:26 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 13:21:26 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 13:21:37 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 13:21:37 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 14:41:39 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 14:41:39 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 14:41:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:41:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 14:41:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:41:48 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 14:42:44 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 14:42:44 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 14:42:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 14:42:50 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:42:50 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:42:50 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 14:52:11 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 14:52:11 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 14:52:11 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 14:52:12 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 14:52:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:52:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:53:33 --> 404 Page Not Found: Img/Ing1.png
ERROR - 2021-03-17 14:53:33 --> 404 Page Not Found: Img/Dr1.png
ERROR - 2021-03-17 14:53:34 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 14:53:35 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 14:53:35 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:53:35 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:54:22 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 14:54:23 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 14:54:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 14:54:23 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:36:37 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:36:38 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:36:38 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:36:39 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:37:05 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:37:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:37:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:37:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:38:25 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:38:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:38:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:38:26 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:39:05 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:39:05 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:39:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:39:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:39:24 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:39:25 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:39:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:39:25 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:39:36 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:39:37 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:39:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:39:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:41:55 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:41:56 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:41:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:41:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:47:16 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:47:17 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:47:17 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:47:17 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:47:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:47:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:47:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:47:33 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:52:05 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 15:52:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 15:52:07 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 15:52:07 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 16:14:16 --> 404 Page Not Found: Assets/images
ERROR - 2021-03-17 16:15:13 --> 404 Page Not Found: Assets/images
ERROR - 2021-03-17 16:15:21 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 16:15:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 16:15:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 16:15:21 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 16:17:04 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 16:17:05 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 16:17:05 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 16:17:05 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:19:29 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:19:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:19:29 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:19:29 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:21:19 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:21:20 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:21:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:21:20 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:21:55 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:21:56 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:21:56 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:21:56 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:22:54 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:22:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:22:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:22:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:22:55 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:22:56 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:22:57 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:22:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:22:57 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:23:11 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:23:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:23:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:23:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:23:35 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:23:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:23:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:23:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:24:03 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:24:04 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:24:04 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:24:04 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:32:35 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:32:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:32:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:32:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:32:39 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:32:40 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:32:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:32:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:33 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:33:33 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:33:34 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:34 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:37 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:33:38 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:33:38 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:38 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:54 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:33:55 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:33:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:55 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:58 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:33:59 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:33:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:33:59 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:34:31 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:34:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:34:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:34:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:34:45 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:34:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:34:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:34:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:38:13 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:38:13 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:38:13 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:38:13 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:38:52 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:38:53 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:38:53 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:38:53 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:39:10 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:39:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:39:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-03-17 20:39:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:39:21 --> 404 Page Not Found: Assets/css
ERROR - 2021-03-17 20:39:22 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:39:22 --> 404 Page Not Found: Assets/libs
ERROR - 2021-03-17 20:39:22 --> 404 Page Not Found: Assets/js
