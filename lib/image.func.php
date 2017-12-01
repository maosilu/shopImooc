<?php
/**
 * 封装验证码函数,通过GD库做验证码
 * User: maosilu
 * Date: 2017/10/19
 * Time: 上午10:05
 */
require_once 'string.func.php';
/**
 * 验证码函数
 * @param    int       $type        验证码显示类型，1代表数字，2代表字母，3数字+字母，4汉字
 * @param    int       $length      验证码长度，默认为4
 * @param    string    $codeName    验证码存入session的名字
 * @param    int       $pixel       干扰元素像素，默认50个
 * @param    int       $line        干扰元素直线，默认3条
 * @param    int       $arc         干扰元素弧线，默认2条
 * @param    int       $width       验证码图片宽度
 * @param    int       $height      验证码图片高度
*/
function verifyImage($type=1, $length=4, $pixel=0, $line=0, $arc=0, $codeName='verifyCode', $width=100, $height=30){
    $textWidth = imagefontwidth(15);

    $image = imagecreatetruecolor($width, $height); //创建画布
    $white = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white); //使用白色填充矩形画布

    $string = buildRandomString($type, $length);
    $_SESSION[$codeName] = $string;
    $fontfiles = array('Songti.ttc', 'Hiragino Sans GB W3.ttc', 'Hiragino Sans GB W6.ttc', 'PingFang.ttc');
    for($i=0; $i<$length; $i++){
        $size = mt_rand(15, 20);
        $angle = mt_rand(-15, 15);
        $x = ceil($width/$length)*$i + ceil($textWidth/2);
        $y = mt_rand(20, 28);
        $color = getRandColor($image);
        $fontfile = '../public/fonts/'.$fontfiles[mt_rand(0, count($fontfiles)-1)];
        $text = mb_substr($string, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    //添加干扰元素
    //添加像素
    if($pixel > 0){
        for($i=0; $i<$pixel; $i++){
            imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), getRandColor($image));
        }
    }
    //添加直线
    if($line > 0){
        for($i=0; $i<$line; $i++){
            imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), getRandColor($image));
        }
    }
    //添加弧线
    if($arc > 0){
        imagearc($image, mt_rand(0, $width/2), mt_rand(0, $height/2), mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, 360), mt_rand(0, 360), getRandColor($image));
    }

    header('content-type:image/png;charset=utf-8');
    imagepng($image);

    imagedestroy($image);
}

/**
 * 随机获取画笔颜色
 * @param resource $image 画布资源
 * $return int 返回RGB组成的颜色标识符
*/
function getRandColor($image){
    return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
}