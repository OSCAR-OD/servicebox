<?php

Class dbconnection
{
	
	public function db_connect()
	{
		//$this->conn =null;
		$options =[
			PDO::ATTR_EMULATE_PREPARES     =>false,
		PDO::ATTR_ERRMODE              =>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC,
	
		];
		try{

			$string = DB_TYPE .":host=".DB_HOST.";dbname=".DB_NAME.";";
			return $db = new PDO($string,DB_USER,DB_PASS,$options);
			
		}catch(PDOExecption $e){

			die($e->getMessage());
		}
	}




	}

?>
