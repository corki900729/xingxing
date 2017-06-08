<?php
/* 分页方法 */
function Page($rows, $page_size, $page)
{

    $page_count = ceil($rows / $page_size);
    $rows1 = array();
    if ($page >= $page_count)
        $page = $page_count;
    if ($page <= 1 || $page == '')
        $page = 1;
    $select_limit = $page_size;
    $str = '';
    if ($_SERVER['QUERY_STRING']) {
        $pos = strpos($_SERVER['QUERY_STRING'], '&');
        if ($pos !== false) {
            $str = substr($_SERVER['QUERY_STRING'], 0, $pos);
        } else {
            $str = $_SERVER['QUERY_STRING'];
        }

    }

    $w_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?" . $str;
    $select_from = ($page - 1) * $page_size;
    $rows1['page_l'] = $select_from;
    $rows1['page_r'] = $select_limit;
    $pre_page = ($page == 1) ? 1 : $page - 1;
    $next_page = ($page == $page_count) ? $page_count : $page + 1;

    /* $pagenav .= "<a href='" . $w_url . "&page=1' class='paginate_button previous disabled'>首页</a> "; */
    $pagenav .= "<a href='" . $w_url . "&page=" . $pre_page . "' class='paginate_button previous disabled'>前一页</a> ";
    $pagenav .= "<a href='" . $w_url . "&page=" . $next_page . "' class='paginate_button previous disabled'>后一页</a> ";
    /* $pagenav .= "<a href='" . $w_url . "&page=" . $page_count . "' class='paginate_button previous disabled'>末页</a>"; */
    /* $pagenav .= "第 " . $page . "/" . $page_count . " 页 共 " . $rows . " 条 ";  */
    $pagenav .= "<select name='topage' size='1' onchange='window.location=\"" . $w_url . "&page=\"+this.value'>\n";
    for ($i = 1; $i <= $page_count; $i++) {
        if ($i == $page)
            $pagenav .= "<option value='$i' selected>$i</option>\n";
        else
            $pagenav .= "<option value='$i'>$i</option>\n";
    }
    $pagenav .= '</select>';
    $rows1['page'] = $pagenav;
    return $rows1;
}


/* 分页方法 */
function Page2($rows, $page_size, $page, $gtype, $title)
{
    $page_count = ceil($rows / $page_size);
    $rows1 = array();
    if ($page >= $page_count)
        $page = $page_count;
    if ($page <= 1 || $page == '')
        $page = 1;
    $select_limit = $page_size;
    $w_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?";
    $select_from = ($page - 1) * $page_size;
    $rows1['page_l'] = $select_from;
    $rows1['page_r'] = $select_limit;
    $pre_page = ($page == 1) ? 1 : $page - 1;
    $next_page = ($page == $page_count) ? $page_count : $page + 1;

    $pagenav .= "<a href='" . $w_url . "&page=1&gtype=" . $gtype . "&title=" . $title . "' class='paginate_button previous disabled'>首页</a> ";
    $pagenav .= "<a href='" . $w_url . "&page=" . $pre_page . "&gtype=" . $gtype . "&title=" . $title . "' class='paginate_button previous disabled'>前一页</a> ";
    $pagenav .= "<a href='" . $w_url . "&page=" . $next_page . "&gtype=" . $gtype . "&title=" . $title . "' class='paginate_button previous disabled'>后一页</a> ";
    $pagenav .= "<a href='" . $w_url . "&page=" . $page_count . "&gtype=" . $gtype . "&title=" . $title . "' class='paginate_button previous disabled'>末页</a>";
    $pagenav .= "第 " . $page . "/" . $page_count . " 页 共 " . $rows . " 条 ";
    $pagenav .= "跳到&nbsp;&nbsp;<select name='topage' size='1' onchange='window.location=\" " . $w_url . "&gtype=" . $gtype . "&title=" . $title . "&page=\"+this.value'>\n";
    for ($i = 1; $i <= $page_count; $i++) {
        if ($i == $page)
            $pagenav .= "<option value='$i' selected>$i</option>\n";
        else
            $pagenav .= "<option value='$i'>$i</option>\n";
    }
    $pagenav .= '</select>';
    $rows1['page'] = $pagenav;
    return $rows1;
}


//通过pid获取广告位置
function get_adp_name($pid)
{
    $name = M('adposition')->where("id = '$pid'")->getField('name');
    return $name;
}

//通过admin_id获取admin_name
function get_admin_name($admin_id)
{
    $admin_name = M('admin')->where("id = '$admin_id'")->getField('name');
    return $admin_name;
}

//通过typeid获取分类
function get_goods_type($id)
{
    $type_name = M('gtype')->where("id='$id'")->getField('gtype');
    return $type_name;
}

/**
 * 无限分类结果展示
 * @param int $pid
 * @return string
 */
function get_str($pid = 0, $sn = '', $id = '')
{
    global $str;
    $result = M("arctype")->where("pid='$pid'")->order("sort DESC")->select();//查询pid的子类的分类
    $sn = $sn . '----';
    if ($result) {//如果有子类
        foreach ($result as $v) { //循环记录集
            if ($id == $v['type_id']) {
                $str .= "<option value='{$v['type_id']}' selected='selected'>$sn{$v['type_name']}</option>"; //构建数组
                get_str($v['type_id'], $sn);
            } else {
                $str .= "<option value='{$v['type_id']}' disabled='disabled'>$sn{$v['type_name']}</option>"; //构建数组
                get_str($v['type_id'], $sn, $id);
            }
        }
    }
    return $str;
}


//读取SEO规则
function get_seo_meta($vars, $seo)
{

    //获取还没有经过变量替换的META信息
    $meta = D('Common/SeoRule')->getMetaOfCurrentPage($seo);
    return $meta;
    //替换META中的变量
    /*     foreach ($meta as $key => &$value) {
            $value = seo_replace_variables($value, $vars);
        }
        unset($value); */

    //返回被替换的META信息

}

function seo_replace_variables($string, $vars)
{
    //如果输入的文字是空的，那就直接返回空的字符串好了。
    if (!$string) {
        return '';
    }

    //调用ThinkPHP中的解析引擎解析变量
    $view = new Think\View();
    $view->assign($vars);
    $result = $view->fetch('', $string);

    //返回替换变量后的结果
    return $result;
}

function clean_all_cache()
{
    $dirname = './Application/Runtime/';

//清文件缓存
    $dirs = array($dirname);
//清理缓存
    foreach ($dirs as $value) {
        rmdirr($value);
    }
    @mkdir($dirname, 0777, true);
}

function rmdirr($dirname)
{
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    if ($dir) {
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }
    }
    $dir->close();
    return rmdir($dirname);
}

//封装的批量删除方法
/**
 * @param $table 表模型
 * @param $ids  删除主键的组合，请以‘，’逗号分隔
 * @param $childs 表示是否有子类 若有请传1，否则传0
 * @param $key  表主键字段名
 * @return mixed
 */
function del_all($table, $ids, $childs, $key)
{
    $dids = substr($ids, 0, -1);
    dump($dids);
    $pids = explode(',', $ids, -1);
    $where['pid'] = array('in', $pids);
    if ($childs) {
        $child = $table->where($where)->select();
    } else {
        $child = false;
    }
    $arr = array();
    if ($child) {
        $childs = 1;
        foreach ($child as $k => $v) {
            $arr[] = $v[$key];
        }
        $arrs = implode(",", $arr);
        $arrs = $arrs . ',';
        $res = $table->delete($dids);
        del_all($table, $arrs, $childs, $key);
    } else {
        $childs = 0;
        $res = $table->delete($dids);
    }

    return $res;
}

/**
 * @param $model 模型
 * @param string $fields字段
 * @param string $where 条件
 * @param $type 类型  select find
 * @param $limit
 * @param $order
 * @return mixed 返回数组
 */
function getSelect($model, $type = 'select', $order = '', $limit = '', $fields = '*', $where = "1=1")
{
    if ($type == 'select') {
        $data = $model->where($where)->field($fields)->limit($limit)->order($order)->select();
    } elseif ($type == 'find') {
        $data = $model->where($where)->field($fields)->find();
    }
    return $data;

}

/**
 * @param $name input框的name属性
 * @param $input input框的type值
 * @param $alias input框的别名
 * @param $value  input框的value值
 * select $value=array(array('value'=>1,'option_name'=>名称))
 */
function getHtml($name, $input, $alias, $value, $placeholder)
{
    return array('name' => $name, 'input' => $input, 'alias' => $alias, 'value' => $value, 'placeholder' => $placeholder);
}

function uploadImg($fileName, $fieldName)
{
    if ($_FILES[$fieldName]['error'] == 0)
        $upload = new \Think\Upload(); // 实例化上传类
    $upload->maxSize = 31457280; // 设置附件上传大小
    $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->rootPath = './Uploads/'; // 设置附件上传根目录
    $upload->savePath = 'admin/' . CONTROLLER_NAME . '/'; // 设置附件上传（子）目录
    $upload->saveName = array('uniqid', time() . '_' . mt_rand());
    $info = $upload->upload();
    if (!$info) {
        $data['error'] = $upload->getError();
    } else {
        $data['pic'] = "/Uploads/" . $info[$fieldName]['savepath'] . $info[$fieldName]['savename'];
    }
    return $data;
}

/**
 * @param $pid
 * @return mixed
 * @author lf
 */
function get_ads($pid){
    return M('ads')->where('pid = '.$pid)->find();
}

function get_sys($id){
    return M('system')->where('id = '.$id)->find();
}