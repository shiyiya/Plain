<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $fav = new Typecho_Widget_Helper_Form_Element_Text('fav', NULL, NULL, _t('站点LOGO'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO,不填即为默认。'));
    $form->addInput($fav);
    $GitHubLink = new Typecho_Widget_Helper_Form_Element_Text('GitHubLink', NULL, NULL, _t('GitHub'), _t('请填入完整链接。'));
    $form->addInput($GitHubLink);
    $rssLink = new Typecho_Widget_Helper_Form_Element_Text('rssLink', NULL, NULL, _t('rss'), _t('请填入完整链接。'));
    $form->addInput($rssLink);
    $twitterLink = new Typecho_Widget_Helper_Form_Element_Text('twitterLink', NULL, NULL, _t('twitter'), _t('请填入完整链接。'));
    $form->addInput($twitterLink);
	$liveTime = new Typecho_Widget_Helper_Form_Element_Text('liveTime', NULL, NULL, _t('liveTime'), _t('请填入建站日期。'));
    $form->addInput($liveTime);
    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', NULL, NULL, _t('themeColor'), _t('请填入网站基础颜色基调，格式为：#a4a9ad'));
    $form->addInput($themeColor);
    $backGroundImage = new Typecho_Widget_Helper_Form_Element_Text('backGroundImage', NULL, NULL, _t('backGroundImage'), _t('请填入完整 url，作为网站背景，不填则无'));
    $form->addInput($backGroundImage);

	$effect = new Typecho_Widget_Helper_Form_Element_Checkbox('effect', 
    array('fixbug' => _t('必需勾选其中一个，最懒解决bug法，偷懒真爽(oﾟvﾟ)ノ'),
	'Hitokoto' => _t('一言'),
    'Prism' => _t('代码高亮'),
    'Ribbons' => _t('彩带')),
    array('fixbug'), _t('额外功能'));
    
    $form->addInput($effect->multiMode());
}

function active_current_menu($archive,$expected,$active_class='active'){
    if($expected == 'index' && $archive.is('index')){
        echo $active_class;
    }else if($archive.is('archive') && $archive.getArchiveSlug() == $expected){
        echo $active_class;
    }else{
        echo '';
    }
}

/* function themeUser(){ */
/*     echo "<img src='https://runtua.cn/theme-api.php?author=Theme&text=".$_SERVER['HTTP_HOST'].">";
 */    /* $url = 'https://runtua.cn/theme-api.html?'.'author=Theme&text='.$_SERVER['HTTP_HOST'];
    $html = file_get_contents($url); */
    /* echo $html; */
/* };
themeUser(); */

// 添加浏览数字段到内容
function themeFields($layout) {
    $viewsNum = new Typecho_Widget_Helper_Form_Element_Text('viewsNum', NULL, 0, _t('文章浏览数'), _t('文章浏览数统计'));
    $layout->addItem($viewsNum);
}

/*
 * @params Widget_Archive $archive
 */
function themeInit($archive){
    // 判断是否为文章或页面
    if($archive->is('single')){
        viewCounter($archive);
    }
}
/*
 * 统计文章浏览数
 * @params Widget_Archive $archive
 */
function viewCounter($archive){
    $cid = $archive->cid;
    $views = Typecho_Cookie::get('__typecho_views');
    $views = !empty($views) ? explode(',', $views) : array();
    if(!in_array($cid,$views)){
        $db = Typecho_Db::get();
        $field = $db->fetchRow($db->select()->from('table.fields')->where('cid = ? AND name = ?', $cid , 'viewsNum'));
        if(empty($field)){
            $db->query($db->insert('table.fields')
            ->rows(array('cid' => $cid, 'name' => 'viewsNum', 'type' => 'str', 'str_value' => 1, 'int_value' => 0, 'float_value' => 0)));
        }else{
            $db->query($db->update('table.fields')->expression('str_value', 'str_value + 1')->where('cid = ? AND name = ?', $cid , 'viewsNum'));
        }
        array_push($views, $cid);
        $views = implode(',', $views);
        Typecho_Cookie::set('__typecho_views', $views); //记录到cookie
    }
}


