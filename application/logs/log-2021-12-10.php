<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-12-10 08:59:21 --> 404 Page Not Found: Assets/js
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-12-10 08:59:21 --> 404 Page Not Found: Assets/libs
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-12-10 08:59:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 08:59:21 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:02:12 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:02:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:02:12 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:02:12 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:02:18 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:02:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:02:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:02:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:39 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:03:39 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:03:39 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:39 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:41 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:03:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:03:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:41 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:43 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:03:43 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:03:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:43 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:53 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:03:54 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:03:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:54 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:58 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:03:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:03:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:03:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:14 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:04:14 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:14 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:21 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:04:21 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:04:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:21 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:29 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:04:30 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 09:04:30 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:30 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:36 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 09:04:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:37 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 09:04:37 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:25:10 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:25:10 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:25:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:25:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:25:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
                (
                  SELECT 
                ' at line 14 - Invalid query: SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta_pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                DATE_FORMAT(r.fecha_alta_respuesta,'%d/%m/%Y') as fecha_alta_respuesta,                
                r.carrera,
                r.profesional, 
                r.imagen,
                ifnull(r.total_valoraciones,0) as total_valoraciones,
                ifnull(r.val_gral,0) as val_gral
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario=) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  r.fecha_alta as fecha_alta_respuesta,                  
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen,
                  ifnull(v.total_valoraciones,0) as total_valoraciones,
                  ifnull(v.val_gral,0) as val_gral
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion left join 
                  (
                    select 
                    v.id_cat_profesional,
                    count(*) as total_valoraciones,
                    round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                    from cat_valoraciones as v                 
                    group by v.id_cat_profesional
                  ) as v  on v.id_cat_profesional=pr.id_cat_profesional



                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
                order by  p.id_cat_pregunta desc
                
ERROR - 2021-12-10 10:25:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'from 
			        cat_favoritos as f inner join 
              cat_profesionale' at line 16 - Invalid query: select 
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
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
              ifnull(v.total_valoraciones,0) as total_valoraciones,
              ifnull(v.val_gral,0) as val_gral,                           
              from 
			        cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_valoraciones as o on o.id_cat_profesional=p.id_cat_profesional left join
              (
                select 
                v.id_cat_profesional,
                count(*) as total_valoraciones,
                round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                from cat_valoraciones as v                 
                group by v.id_cat_profesional
              ) as v  on v.id_cat_profesional=p.id_cat_profesionalWHERE f.id_cat_usuario=  
ERROR - 2021-12-10 10:25:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
ERROR - 2021-12-10 10:25:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and f.id_cat_usuario=u.id_cat_usuario   inner join 
              cat_publicaci' at line 11 - Invalid query: select  
              p.id_cat_profesional,
              pr2.area_interes,
              p.titulo,
              p.resumen,
              p.publicacion,
              DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta

              from 
              usuarios as u inner join 
              cat_favoritos as f on u.id_cat_usuario= and f.id_cat_usuario=u.id_cat_usuario   inner join 
              cat_publicaciones as p on p.id_cat_profesional=f.id_cat_profesional and p.fecha_alta>=u.fecha_alta inner join  
              cat_profesionales as pr on pr.id_cat_profesional=p.id_cat_profesional inner join 
              cat_profesiones as pr2 on pr2.id_cat_profesion=pr.id_cat_profesion               
              order by p.fecha_alta desc
ERROR - 2021-12-10 10:25:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
                (
                  SELECT 
                ' at line 14 - Invalid query: SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta_pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                DATE_FORMAT(r.fecha_alta_respuesta,'%d/%m/%Y') as fecha_alta_respuesta,                
                r.carrera,
                r.profesional, 
                r.imagen,
                ifnull(r.total_valoraciones,0) as total_valoraciones,
                ifnull(r.val_gral,0) as val_gral
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario=) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  r.fecha_alta as fecha_alta_respuesta,                  
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen,
                  ifnull(v.total_valoraciones,0) as total_valoraciones,
                  ifnull(v.val_gral,0) as val_gral
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion left join 
                  (
                    select 
                    v.id_cat_profesional,
                    count(*) as total_valoraciones,
                    round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                    from cat_valoraciones as v                 
                    group by v.id_cat_profesional
                  ) as v  on v.id_cat_profesional=pr.id_cat_profesional



                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
                order by  p.id_cat_pregunta desc
                
ERROR - 2021-12-10 10:27:47 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:27:48 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:27:48 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:27:48 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:27:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
                (
                  SELECT 
                ' at line 14 - Invalid query: SELECT  
                p.id_cat_pregunta,
                p.pregunta,
                DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta_pregunta,
                r.id_cat_respuesta,
                r.respuesta,
                DATE_FORMAT(r.fecha_alta_respuesta,'%d/%m/%Y') as fecha_alta_respuesta,                
                r.carrera,
                r.profesional, 
                r.imagen,
                ifnull(r.total_valoraciones,0) as total_valoraciones,
                ifnull(r.val_gral,0) as val_gral
                from 
                (SELECT * FROM cat_preguntas WHERE id_cat_usuario=) AS p LEFT JOIN
                (
                  SELECT 
                  r.id_cat_pregunta,
                  r.id_cat_respuesta,
                  r.respuesta,
                  r.fecha_alta as fecha_alta_respuesta,                  
                  pe.nombre AS carrera,
                  CONCAT(pr.nombre,' ',pr.paterno,' ',pr.materno) AS profesional, 
                  pr.imagen,
                  ifnull(v.total_valoraciones,0) as total_valoraciones,
                  ifnull(v.val_gral,0) as val_gral
                  FROM 
                
                  cat_respuestas AS r   INNER JOIN 
                  cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional INNER JOIN 
                  cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion left join 
                  (
                    select 
                    v.id_cat_profesional,
                    count(*) as total_valoraciones,
                    round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                    from cat_valoraciones as v                 
                    group by v.id_cat_profesional
                  ) as v  on v.id_cat_profesional=pr.id_cat_profesional



                ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta 
                order by  p.id_cat_pregunta desc
                
ERROR - 2021-12-10 10:27:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
ERROR - 2021-12-10 10:27:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 30 - Invalid query: select 
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
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
              ifnull(v.total_valoraciones,0) as total_valoraciones,
              ifnull(v.val_gral,0) as val_gral                           
              from 
			        cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_valoraciones as o on o.id_cat_profesional=p.id_cat_profesional left join
              (
                select 
                v.id_cat_profesional,
                count(*) as total_valoraciones,
                round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                from cat_valoraciones as v                 
                group by v.id_cat_profesional
              ) as v  on v.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-12-10 10:27:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and f.id_cat_usuario=u.id_cat_usuario   inner join 
              cat_publicaci' at line 11 - Invalid query: select  
              p.id_cat_profesional,
              pr2.area_interes,
              p.titulo,
              p.resumen,
              p.publicacion,
              DATE_FORMAT(p.fecha_alta,'%d/%m/%Y') as fecha_alta

              from 
              usuarios as u inner join 
              cat_favoritos as f on u.id_cat_usuario= and f.id_cat_usuario=u.id_cat_usuario   inner join 
              cat_publicaciones as p on p.id_cat_profesional=f.id_cat_profesional and p.fecha_alta>=u.fecha_alta inner join  
              cat_profesionales as pr on pr.id_cat_profesional=p.id_cat_profesional inner join 
              cat_profesiones as pr2 on pr2.id_cat_profesion=pr.id_cat_profesion               
              order by p.fecha_alta desc
ERROR - 2021-12-10 10:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 30 - Invalid query: select 
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
              d.tel,
              concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
              ifnull(v.total_valoraciones,0) as total_valoraciones,
              ifnull(v.val_gral,0) as val_gral                           
              from 
			        cat_favoritos as f inner join 
              cat_profesionales as p on p.id_cat_profesional=f.id_cat_profesional inner join 			  
              cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion left join 
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=0 left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_valoraciones as o on o.id_cat_profesional=p.id_cat_profesional left join
              (
                select 
                v.id_cat_profesional,
                count(*) as total_valoraciones,
                round (sum(atencion+calidad+puntualidad+instalaciones+recomendacion)/(count(*)*5),0) as val_gral
                from cat_valoraciones as v                 
                group by v.id_cat_profesional
              ) as v  on v.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=  
ERROR - 2021-12-10 10:28:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:28:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:42 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:28:42 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:28:42 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:42 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:44 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:28:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:28:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:52 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:28:53 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:28:53 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:28:53 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:29:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:29:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:29:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:29:06 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:29:11 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:29:11 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:29:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:29:11 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:29:51 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:29:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:29:51 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:29:51 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:03 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:30:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:30:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:06 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:30:06 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:30:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:06 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:09 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:30:10 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:30:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:10 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:30 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:30:31 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:30:31 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:31 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:45 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:30:46 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:30:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:30:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:31:36 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:31:36 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:31:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:31:36 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:31:47 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:31:47 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:31:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:31:47 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:37:18 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:37:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:37:18 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:37:18 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:37:45 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:37:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:37:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:37:46 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:37:58 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:37:58 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:37:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:37:58 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:40:27 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:40:27 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:40:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:40:27 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:41:31 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:41:32 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:41:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:41:32 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:43:00 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:43:01 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:43:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:43:01 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:43:07 --> 404 Page Not Found: Assets/css
ERROR - 2021-12-10 10:43:08 --> 404 Page Not Found: Assets/js
ERROR - 2021-12-10 10:43:08 --> 404 Page Not Found: Assets/libs
ERROR - 2021-12-10 10:43:08 --> 404 Page Not Found: Assets/libs
