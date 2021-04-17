<?php
class MMenu extends CI_Model {
	
    function __construct() {
        parent::__construct();
      } 

      public function MenuRol($id_cat_rol){        
        
        $sqlsrvDB = $this->load->database('dbProfesiolandia',TRUE);
        $query="select 
                m.`id_cat_menu`,
                m.`descripcion`,
                m.accion,
                m.iconos,
                m.padre,
                m.orden, 
                (
                  select count(*) as hijos 
                  from cat_menu as temp where temp.padre=m.`id_cat_menu` and m.activo=1 and
                  temp.`id_cat_menu` in (select id_cat_menu from rel_rol_menu where id_cat_rol='{$id_cat_rol}')  
                ) as hijos,
                CASE
                    WHEN m.padre =0  THEN m.`descripcion`      
                    ELSE                  ''
                END as nombrePadre
                
                from rel_rol_menu as r inner join 
                cat_menu as m on r.`id_cat_rol`='{$id_cat_rol}' and r.`id_cat_menu`=m.`id_cat_menu` and m.activo=1  
                
                order by m.orden";
        $resultado = $sqlsrvDB->query($query);		
	      return $resultado->result();
    }   
    

}
