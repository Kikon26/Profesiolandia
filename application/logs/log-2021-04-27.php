<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-27 17:47:22 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:47:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-27 17:48:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-27 17:48:14 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:48:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-27 17:49:03 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:51:16 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:51:19 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:51:45 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:53:23 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:53:24 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:53:32 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:53:51 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:54:54 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:54:56 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 17:55:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-27 17:55:11 --> 404 Page Not Found: CBase/index
ERROR - 2021-04-27 18:02:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-27 19:16:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'order by calificacion desc' at line 21 - Invalid query: select 
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
              cat_direcciones as d on d.id_cat_profesional=p.id_cat_profesional left join 
              cat_estados as s on s.id_cat_estado=d.id_cat_estado left join 
              cat_opiniones as o on o.id_cat_profesional=p.id_cat_profesional WHERE f.id_cat_usuario=   order by calificacion desc 
ERROR - 2021-04-27 19:16:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado' at line 17 - Invalid query: select  
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
            from usuarios as p inner join             
            cat_direcciones as d on d.id_cat_usuario=p.id_cat_usuario and p.id_cat_usuario= left join 
            cat_estados as s on s.id_cat_estado=d.id_cat_estado
ERROR - 2021-04-27 22:58:27 --> 404 Page Not Found: CRegistro2/index
ERROR - 2021-04-27 23:03:35 --> 404 Page Not Found: Condiciones_serviciophp/index
