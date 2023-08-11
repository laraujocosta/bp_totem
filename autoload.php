<?php
session_start();


function autoload($class){

	$diretorios = array('/model/', '/controller/', '/objects/', '/globalclass/', '/interface/','/vendor/artistadaweb/aw/php/controller/');
	//echo $class;
           /* if (file_exists($class . '.class.php')) {
            require_once $class . '.class.php';
			}*/
		
    foreach ($diretorios as $valor) {
        if (file_exists(str_replace("\\","/",__DIR__.$valor . $class . '.class.php'))) {
            require_once str_replace("\\","/",__DIR__.$valor . $class . '.class.php');
        }
    }

/*
	if(file_exists(str_replace("\\","/",__DIR__."/model/".$class . ".class.php"))){
		require_once(str_replace("\\","/",__DIR__."/model/".$class . ".class.php"));

	}else if(file_exists(str_replace("\\","/",__DIR__."/controller/".$class . ".class.php"))){
		require_once(str_replace("\\","/",__DIR__."/controller/".$class . ".class.php"));	
	}else if(file_exists(str_replace("\\","/",__DIR__."/vendor/artistadaweb/aw/controller/".$class . ".class.php"))){
		require_once(str_replace("\\","/",__DIR__."/vendor/artistadaweb/aw/controller/".$class . ".class.php"));	

	}else if(file_exists(str_replace("\\","/",__DIR__."/objects/".$class . ".class.php"))){
		require_once(str_replace("\\","/",__DIR__."/objects/".$class . ".class.php"));	
		
	}else if(file_exists(str_replace("\\","/",__DIR__."/globalclass/".$class . ".php"))){
		require_once(str_replace("\\","/",__DIR__."/globalclass/".$class . ".php"));
	}else if(file_exists(str_replace("\\","/",__DIR__."/vendor/awlib/controller/".$class . ".class.php"))){
		require_once(str_replace("\\","/",__DIR__."/vendor/awlib/controller/".$class . ".class.php"));
	}else if(file_exists(str_replace("\\","/",__DIR__."/interface/".$class . ".class.php"))){
		require_once(str_replace("\\","/",__DIR__."/interface/".$class . ".class.php"));	
		
	}else{
		str_replace("\\","/",__DIR__."/".$class . ".php");
	}*/
 
	
}
spl_autoload_register("autoload");

?>