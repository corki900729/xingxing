<?php 
/*namespace Admin\Controller;
use Think\Controller;                               宁鲁华  2016/5/21 数据库备份
*/
namespace Admin\Controller;
use Think\Controller;
class DatController extends PublicController {
	public function index() {
		$DataDir = "databak/";
		$m=mkdir($DataDir);
		if (!empty($_GET['Action'])) {
			import("@.MySQLReback");
			$config = array(
					'host' => C('DB_HOST'),
					'port' => C('DB_PORT'),
					'userName' => C('DB_USER'),
					'userPassword' => C('DB_PWD'),
					'dbprefix' => C('DB_PREFIX'),
					'charset' => 'UTF8',
					'path' => $DataDir,
					'isCompress' => 0, //是否开启gzip压缩
					'isDownload' => 0
			);
			$mr = new MySQLReback($config);
			$mr->setDBName(C('DB_NAME'));
			if ($_GET['Action'] == 'backup') {
				$m=$mr->backup();
				echo "<script>document.location.href='" . U("Dat/index") . "'</script>";
				//                $this->success( '数据库备份成功！');
			} elseif ($_GET['Action'] == 'RL') {
				$mr->recover($_GET['File']);
				echo "<script>document.location.href='" . U("Dat/index") . "'</script>";
				//                $this->success( '数据库还原成功！');
			} elseif ($_GET['Action'] == 'Del') {
				if (@unlink($DataDir . $_GET['File'])) {
					// $this->success('删除成功！');
					echo "<script>document.location.href='" . U("Dat/index") . "'</script>";
				} else {
					$this->error('删除失败!',U('Dat/index'));
				}
			}
			if ($_GET['Action'] == 'download') {

				function DownloadFile($fileName) {
					ob_end_clean();
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Length: ' . filesize($fileName));
					header('Content-Disposition: attachment; filename=' . basename($fileName));
					readfile($fileName);
				}
				DownloadFile($DataDir . $_GET['File']);
				exit();
			}
		}
		$lists = $this->MyScandir('databak/');		
        $n=1;
		foreach($lists as $k=>$v){
			if($k>1){
				//$arr=array();
		$fileTime=getfiletime($v,$DataDir);
		$fileSize=getfilesize($v, $DataDir);
        $arr[$n]['name']=$v;
		$arr[$n]['fileSize']=$fileSize;
		$arr[$n]['fileTime']=$fileTime;
		$n++;
		}		
	}
	//var_dump($arr);
	    $this->assign("datadir",$DataDir);
		$this->assign('arr',$arr);
		$this->display();
	}
	 private function MyScandir($FilePath = './', $Order = 0) {
		$FilePath = opendir($FilePath);
		while (false !== ($filename = readdir($FilePath))) {
			$FileAndFolderAyy[] = $filename;
		}
		$Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
		return $FileAndFolderAyy;
	}

}
