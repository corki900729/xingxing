<?php
namespace Admin\Controller;
use Think\Controller;
class ModelController extends PublicController {
	private $model;
	function __construct(){
		parent::__construct();
		$this->model=M();
	}
    public function index(){
	    $dsn='mysql:dbname=information_schema;host=127.0.0.1';
		$user=C("DB_USER");
		$pwd=C("DB_PWD");
		try{
			$dbh=new \PDO($dsn,$user,$pwd);
		}
		catch (PDOException $e) {
	    	echo 'Connection failed: ' . $e->getMessage();
		}
		$dbh->query('set names utf8');
		$dbname=C("DB_NAME");
		$sql="select * from TABLES where TABLE_SCHEMA='{$dbname}'";
		$array=array();
		foreach( $dbh->query($sql) as $key  )
		{
			$array[]=$key ;
		}
		
		$this->tables=$array;
		$this->display(); 
		
	}
	function lists(){
		$tname=I("get.tname");
		$dsn='mysql:dbname=information_schema;host=127.0.0.1';
		$user=C("DB_USER");
		$pwd=C("DB_PWD");
		try{
			$dbh=new \PDO($dsn,$user,$pwd);
		}
		catch (PDOException $e) {
	    	echo 'Connection failed: ' . $e->getMessage();
		}
		$dbh->query('set names utf8');
		$dbname=C("DB_NAME");
		$sql="select * from information_schema.columns where table_schema ='".$dbname."'  and table_name = '".$tname."'";
		$array=array();
		foreach( $dbh->query($sql) as $key  )
		{
			$array[]=$key ;
		}
		$this->data=$array;
		$this->display();
	}
	function add(){
		if($post=I("post.")){
			$filed=$post['filed'];
			$type=$post['type'];
			$num=$post['num'];
			$tname=$post['tname'];
			$comment=$post['comment'];
			$default='';
			if(!empty($post['default'])){
				$default="default ".$post['default'];
			}
			$sql="alter table $tname add $filed $type($num) $default comment '{$comment}'";
			$dbname=C("DB_NAME"); 
			$dsn='mysql:dbname='.$dbname.';host=127.0.0.1';
			$user=C("DB_USER");
			$pwd=C("DB_PWD");
			try{
				$dbh=new \PDO($dsn,$user,$pwd);
			}
			catch (PDOException $e) {
		    	echo 'Connection failed: ' . $e->getMessage();
			}
			$dbh->query('set names utf8');
			$res=$dbh->query($sql); 
			if($res){
				$this->success("添加成功");
			}else{
				$this->error("添加失败");
			}
		}else{
			$this->display();
		}
		
		
	}

	
}