<?php
/**
 * Created by PhpStorm.
 * User: maosilu
 * Date: 2017/10/19
 * Time: 上午10:06
 */
/**
 * 生成随机字符串
 * @param    int    $type    生成字符串类型，1是数字，2是字母，3是数字+字母，4是汉字
 * @param    int    $length  字符串长度
 * @return   string $string  返回随机生成的字符串
*/
function buildRandomString($type=1, $length=4){
    switch($type){
        case 1:
            $string = join('', array_rand(range(0, 9), $length));
            break;
        case 2:
            $string = join('', array_rand(array_flip(array_merge(range('a', 'z'), range('A', 'Z'))), $length));
            break;
        case 3:
            $string = join('', array_rand(array_flip(array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'))), $length));
            break;
        case 4:
            $str = '十,九,大,新,闻,中,心,在,梅,地,亚,中,心,举,行,记,者,招,待,会,邀,请,中,共,中,央,纪,律,检,查,委,员,会,副,书,记,监,察,部,部,长,国,家,预,防,腐,败,杨,晓,渡,齐,玉,介,绍,加,强,回,答,提,问';
            $string = join('', array_rand(array_flip(explode(',', $str)), $length));
            break;
        default :
            die('非法类型');
            break;
    }

    return $string;
}