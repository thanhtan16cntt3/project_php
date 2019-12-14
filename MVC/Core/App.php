<?php  
	class App{
		protected $Controller = "Home";
		protected $Action = "index";
		protected $Params = [];

		function __construct(){
			$arr = $this->URLProcess();
			//Xu ly controller
			if(file_exists("./MVC/Controllers/".$arr[0].".php")){
				$this->Controller = $arr[0];
				unset($arr[0]);
			}
			require_once "./MVC/Controllers/".$this->Controller.".php";
			$this->Controller = new $this->Controller;
			//Xu ly action
			if( isset($arr[1]) ){
				if(method_exists($this->Controller, $arr[1])){
					$this->Action = $arr[1];
				}
				unset($arr[1]);
			}

			//Xu ly params 
        	$this->params = $arr?array_values($arr):[];

			call_user_func_array([$this->Controller, $this->Action], $this->Params);
		}

		function URLProcess(){
			if( isset($_GET["url"]) ){
				return explode("/", filter_var(trim($_GET["url"])));
			}
		}
	}
?>