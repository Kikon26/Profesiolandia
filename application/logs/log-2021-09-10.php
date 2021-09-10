<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-10 09:16:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
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
ERROR - 2021-09-10 09:16:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
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
ERROR - 2021-09-10 09:16:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and p.id_cat_profesional=f.id_cat_profesional inner join  
              cat...' at line 1 - Invalid query: select  * from cat_favoritos as f inner join cat_publicaciones as p on f.id_cat_usuario= and p.id_cat_profesional=f.id_cat_profesional inner join  
              cat_profesionales as pr on pr.id_cat_profesional=p.id_cat_profesional inner join 
              cat_profesiones as pr2 on pr2.id_cat_profesion=pr.id_cat_profesion               
              order by p.id_cat_publicacion
ERROR - 2021-09-10 09:16:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
