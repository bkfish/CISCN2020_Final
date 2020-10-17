<?php
include("../inc/conn.php");
include("../inc/fy.php");
include("check.php");
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo channeldl?>信息管理</title>
<link href="style/<?php echo siteskin_usercenter?>/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../js/gg.js"></script>
</head>
<body>
<div class="main">
<?php
include("top.php");
?>
<div class="pagebody">
<div class="left">
<?php
include("left.php");
?>
</div>
<div class="right">
<div class="content">
<div class="admintitle"><span><form name="form1" method="post" action="?">
产品名称：<input name="cpmc" type="text" id="cpmc2"> <input type="submit" name="Submit" value="查找 ">
</form></span><?php echo channeldl?>信息管理</div>
<?php
$page=isset($_GET["page"])?$_GET["page"]:1;
checkid($page);

$cpmc = isset($_POST['cpmc'])?trim($_POST['cpmc']):"";
$page_size=pagesize_ht;  //每页多少条数据
$offset=($page-1)*$page_size;
$sql="select count(*) as total from zzcms_dl where editor='".$username."' ";
$sql2='';
if ($cpmc<>''){
$sql2=$sql2 . " and cp like '%".$cpmc."%' ";
}
$rs =query($sql.$sql2); 
$row = fetch_array($rs);
$totlenum = $row['total'];
$totlepage=ceil($totlenum/$page_size);

$sql="select id,cp,dlsname,province,city,xiancheng,saver,passed,sendtime,looked from zzcms_dl where editor='".$username."' ";
$sql=$sql.$sql2;
$sql=$sql . " order by id desc limit $offset,$page_size";
$rs = query($sql); 
if(!$totlenum){
echo '暂无信息';
}else{
?>
<form name="myform" method="post" action="del.php" onSubmit="return anyCheck(this.form)">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="bgcolor">
          <tr class="trtitle"> 
           <td width="10%" height="25" class="border">产品名称或标题</td><td width="10%" align="center" class="border">接收人用户名</td><td width="5%" align="center" class="border">意向区域</td><td width="5%" align="center" class="border">更新时间</td><td width="5%" align="center" class="border">信息状态</td><td width="5%" align="center" class="border">操作</td><td width="5%" align="center" class="border">删除</td>
          </tr>
          <?php
while($row = fetch_array($rs)){
?>
          <tr class="trcontent"> 
            <td><a href="<?php echo getpageurl("dl",$row["id"])?>" target="_blank"><?php echo $row["cp"]?></a></td>
            <td align="center"><?php
			if ($row["saver"]<>''){
			echo "发送给：".$row["saver"].'<br/>';
			if ($row["looked"]==1 ){ echo '已查看'; }else { echo '<font color=red>未查看</font>';}
			}else{
			echo '无接收人';
			}
			 ?></td>
            <td align="center" title='<?php echo $row["city"]?>'> <?php echo $row["province"].$row["city"].$row["xiancheng"]?></td>
            <td align="center"><?php echo $row["sendtime"]?></td>
            <td align="center"> 
              <?php 
	if ($row["passed"]==1 ){ echo '已审核';}else{ echo '<font color=red>待审</font>';}
	
	  ?>            </td>
            <td align="center" > 
              <a href="dl.php?do=modify&id=<?php echo $row["id"]?>&page=<?php echo $page?>">修改</a></td>
            <td align="center" ><input name="id[]" type="checkbox" id="id" value="全选" /></td>
          </tr>
          <?php
}
?>
        </table>

<div class="fenyei">
<?php echo showpage()?>     
          <input name="chkAll" type="checkbox" id="chkAll" onClick="CheckAll(this.form)" value="checkbox" />
          <label for="chkAll">全选</label>
         
        <input name="submit"  type="submit" class="buttons"  value="删除" onClick="return ConfirmDel()"> 
        <input name="pagename" type="hidden" value="dlmanage.php?page=<?php echo $page ?>"> 
		<input name="tablename" type="hidden" id="tablename" value="zzcms_dl"> 
</div>
  </form>
<?php
}
?>
</div>
</div>
</div>
</div>
</body>
</html>