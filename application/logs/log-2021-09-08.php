<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-08 18:02:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 46 - Invalid query: select  
            s.nombre as estado,   
            e.id_cat_profesion,         
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
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional= 
ERROR - 2021-09-08 18:02:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_publicacion' at line 1 - Invalid query: select  * from cat_publicaciones where id_cat_profesional=  order by id_cat_publicacion
ERROR - 2021-09-08 18:02:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-09-08 18:02:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-09-08 18:02:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-09-08 18:02:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-09-08 18:09:48 --> Severity: Warning --> Trying to access array offset on value of type null C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CRegistro.php 144
ERROR - 2021-09-08 18:21:20 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 18:21:35 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 18:21:48 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 18:32:34 --> Severity: Warning --> Undefined array key "id_cat_profesion" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\views\VBuscar.php 20
ERROR - 2021-09-08 18:32:34 --> Severity: Warning --> Undefined array key "id_cat_estado" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\views\VBuscar.php 21
ERROR - 2021-09-08 18:32:34 --> Severity: Warning --> Undefined array key "filtrar" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\views\VBuscar.php 41
ERROR - 2021-09-08 18:34:40 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 18:36:02 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 18:38:20 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-08 21:56:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 21:56:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-09-08 21:56:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-09-08 21:57:10 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-08 22:08:24 --> Severity: error --> Exception: Undefined constant "console" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MPerfilCliente.php 219
ERROR - 2021-09-08 22:09:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_publicacion' at line 1 - Invalid query: select  * from cat_publicaciones where id_cat_profesional=  order by id_cat_publicacion
ERROR - 2021-09-08 22:09:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 46 - Invalid query: select  
            s.nombre as estado,   
            e.id_cat_profesion,         
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
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional left join
            cat_redes_sociales as r on r.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional= 
ERROR - 2021-09-08 22:09:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-09-08 22:09:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-09-08 22:09:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-09-08 22:09:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
