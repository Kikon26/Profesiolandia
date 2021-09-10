<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-25 11:05:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: select  
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
            from cat_profesionales as p left join             
            cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional and d.dom_particular=1  left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
            where p.id_cat_profesional= 
ERROR - 2021-08-25 13:07:04 --> 404 Page Not Found: Assets/images
