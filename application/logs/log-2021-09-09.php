<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-09 09:08:30 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-09 09:14:48 --> 404 Page Not Found: Assets/css
ERROR - 2021-09-09 09:51:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
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
ERROR - 2021-09-09 09:51:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion' at line 1 - Invalid query: select  * from cat_favoritos as f inner join cat_publicaciones as p on f.id_cat_usuario= and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion
ERROR - 2021-09-09 09:51:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
                (
                  SELECT 
             ...' at line 10 - Invalid query: SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                r.carrera,
                r.profesional, 
                r.imagen
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario=) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion
                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
ERROR - 2021-09-09 09:51:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
            from usuarios as p left join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and d.dom_particular=1  left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
            where p.id_cat_usuario= 
ERROR - 2021-09-09 09:52:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
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
ERROR - 2021-09-09 09:52:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
                (
                  SELECT 
             ...' at line 10 - Invalid query: SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                r.carrera,
                r.profesional, 
                r.imagen
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario=) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion
                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
ERROR - 2021-09-09 09:52:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion' at line 1 - Invalid query: select  * from cat_favoritos as f inner join cat_publicaciones as p on f.id_cat_usuario= and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion
ERROR - 2021-09-09 09:52:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
            from usuarios as p left join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and d.dom_particular=1  left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
            where p.id_cat_usuario= 
ERROR - 2021-09-09 09:52:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
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
ERROR - 2021-09-09 09:52:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
                (
                  SELECT 
             ...' at line 10 - Invalid query: SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                r.carrera,
                r.profesional, 
                r.imagen
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario=) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion
                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
ERROR - 2021-09-09 09:52:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion' at line 1 - Invalid query: select  * from cat_favoritos as f inner join cat_publicaciones as p on f.id_cat_usuario= and p.id_cat_profesional=f.id_cat_profesional order by p.id_cat_publicacion
ERROR - 2021-09-09 09:52:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
            from usuarios as p left join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and d.dom_particular=1  left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
            where p.id_cat_usuario= 
ERROR - 2021-09-09 10:01:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 46 - Invalid query: select  
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
ERROR - 2021-09-09 10:01:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_publicacion' at line 1 - Invalid query: select  * from cat_publicaciones where id_cat_profesional=  order by id_cat_publicacion
ERROR - 2021-09-09 10:01:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_reconocimiento' at line 1 - Invalid query: select * from cat_reconocimientos where id_cat_profesional= order by id_cat_reconocimiento
ERROR - 2021-09-09 10:01:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_promocion' at line 1 - Invalid query: select * from cat_promociones where id_cat_profesional= order by id_cat_promocion
ERROR - 2021-09-09 10:01:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_dia' at line 1 - Invalid query: select * from cat_horario_atencion where id_cat_profesional= order by id_cat_dia
ERROR - 2021-09-09 10:01:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by id_cat_precio' at line 1 - Invalid query: select * from cat_precios where id_cat_profesional= order by id_cat_precio
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined variable $files_names C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 118
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "google_maps" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 241
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "whatsapp" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 242
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "facebook" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 243
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "instagram" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 244
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "twitter" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 245
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "pagina_web" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 246
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "activar_redes" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 248
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "id_cat_red_social" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 252
ERROR - 2021-09-09 10:23:39 --> Severity: Warning --> Undefined array key "id_cat_red_social" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 256
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined variable $files_names C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 118
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "google_maps" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 241
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "whatsapp" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 242
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "facebook" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 243
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "instagram" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 244
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "twitter" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 245
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "pagina_web" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 246
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "activar_redes" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 248
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "id_cat_red_social" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 252
ERROR - 2021-09-09 10:24:14 --> Severity: Warning --> Undefined array key "id_cat_red_social" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 256
ERROR - 2021-09-09 13:42:15 --> 404 Page Not Found: Assets/images
