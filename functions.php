<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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


