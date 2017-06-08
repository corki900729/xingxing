<?php
namespace User\Controller;
use Think\Controller;
class QtdzController extends Controller {
/*q*/
    function __construct() {
        parent::__construct();
        //友情链接模块
        $link = M("FriendLink");
        $data = $link->order("sort desc")->select();
        $link_text=array();$link_pic=array();
        foreach ($data as $k => $v) {
            if (!$v['link_name']) {
                //unset($data[$k]);
                //exit(123);
                $link_pic[$k]['link_pic']=$v['link_pic'];
                $link_pic[$k]['link_url']=$v['link_url'];
            }else{
                $link_text[$k]['link_name']=$v['link_name'];
                $link_text[$k]['link_url']=$v['link_url'];
            }
            if (!$v['link_pic']) {
                $link_text[$k]['link_name']=$v['link_name'];
                $link_text[$k]['link_url']=$v['link_url'];
            }else{
                $link_pic[$k]['link_pic']=$v['link_pic'];
                $link_pic[$k]['link_url']=$v['link_url'];
            }
            
        }
        $this->assign('link_text', $link_text);//文字链接
        $this->assign('link_pic', $link_pic);//图片链接
        
        //公共尾文章遍历
        $article = M("Arctype");
        $a_data = $article->where("pid=0")->order("sort desc")->select();
        $arr = array();
        foreach ($a_data as $k => $v) {
            $ret = $this->get_Children($v['type_id']);
            if (!$ret)
                $ret = '';
            $name = $v['type_name'];
            $arr[$name] = $ret;
        }
        //header("Content-type:text/html; charset=utf-8");
        
        //exit();
       
        $this->assign('arr', $arr);
        //购物车数量
        $uid=  session("Q_USER");
        if(!$uid){
            $count=0;
        }else{
            $count=M("Car")->where("up_id=$uid")->count();
            if(!$count){
                $count=0;
            }
        }
        $this->assign("car_count",$count);
    }
     public function get_Children($id) {
        $art_cate=M('Arctype');
        $cateData =$art_cate->where("pid=$id")->select();
        if(empty($cateData))return false;
        $ret = array();
        foreach ($cateData as $k=>$v){
            //array_push($ret,$v['type_name']);
            $key=$v['type_id'];
            $ret[$key]=$v['type_name'];
        }
        return $ret;
    }
public function login(){
$this->display('login');
}
public  function register(){
$this->display('register');
}
//    用户存在判断  --注册
public function userpd($name1='',$type=''){
     $name=I('zhangh');
     $where['name']=$name;
     $num= M('user')->where($where)->count();
    if($type==1){
        $where2['name']=$name1;
        $num3= M('user')->where($where2)->count();
        return $num3;
    }else if($type==2){
        $where1['name']=$name1;
        $num2= M('user')->where($where1)->field('id')->find();
        return $num2['id'];
    }else{
    $num1=$num==0?9:-1;
    echo $num1;
    }
}

    public function qtzc(){
        $zhangh=I('zhangh');
        $tj= I('tj');

        $zxxm= I('zxxm');
        $phone= I('phone');
        $email= I('email')?:'';
        $sx= I('sx');
        $ds= I('ds');
        $xs= I('xs')?'-'.I('xs'):'';
        $xiangx= I('xiangx');
        $mm= I('mm');
          $zhangh1=  $this->userpd($zhangh,1);
        if($zhangh1>0){$this->error('该账号已经存在','register');exit;}
        $tj1=  $this->userpd($tj,2);
        if(!$tj1){ $this->error('推荐人不存在','register');exit;}
//        Id	name	password  	 email 	phone	 dq   jf 	dj _jf 	grand	 up_id 	l_time	 	user_addr  status  yj  dj_yj   c_name  r_time
        $where['name']=$zhangh;
        $where['password']=lx_ucenter_encrypt($mm,$zhangh);
        $where['email']=$email;
        $where['phone']=$phone;
        $where['address']=$sx.'-'.$ds.$xs;
        $where['grand']=0;
        $where['up_id']=$tj1;
        $where['user_addr']=$xiangx;
        $where['status']=1;
        $where['c_name']=$zxxm;
        $where['r_time']=time();
        $where['user_up']=Fzid($tj1);
        $User=M('user');
        if (!$User->autoCheckToken($_POST)){
                header("location:/User/Qtdz/register");
        }else{
            if($User->create($where)){
                $User->add();
                header("location:/User/Qtdz/login");
            }
        }

    }
/*q*/
//验证码
	public function verify($code=''){
		$code=I('code');
		if(!$code){
		$verify = new \Think\Verify();
		$verify->entry(2);}else{		
		$verify = new \Think\Verify();
	    $verify1= $verify->check($code, 2);
		$verify2=$verify1?1:2;
		echo  $verify2;
		}
	}
//    --注册结束
//登陆
public function denglu(){
    $username=I('textfield');
    $passwd=I('textfield1');
    if($username && $passwd){
        /*对身份的基本信息进行查询*/
        $user=M('user');
        if (!$user->autoCheckToken($_POST)){
            $ab='不能重复提交';
        }else{
        $where['name'] = $username;
        $where['grand'] =array(0,8,'or');
        $rows=$user->where($where)->select();
        if($rows) {
            $password = $rows[0]['password'];
            if ($password == lx_ucenter_encrypt($passwd, $username)) {
                session('Q_USER',$rows[0]['id']);
                header("location:/");
            }else{
                $ab='密码不正确';
            }
        }else{  $ab='用户名不存在';}
    }
    }
    $this->assign('ab',$ab);
    $this->display('login');
}
//登陆
	#code..————
//会员列表的新增
	public function adduser(){
        $user=I('name');
	$pas=I('pas');
	  $password=lx_ucenter_encrypt($pas,$user);
	  $User = M("user");
        $data['up_id']=$data['user_up']=session('USER');
	  $data['name']=$user;
	  $data['password']=$password;
	  $data['status']=1;
	  $data['grand']=0;
	  if($User->create($data)){
	  $result = $User->add(); 
	  header("location:/Admin/User/mlist");		
	  }	  
	}
 //密码修改
    public function edt(){
        $mm=I('mm');
        $id=I('id');
        //获取当前的管理员
        $admin=session("USER")?:'';
        $name= M('user')->where("id=$id")->field('name')->find();
        $password=lx_ucenter_encrypt($mm,$name['name']);
        $data['password']=$password;
        $User = M("user");
        if($User->create($data)){
          $result = $User->where("id=$id")->save();
            if($admin!=$id){
          header("location:/Admin/User/mlist");
                }else{
            $this->tc();
            }
        }
    }
    //退出功能
    public function tc(){
        session('Q_USER',null);
        header("location:/user/qtdz/login");
    }
    
    
}