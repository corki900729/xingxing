<?php



//获取文件修改时间
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

//获取文件的大小
function getfilesize($file, $DataDir) {
    $perms = stat($DataDir . $file);
    $size = $perms['size'];
    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}



function recursive ($array, $pid=0, $level=0) {
	$arr = array();

	foreach ($array as $v) {
		if ($v['pid'] == $pid) {
			$v['level'] = $level;
			$v['html'] = str_repeat('--', $level);
			$arr[] = $v;
			$arr = array_merge($arr, recursive($array, $v['type_id'], $level + 1));
		}
	}

	return $arr;
}

//根据属性值的id获取属性值
function get_attr($id){
	$attr=M('attr_tag')->where("id='$id'")->getField('attr');
	return $attr;
}


