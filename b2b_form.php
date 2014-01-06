<?php	include_once '/var/www/icewoods/include/config.php';	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>B2B商務合作意願表 冰河森林數位科技有限公司</title>
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
<link href="css/tw_b2b_form_style.css" rel="stylesheet" type="text/css" /><link href="font_style.css" rel="stylesheet" type="text/css" />
<script src="js/email_form_check.js"></script>
</head>
<body>
<!--------首頁wapper開始--------->
<div id="wapper">
<!--------header語系切換及按讚區塊開始--------->
<?php	include_once 'indexbody/header.php';	?>
<!--------header語系切換及按讚區塊結束--------->
<!----------------------------內容區塊開始-------------------------->
<div id="content_all">
<!-----------b2b上方主圖區開始---------->
<div id="b2b_mainimage"></div>
<!-----------b2b上方主圖區結束---------->
<!---------------------聯絡我們開始--------------------->
<div id="index_contact_us">
<form id="b2b_form_data" name="b2b_form_data" method="post" action="send_mail_to_b2b.php">
<!------員工標題開始-------->
<div id="index_all_header"><span class="header_type_green">B2B商務合作意願表</span><span class="header_type_gray"> B2B Cooperation Form</span></div>
<!------員工標題結束-------->
<!------email表單開始-------->
<div id="email_form_all">
  <div id="email_form"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="160" class="email_form_type">*組織型態：</td>
    <td width="660"><input type="checkbox" name="organization[]" id="original" value="original"/>
      <span class="email_form_type"><label for="original">原廠 </label></span>
      <input type="checkbox" name="organization[]" id="distributor" value="distributor"/>
      <span class="email_form_type"><label for="distributor">總代理 </label></span>
      <input type="checkbox" name="organization[]" id="dealer" value="dealer" />
      <span class="email_form_type"><label for="dealer">經銷商 </label></span>
      <input type="checkbox" name="organization[]" id="import_export" value="import_export"/>
      <span class="email_form_type"><label for="import_export">進出口商</label></span>
      <input type="checkbox" name="organization[]" id="other" value="other"/>
      <span class="email_form_type"><label for="other">其他 </label>
      <input name="other_data" type="text" class="input_form_style03" id="other_data" />
      </span></td>
  </tr>
  <tr>
    <td class="email_form_type">*公司名稱：</td>
    <td><input name="company" type="text" class="input_form_style01" id="company" size="30" /></td>
  </tr>
  <tr>
    <td class="email_form_type">統一編號：</td>
    <td><input name="crn" type="text" class="input_form_style01" id="crn" size="30" /></td>
  </tr>
  <tr>
    <td class="email_form_type">*聯絡地址：</td>
    <td><input name="address" type="text" class="input_form_style01" id="address" /></td>
  </tr>
  <tr>
    <td class="email_form_type">*公司電話：</td>
    <td><input name="phone_1" type="text" class="input_form_style03" id="phone_1" />
      <span class="email_form_type">─</span>
      <input name="phone_2" type="text" class="input_form_style03" id="phone_2" />
        <span class="email_form_type">分機</span>        <input name="phone_3" type="text" class="input_form_style03" id="phone_3" /></td>
  </tr>
  <tr>
    <td class="email_form_type">公司網址：</td>
    <td><input name="url" type="text" class="input_form_style01" id="url" /></td>
  </tr>
  <tr>
    <td class="email_form_type">*聯絡人：</td>
    <td><input name="contact" type="text" class="input_form_style03" id="contact" />
      <span class="email_form_type">      職稱：
      <select class="input_form_style03" name="title" id="title">
        <option value="" selected="">請選擇</option>
        <option value="高階主管">高階主管</option>
        <option value="中階主管">中階主管</option>
        <option value="專員">專員</option>
        <option value="秘書">秘書</option>
        <option value="助理">助理</option>
        <option value="工讀人員">工讀人員</option>
        <option value="其他">其他</option>
      </select>
      <!-- <input name="title" type="text" class="input_form_style03" id="title" /> -->
      </span></td>
  </tr>
  <tr>
    <td class="email_form_type">公司傳真：</td>
    <td><input name="fax" type="text" class="input_form_style01" id="fax" /></td>
  </tr>
  <tr>
    <td class="email_form_type">*電子郵件：</td>
    <td><input name="email" type="text" class="input_form_style01" id="email" /></td>
  </tr>
  <tr>
    <td class="email_form_type">行動電話：</td>
    <td><input name="mobile" type="text" class="input_form_style01" id="mobile" /></td>
  </tr>
  <tr>
    <td class="email_form_type">合作內容：<br><font size="4">(公司介紹)　　</font></td>
    <td><textarea name="intro" rows="5" class="input_form_style02" id="intro"></textarea></td>
  </tr>
  </table>
</div>
<div id="send_email">
  <ul>
    <li class="cancel"><a href="javascript:document.b2b_form_data.reset();">取消重寫</a></li>
     <li class="send_mail"><a href="javascript:check_BtoB_form_data();">確認送出</a></li>
  </ul>
</div>
</div>
<!------email表單結束-------->
</form>
</div>
<!---------------------聯絡我們結束--------------------->
<!---------------------平台聯結開始---------------------><!---------------------平台聯結結束--------------------->
</div>
<!----------------------------內容區塊結束-------------------------->
<!--------footer區塊開始--------------------->
<?php	include_once 'indexbody/footer.php';	?>
<!--------footer區塊結束--------------------->
</div>
<!--------首頁wapper結束--------->
</body>
</html>
