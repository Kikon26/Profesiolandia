<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-13 19:32:23 --> 404 Page Not Found: Profesiolandia/index
ERROR - 2021-08-13 19:41:07 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:41:28 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:41:28 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:41:43 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:43:03 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:43:03 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:43:03 --> Query error: Unknown column 'id_cat_profesion' in 'where clause' - Invalid query: SELECT  
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
ERROR - 2021-08-13 19:43:57 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 310
ERROR - 2021-08-13 19:43:57 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 310
ERROR - 2021-08-13 19:43:57 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 310
ERROR - 2021-08-13 19:43:57 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 319
ERROR - 2021-08-13 19:43:57 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 319
ERROR - 2021-08-13 19:43:57 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 319
ERROR - 2021-08-13 19:44:02 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 377
ERROR - 2021-08-13 19:44:02 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 377
ERROR - 2021-08-13 19:44:02 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 377
ERROR - 2021-08-13 19:44:02 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 386
ERROR - 2021-08-13 19:44:02 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 386
ERROR - 2021-08-13 19:44:02 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 386
ERROR - 2021-08-13 19:44:06 --> Query error: Unknown column 'id_cat_profesion' in 'field list' - Invalid query: INSERT INTO `cat_preguntas` (`id_cat_usuario`, `id_cat_profesion`, `pregunta`, `fecha_alta`) VALUES ('38', '715', 'Cuanto cuesta un desarrollo de una pagina web', '2021-08-13 19:44:06')
ERROR - 2021-08-13 19:44:09 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 310
ERROR - 2021-08-13 19:44:09 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 310
ERROR - 2021-08-13 19:44:09 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 310
ERROR - 2021-08-13 19:44:09 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 319
ERROR - 2021-08-13 19:44:09 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 319
ERROR - 2021-08-13 19:44:09 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 319
ERROR - 2021-08-13 19:44:12 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 377
ERROR - 2021-08-13 19:44:12 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 377
ERROR - 2021-08-13 19:44:12 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 377
ERROR - 2021-08-13 19:44:12 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 386
ERROR - 2021-08-13 19:44:12 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 386
ERROR - 2021-08-13 19:44:12 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CPerfilCliente.php 386
ERROR - 2021-08-13 19:44:16 --> Query error: Unknown column 'id_cat_profesion' in 'field list' - Invalid query: INSERT INTO `cat_preguntas` (`id_cat_usuario`, `id_cat_profesion`, `pregunta`, `fecha_alta`) VALUES ('38', '715', 'Cuanto cuesta un desarrollo de una pagina web', '2021-08-13 19:44:16')
ERROR - 2021-08-13 19:44:48 --> 404 Page Not Found: Assets/images
ERROR - 2021-08-13 19:48:23 --> 404 Page Not Found: Assets/images
