<table cellpadding="2" cellspacing="1" width="98%">
    <tr> 
        <td width="120">文本框长度</td>
        <td><input type="text" name="setting[width]"  size="10" class="input">px</td>
    </tr>
    <tr> 
        <td>默认值</td>
        <td><input type="text" name="setting[defaultvalue]"  size="40" class="input"></td>
    </tr>
    <tr> 
        <td>允许上传的类型</td>
        <td><input type="text" name="setting[upload_allowext]" value="gif|jpg|jpeg|png|bmp" size="40" class="input">多个用“|”隔开</td>
    </tr>
    <tr> 
        <td>是否在图片上添加水印</td>
        <td><input type="radio" name="setting[watermark]" value="1"> 是 <input type="radio" name="setting[watermark]" value="0" checked> 否</td>
    </tr>
    <tr> 
        <td>是否从已上传中选择</td>
        <td><input type="radio" name="setting[isselectimage]" value="1" checked> 是 <input type="radio" name="setting[isselectimage]" value="0"> 否</td>
    </tr>
    <tr> 
        <td>下载统计字段</td>
        <td><input type="text" name="setting[statistics]" value="" class="input"> 下载次数统计字段只能在主表！</td>
    </tr>
    <tr>
        <td>文件链接方式</td>
        <td>
            <input name="setting[downloadlink]" value="0" type="radio">
            链接到真实软件地址 （无法进行验证和统计）
            <input name="setting[downloadlink]" value="1" checked="checked" type="radio">
            链接到下载跳转页面
        </td>
    </tr>	
</table>