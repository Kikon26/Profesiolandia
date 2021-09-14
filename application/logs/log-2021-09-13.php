<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-13 10:51:53 --> Severity: error --> Exception: Call to undefined function mysql_connect() C:\xampp\htdocs\Desarrollo\Profesiolandia\system\database\drivers\mysql\mysql_driver.php 136
ERROR - 2021-09-13 10:51:57 --> Severity: error --> Exception: Call to undefined function mysql_connect() C:\xampp\htdocs\Desarrollo\Profesiolandia\system\database\drivers\mysql\mysql_driver.php 136
ERROR - 2021-09-13 10:52:01 --> Severity: error --> Exception: Call to undefined function mysql_connect() C:\xampp\htdocs\Desarrollo\Profesiolandia\system\database\drivers\mysql\mysql_driver.php 136
ERROR - 2021-09-13 10:52:02 --> Severity: error --> Exception: Call to undefined function mysql_connect() C:\xampp\htdocs\Desarrollo\Profesiolandia\system\database\drivers\mysql\mysql_driver.php 136
ERROR - 2021-09-13 10:58:56 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 10:58:56 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:01:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
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
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion= ) AS p LEFT JOIN
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
                      order by  p.id_cat_pregunta desc
                      
ERROR - 2021-09-13 11:02:21 --> Severity: Warning --> unlink(./assets/images/profesionales/no): No such file or directory C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MProfesionalAdministraCuenta.php 65
ERROR - 2021-09-13 11:02:22 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:02:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:02:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:03:00 --> Severity: Warning --> unlink(./assets/images/profesionales/no): No such file or directory C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MProfesionalAdministraCuenta.php 65
ERROR - 2021-09-13 11:03:01 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:03:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') AS p LEFT JOIN
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
                      FROM 
                      (SELECT * FROM cat_preguntas WHERE id_cat_profesion= ) AS p LEFT JOIN
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
                      order by  p.id_cat_pregunta desc
                      
ERROR - 2021-09-13 11:06:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:06:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:06:38 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:06:47 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:07:00 --> Severity: Warning --> unlink(./assets/images/profesionales/Kikon-Profesional-2021-09-13-11-03-00-Logo_Profesi): No such file or directory C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MProfesionalAdministraCuenta.php 65
ERROR - 2021-09-13 11:07:14 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:07:14 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:07:35 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 11:12:34 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 426
ERROR - 2021-09-13 11:12:34 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 426
ERROR - 2021-09-13 11:12:34 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 426
ERROR - 2021-09-13 11:12:37 --> Severity: Warning --> Undefined variable $id_cat_rol C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 490
ERROR - 2021-09-13 11:12:37 --> Severity: Warning --> Undefined variable $id_usuario_profesional C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 490
ERROR - 2021-09-13 11:12:37 --> Severity: Warning --> Undefined variable $code C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 490
ERROR - 2021-09-13 11:12:48 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 11:33:19 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:33:19 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:36:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:36:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:36:04 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:37:32 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:37:32 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:37:32 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:39:13 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:39:13 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:39:13 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:39:24 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:39:24 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:39:24 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:40:01 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:40:01 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 11:42:45 --> 404 Page Not Found: Assets/images
ERROR - 2021-09-13 13:37:12 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 13:41:54 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 13:48:10 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 13:51:51 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 13:55:59 --> Severity: Warning --> Undefined variable $files_names C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 100
ERROR - 2021-09-13 13:56:11 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 13:59:22 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:01:17 --> Severity: Warning --> Undefined variable $files_names C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 100
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined variable $files_names C:\xampp\htdocs\Desarrollo\Profesiolandia\application\controllers\CAltaProfesional.php 137
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "google_maps" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 242
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "whatsapp" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 243
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "facebook" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 244
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "instagram" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 245
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "twitter" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 246
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "pagina_web" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 247
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "activar_redes" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 249
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "id_cat_red_social" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 253
ERROR - 2021-09-13 14:02:50 --> Severity: Warning --> Undefined array key "id_cat_red_social" C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MAltaProfesional.php 257
ERROR - 2021-09-13 14:03:52 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:05:31 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:06:07 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:14:05 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:31:41 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:32:29 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:37:43 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:37:56 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
ERROR - 2021-09-13 14:38:14 --> Severity: Warning --> Undefined variable $return_arr C:\xampp\htdocs\Desarrollo\Profesiolandia\application\models\MCalendario.php 131
