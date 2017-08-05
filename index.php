<?php 
// 报告 E_NOTICE 之外的所有错误
error_reporting(E_ALL & ~E_NOTICE);

// 需求：根据“特殊的” URL，来访问到相应的页面
// 路由：根据我们指定的规则，找到相应的页面
// 
// 路由规则： 
// http://studyit-preview.com/teacher/list
// 根据这个URL地址，找到 /views/teacher/list.html

// http://studyit-preview.com/teacher/add
// 页面：/views/teacher/add.html

// 特殊的路径:
// http://studyit-preview.com/login
// 页面: /views/index/login.html
// 
// http://studyit-preview.com
// 页面: /views/index/index.html

// 获取到 /teacher/list
$pathInfo = $_SERVER['PATH_INFO'];

// 获取到 teacher/list
$pathInfo = substr($pathInfo, 1);

// 根据 / 分割字符串
$pathInfo = explode('/', $pathInfo);
// print_r($pathInfo);

// 获取到文件夹名称  teacher
$folder = $pathInfo[0];
// 获取到文件名称    list
$file = $pathInfo[1];

// 两种特殊的路径
if( count($pathInfo) == 1 ) {
  // echo $folder;
  if($folder) {
    // /login
    $file = $folder;
  } else {
    // /
    $file = 'index';
  }
  
  $folder = 'index';
}


// 根据获取到的文件夹和文件名拼接路径加载对应的页面
include '/views/' . $folder . '/' . $file . '.html';
?>