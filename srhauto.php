<?php
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    //echo '左边:'.$left;
    $right = strpos($str, $rightStr,$left);
    //echo '<br>右边:'.$right;
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}
//取百度搜索联想结果
    $val = $_POST['value'];
    $link='https://sp0.baidu.com/5a1Fazu8AA54nxGko9WTAnF6hhy/su?wd='.urlencode($val).'&json=1&p=3';
    $link=file_get_contents($link);
    $link=mb_convert_encoding($link, 'utf-8', 'gbk');
    $link=getSubstr($link,'s":[',']});');
    $num=substr_count($link,'","')+1;
    $scr='';
        echo '<br><span>联想结果:</span><br><br>';
    if ($num!=1) {
        for ($i=0; $i < $num; $i++) { 
            if (getSubstr($link,'"','",')=='') {
                $f=getSubstr($link,'"','"');
            } else{
                $f=getSubstr($link,'"','",');
            }
            $link=str_replace('"'.$f.'"','',$link);

            echo ' <a style="text-decoration:none;" href="#" id="srhauto'.$i.'" name="'.$f.'"><span>'.$f.'</span></a><br> ';
            $scr=$scr.'$(function(){$("#srhauto'.$i.'").click(function(){var text=document.getElementById("srhauto'.$i.'").name;document.getElementById("title").value=text;});});';
        }
            echo '<script>'.$scr.'</script>';
    } else{
        echo '<span class="label">none</span>';
    }
?>