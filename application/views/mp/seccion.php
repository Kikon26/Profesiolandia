<?php 
switch ($seccion) {
    case 'indicadores':
    	//<!-- Custom CSS -->
		echo '<link href="'.base_url().'assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/extra-libs/c3/c3.min.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/libs/morris.js/morris.css" rel="stylesheet">';
		//<!-- Custom CSS -->
		echo '<link href="'.base_url().'dist/css/style.min.css" rel="stylesheet">';
		break;
	case 'indicadores2':
    	//<!-- Custom CSS -->
		echo '<link href="'.base_url().'assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/extra-libs/c3/c3.min.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/libs/morris.js/morris.css" rel="stylesheet">';
		//<!-- Custom CSS -->
		echo '<link href="'.base_url().'dist/css/style.min.css" rel="stylesheet">';
        break;
		
    case 'indicadoresfinancieros':
    	//<!-- Custom CSS -->
		echo '<link href="'.base_url().'assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/extra-libs/c3/c3.min.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/libs/morris.js/morris.css" rel="stylesheet">';
		//<!-- Custom CSS -->
		echo '<link href="'.base_url().'dist/css/style.min.css" rel="stylesheet">';
		break;
	case 'indicadorescabildo':
		//<!-- Custom CSS -->
		echo '<link href="'.base_url().'dist/css/style.min.css" rel="stylesheet">';
	case 'indicadoresdeproceso':
		echo '<link href="'.base_url().'assets/extra-libs/c3/c3.min.css" rel="stylesheet">';
		break;
    default:
        # code...
        break;
}

