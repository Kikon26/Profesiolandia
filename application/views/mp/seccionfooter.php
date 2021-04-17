<?php 
switch ($seccion) {
	case 'indicadores':
		//<!--chartis chart-->
		echo '<script src="'.base_url().'assets/libs/chartist/dist/chartist.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>';
		//<!--c3 charts -->
		echo '<script src="'.base_url().'assets/extra-libs/c3/d3.min.js"></script>';
		echo '<script src="'.base_url().'assets/extra-libs/c3/c3.min.js"></script>';
		//<!--chartjs -->
		echo '<script src="'.base_url().'assets/libs/raphael/raphael.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/morris.js/morris.min.js"></script>';
		//<!--This page plugins -->
    	 echo '<script src="'.base_url().'assets/extra-libs/DataTables/datatables.min.js"></script>';
		 echo '<script src="'.base_url().'dist/js/pages/datatable/datatable-basic.init.js"></script>';
		 echo '<script src="'.base_url().'assets/libs/echarts/dist/echarts-en.min.js"></script>';
		 echo '<script src="'.base_url().'assets/libs/chart.js/dist/Chart.min.js"></script>';
		 								  
		break;
	case 'indicadores2':
		//<!--chartis chart-->
		echo '<script src="'.base_url().'assets/libs/chartist/dist/chartist.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>';
		//<!--c3 charts -->
		echo '<script src="'.base_url().'assets/extra-libs/c3/d3.min.js"></script>';
		echo '<script src="'.base_url().'assets/extra-libs/c3/c3.min.js"></script>';
		//<!--chartjs -->
		echo '<script src="'.base_url().'assets/libs/raphael/raphael.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/morris.js/morris.min.js"></script>';
		//<!--This page plugins -->
		echo '<script src="'.base_url().'assets/extra-libs/DataTables/datatables.min.js"></script>';
		echo '<script src="'.base_url().'dist/js/pages/datatable/datatable-basic.init.js"></script>';
		echo '<script src="'.base_url().'assets/libs/echarts/dist/echarts-en.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/chart.js/dist/Chart.min.js"></script>';
		break;
	case 'indicadoresfinancieros':
		//<!--chartis chart-->
		echo '<script src="'.base_url().'assets/libs/chartist/dist/chartist.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>';
		//<!--c3 charts -->
		echo '<script src="'.base_url().'assets/extra-libs/c3/d3.min.js"></script>';
		echo '<script src="'.base_url().'assets/extra-libs/c3/c3.min.js"></script>';
		//<!--chartjs -->
		echo '<script src="'.base_url().'assets/libs/raphael/raphael.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/morris.js/morris.min.js"></script>';
		//<!--This page plugins -->
		echo '<script src="'.base_url().'assets/extra-libs/DataTables/datatables.min.js"></script>';
		echo '<script src="'.base_url().'dist/js/pages/datatable/datatable-basic.init.js"></script>';
		echo '<script src="'.base_url().'assets/libs/echarts/dist/echarts-en.min.js"></script>';
		echo '<script src="'.base_url().'assets/libs/chart.js/dist/Chart.min.js"></script>';
		break;
	case 'indicadorescabildo':
		//<!--This page plugins -->
		echo '<script src="'.base_url().'assets/libs/echarts/dist/echarts-en.min.js"></script>';
		break;
	case 'indicadoresdeproceso': 
		//<!--c3 charts -->
		echo '<script src="'.base_url().'assets/extra-libs/c3/d3.min.js"></script>';
		echo '<script src="'.base_url().'assets/extra-libs/c3/c3.min.js"></script>';
		break;



    default:
        # code...
        break;
}
