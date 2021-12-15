<?php
require_once('../app/dblayer/dbconnection.php');
class dbhandler
{
    private $dbconn = null;
    public function __construct()
    {

    try{
        $database =new dbconnection();
         $db = $database->db_connect();
		 $this->db_conn = $db;
    }
    catch(Exception $exception)
    {
        throw new Exception("cannot open connection to database: ". $exception ->getMessage());
    }
}
public function read($query,$data = [])
	{

		$stm = $this->db_conn->prepare($query);

		if(count($data) == 0)
		{
			$stm = $this->db_conn->query($query);
			$check = 0;
			if($stm){
				$check = 1;
			}
		}else{

			$check = $stm->execute($data);
		}

		if($check)
		{
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($data) && count($data) > 0)
			{
				return $data;
			}

			return false;
		}else
		{
			return false;
		}
	}
	public function write($query,$data = [])
	{
		$stm = $this->db_conn->prepare($query);
	
		if(count($data) == 0)
		{
			$stm = $DB->query($query);
			$check = 0;
			if($stm){
				$check = 1;
			}
		}else{

			$check = $stm->execute($data);
		}

		if($check)
		{
			return true;
		}else
		{
			return false;
		}
	}






}
?>