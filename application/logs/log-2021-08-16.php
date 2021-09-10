<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-16 09:40:41 --> 404 Page Not Found: Assets/libs
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-16 09:40:41 --> 404 Page Not Found: Assets/libs
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-16 09:40:41 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-16 09:40:45 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-16 09:40:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-08-16 09:40:45 --> 404 Page Not Found: Assets/libs
ERROR - 2021-08-16 17:06:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:06:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:06:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:05 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:21 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:27 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:43 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:43 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:07:44 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:08:18 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:08:18 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:08:18 --> Query error: Unknown column 'id_cat_profesion' in 'where clause' - Invalid query: SELECT  
                      p.id_cat_pregunta,
                      p.pregunta,
                      r.id_cat_respuesta,
                      r.respuesta,
                      r.carrera,
                      r.profesional, 
                      r.imagen
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion=715 ) AS p LEFT JOIN
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
                        cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional AND pr.id_cat_profesional=29 INNER JOIN 
                        cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion
                      ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta
ERROR - 2021-08-16 17:14:06 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:14:36 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:14:36 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:14:36 --> Query error: Unknown column 'id_cat_profesion' in 'where clause' - Invalid query: SELECT  
                      p.id_cat_pregunta,
                      p.pregunta,
                      r.id_cat_respuesta,
                      r.respuesta,
                      r.carrera,
                      r.profesional, 
                      r.imagen
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion=715 ) AS p LEFT JOIN
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
                        cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional AND pr.id_cat_profesional=29 INNER JOIN 
                        cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion
                      ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta
ERROR - 2021-08-16 17:14:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:15:32 --> Severity: Warning --> unlink(./assets/images/profesionales/Kikon-2021-08-02-16-57-07-1339.jpg): No such file or directory C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MProfesionalAdministraCuenta.php 65
ERROR - 2021-08-16 17:15:34 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:15:42 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:15:59 --> Severity: Warning --> unlink(./assets/images/profesionales/Kikon-2021-08-16-17-15-31-Logo_Profesiolandia_face): No such file or directory C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MProfesionalAdministraCuenta.php 65
ERROR - 2021-08-16 17:16:37 --> Severity: Warning --> unlink(./assets/images/profesionales/Kikon-2021-08-16-17-15-31-Logo_Profesiolandia_face): No such file or directory C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MProfesionalAdministraCuenta.php 65
ERROR - 2021-08-16 17:16:52 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:16:52 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:18:39 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:18:39 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:18:43 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:18:43 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:18:50 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:18:51 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:19:03 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-16 17:19:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-08-16 17:19:03 --> 404 Page Not Found: Assets/libs
ERROR - 2021-08-16 17:19:03 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-16 17:19:16 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-16 17:19:17 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-16 17:19:17 --> 404 Page Not Found: Assets/libs
ERROR - 2021-08-16 17:19:17 --> 404 Page Not Found: Assets/libs
ERROR - 2021-08-16 17:19:18 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:19:18 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:00 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:00 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:11 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:11 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:20:11 --> Query error: Unknown column 'id_cat_profesion' in 'where clause' - Invalid query: SELECT  
                      p.id_cat_pregunta,
                      p.pregunta,
                      r.id_cat_respuesta,
                      r.respuesta,
                      r.carrera,
                      r.profesional, 
                      r.imagen
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion=715 ) AS p LEFT JOIN
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
                        cat_profesionales AS pr ON pr.id_cat_profesional=r.id_cat_profesional AND pr.id_cat_profesional=29 INNER JOIN 
                        cat_profesiones AS pe ON pe.id_cat_profesion=pr.id_cat_profesion
                      ) AS r ON r.id_cat_pregunta=p.id_cat_pregunta
ERROR - 2021-08-16 17:22:21 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:22:21 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:22:29 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:22:29 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:25:31 --> Query error: Unknown column 'CConstruccion' in 'where clause' - Invalid query: select  
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
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
            d.tel,
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            ifnull(p.metodos_pago,'') as metodos_pago,              
            p.email
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional=CConstruccion 
ERROR - 2021-08-16 17:25:41 --> Query error: Unknown column 'CConstruccion' in 'where clause' - Invalid query: select  
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
            concat(d.calle,' ',d.num,', ',d.colonia ) as direccion,
            d.tel,
            p.informacion_completa,
            p.cedula_profesional,
            p.cedula_profesional_postgrado,
            p.experiencia_servicios_ofrecidos,
            p.preguntas_frecuentes,
            ifnull(p.metodos_pago,'') as metodos_pago,              
            p.email
            
            from cat_profesionales as p left join 
            cat_profesiones as e on e.id_cat_profesion=p.id_cat_profesion and p.activo=1 left join 
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
            cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional 
            where p.id_cat_profesional=CConstruccion 
ERROR - 2021-08-16 17:25:52 --> Severity: Warning --> Undefined array key "id_cat_profesion" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\views\VBuscar.php 20
ERROR - 2021-08-16 17:25:52 --> Severity: Warning --> Undefined array key "id_cat_estado" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\views\VBuscar.php 21
ERROR - 2021-08-16 17:25:52 --> Severity: Warning --> Undefined array key "filtrar" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\views\VBuscar.php 41
ERROR - 2021-08-16 17:25:52 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:25:52 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:27:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:46:20 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:46:26 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:46:26 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:46:32 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:46:33 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:46:39 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-16 17:53:27 --> 404 Page Not Found: Assets/images
