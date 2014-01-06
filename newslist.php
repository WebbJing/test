<?php
include_once '/var/www/icewoods/include/config.php';
include_once '../include/errorCode.php';
include_once '../include/iwInfo.php';
include_once '../include/connectDB.php';
include_once '../include/class.ErrorMsg.php';
include_once '../include/str_sql_protect.php';
#------------------------------------------
#
#2013-11-08
#Melanie
#新聞列表
#------------------------------------------
$objError = new ErrorMsg();
if(empty($langs))
{
	$objError->intCode = '198';
	$objError->strMsg = '語系資料 '.$ary_ErrorCode[$objError->intCode];
	//$objError->toLog();
	die($objError->EchoAlert(__ERRORBACK__));
}
if(!filter_var($langs, FILTER_SANITIZE_STRING))
{
	$objError->intCode = '199';
	$objError->strMsg = '語系格式 '.$ary_ErrorCode[$objError->intCode];
	//$objError->toLog();
	die($objError->EchoAlert(__ERRORBACK__));
}

#調資料
$dbInfo = new iwInfo();
$connDB = new connectDB($dbInfo->host, $dbInfo->username, $dbInfo->password, $dbInfo->dbname);
$connId = $connDB->getconnId();
if(!$connId){
    $objError->intCode = '201';
    $objError->strMsg = '資料錯誤';
    //$objError->toLog();
    die($objError->EchoAlert(__ERRORBACK__));
}
$str_sql = "SELECT i1_id, i1_topic, i1_content, i1_uptime, i1_img FROM i1_news_".$langs." ";
$str_sql .= "WHERE i1_isDel = FALSE AND i1_isUp = TRUE AND TIMESTAMP(i1_uptime) <= TIMESTAMP(NOW()) ";
$str_sql .= "ORDER BY i1_uptime DESC;";
$result_select = mysql_query($str_sql);
if(!$result_select){
    $objError->intCode = '204';
    $objError->strMsg = '資料錯誤';
    //$objError->toLog();
    die($objError->EchoAlert(__ERRORBACK__));
}

$ary_news_list = array();
while($record = mysql_fetch_array($result_select))
{
    
    $str_news_year = date('Y', strtotime($record['i1_uptime']));
    if(!isset($ary_news_list[$str_news_year]) || !is_array($ary_news_list[$str_news_year])){
        $ary_news_list[$str_news_year] = array();
    }
    $ary_tmp = array();
    $ary_tmp['i1_id'] = $record['i1_id'];
    $ary_tmp['i1_topic'] = $record['i1_topic'];
    $ary_tmp['i1_content'] = $record['i1_content'];
    $ary_tmp['i1_uptime'] = $record['i1_uptime'];
    $ary_tmp['i1_img'] = $record['i1_img'];
    array_push($ary_news_list[$str_news_year], $ary_tmp);
    unset($ary_tmp);
}
unset($record);
mysql_free_result($result_select);
// reset($ary_news_list);
// var_dump($ary_news_list);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新聞列表 冰河森林數位科技有限公司</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<Meta http-equiv="Expires" content="-1">
<meta http-equiv="imagetoolbar" content="false">
<meta name="title" content="冰河森林數位科技有限公司" />
<meta name="description" content="冰河森林數位科技有限公司 ICEWOODS DIGITAL TECHNOLOGY CO., Ltd www.icewoods.com"/>
<meta name="COPYRIGHT" content="&amp; 2013 Icewoods. All Right Reserved." />
<meta name="AUTHOR" content="Icewoods" />
<link rel="image_src" href="image/icewoods_img.jpg" />
<?php	include_once 'indexbody/default_css.php';	?>
<?php	include_once 'indexbody/default_js.php';	?>
<link href="css/tw_newslist_style.css" rel="stylesheet" type="text/css" /><link href="font_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--------首頁wapper開始--------->
<div id="wapper">
<!--------header語系切換及按讚區塊開始--------->
<?php	include_once 'indexbody/header.php';	?>
<!--------header語系切換及按讚區塊結束--------->
<!----------------------------內容區塊開始-------------------------->
<div id="content_all">
<!-----------about_us上方主圖區開始---------->
<div id="newslist_mainimage">
    <div id="icewoods_logo_area"><?php	include_once 'indexbody/icewoods_logo.php';	?></div>
</div>
<!-----------about_us上方主圖區結束---------->
<!-----------主選單開始--------------------->
<?php	include_once 'indexbody/main_menu.php';	?>
<!------------主選單結束-------------------->
<!---------------------新聞列表開始--------------------->
<div id="news_module_content_all">
<?php
foreach($ary_news_list as $str_news_year => $ary_news_list){
    echo '
    <!------年分開始-------->
    <div id="year_name">'. $str_news_year .'</div>
    <!------年分結束-------->
    <div id="news_module_all">
    ';
    foreach($ary_news_list as $newsInfo){
        echo '
            <!------新聞模組開始-------->
            <div id="news_list_module">
            <div id="news_list_module_image"><img src="news_main_img/'.$langs.'_'. $newsInfo['i1_id'].$newsInfo['i1_img'] .'" width="200" height="150" /></div>
            <div id="news_list_module_content">';
        if(!empty($newsInfo['i1_content'])){
            echo '<a href="newsdetail.php?newsId='. $newsInfo['i1_id'] .'">'. date('Y/m/d', strtotime($newsInfo['i1_uptime'])) .'<br />'. $newsInfo['i1_topic'] .'</a>';
        }
        else{
            echo date('Y/m/d', strtotime($newsInfo['i1_uptime'])) .'<br />'. $newsInfo['i1_topic'];
        }
        echo '
        </div>';
        if(!empty($newsInfo['i1_content'])){
            echo ' 
                <!-----詳細頁面---->
                <div id="to_detail"><a href="newsdetail.php?newsId='. $newsInfo['i1_id'] .'">詳細頁</a></div>
                <!-----詳細頁面---->';
        }
        echo '
            </div>
            <!------新聞模組結束-------->
        ';
    }
    echo '</div>';
}
?>

<!------新聞模組區全部結束-------->
</div>
<!---------------------新聞列表結束--------------------->
</div>
<!----------------------------內容區塊結束-------------------------->
<!--------footer區塊開始--------------------->
<?php	include_once 'indexbody/footer.php';	?>
<!--------footer區塊結束--------------------->
</div>
<!--------首頁wapper結束--------->
</body>
</html>
