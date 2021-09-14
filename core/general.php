<?php
// 简介图文获取图片
function thumb($obj) {
    //获取附件首张图片
	$attach = $obj->attachments(1)->attachment;
	//获取文章首张图片
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $obj->content, $thumbUrl);
	$img_src = $thumbUrl[1][0];
	// 获取自定义随机图片
	$options = Typecho_Widget::widget('Widget_Options');
	$thumbs = explode("|",$options->bcool_cover);
	// 获取文章封面
	$cover = $obj->fields->cover;
	//--------------->
	if($cover){
	    $thumb = $cover;
	}elseif(isset($attach->isImage) && $attach->isImage == 1){
		$thumb = $attach->url;
	}else if($img_src){
		$thumb = $img_src;
	}else if($options->bcool_cover && count($thumbs)>0){
		$thumb = $thumbs[rand(0,count($thumbs)-1)];
	}
	else{
	    
	    $rand = '700?t='.rand(1,1000);
	    $thumb = 'https://picapi.bear-studio.net/1000/'.$rand;
	}
	return $thumb;
}

function pic_show(){
    $options = Typecho_Widget::widget('Widget_Options');
    $picshows = explode("|",$options->bcool_pic);
    $picnum = count($picshows);
    $picshow = [];
    if($picnum !== 7){
        $rand = '400?t='.rand(1,1000);
        $picshow = 'https://picapi.bear-studio.net/200/'.$rand;
    }
    else{
        
        $picshow['type'] = 'no_auto';
        $picshow['url'] = $picshows;
        $picshow = json_encode($picshow);
    }
    return $picshow;
}
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

/**
* 显示上一篇
*
* 如果没有下一篇,返回null
*/
function thePrevCid($widget, $default = NULL) {
  $db = Typecho_Db::get();
  $sql = $db->select()->from('table.contents')
  ->where('table.contents.created < ?', $widget->created)
  ->where('table.contents.status = ?', 'publish')
  ->where('table.contents.type = ?', $widget->type)
  ->where('table.contents.password IS NULL')
  ->order('table.contents.created', Typecho_Db::SORT_DESC)
  ->limit(1);
  $content = $db->fetchRow($sql);

  if ($content) {
    return $content["cid"];
  } else {
    return $default;
  }
};

/**
* 获取下一篇文章mid
*
* 如果没有下一篇,返回null
*/
function theNextCid($widget, $default = NULL) {
  $db = Typecho_Db::get();
  $sql = $db->select()->from('table.contents')
  ->where('table.contents.created > ?', $widget->created)
  ->where('table.contents.status = ?', 'publish')
  ->where('table.contents.type = ?', $widget->type)
  ->where('table.contents.password IS NULL')
  ->order('table.contents.created', Typecho_Db::SORT_ASC)
  ->limit(1);
  $content = $db->fetchRow($sql);

  if ($content) {
    return $content["cid"];
  } else {
    return $default;
  }
};

function RandomPosts($random=5){
    $db = Typecho_Db::get();
    $adapterName = $db->getAdapterName();//兼容非MySQL数据库
    if($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite'){
        $order_by = 'RANDOM()';
    }else{
        $order_by = 'RAND()';
    }
    $sql = $db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('table.contents.created <= ?', time())
        ->where('type = ?', 'post')
        ->limit($random)
        ->order($order_by);

$result = $db->fetchAll($sql);
if($result){
    foreach($result as $val){
        $obj = Typecho_Widget::widget('Widget_Abstract_Contents');
        $val = $obj->push($val);
        $post_title = htmlspecialchars($val['title']);
        $permalink = $val['permalink'];

        echo ' <a href="'.$permalink.'" class="other-posts-slider-item">
        <img src="'.thumb($obj).'" alt="" class="post-bg-img">
        <div class="other-post-info">
                                        <h3 class="post-title">
                                            '.$post_title.'
                                        </h3>
                                        <div class="post-date post-info-date">
                                            '.date("Y-m-d H:i",$val['created']).'
                                        </div>
                                    </div>
                                </a>
        ';
    }
}
}


//Gravatar头像
function Gravatar($email)

{

    $options = Helper::options();
   
$b=str_replace('@qq.com','',$email);
    if(stristr($email,'@qq.com')&&is_numeric($b)&&strlen($b)<11&&strlen($b)>4){
        $nk = 'https://s.p.qq.com/pub/get_face?img_type=3&uin='.$b;
        $c = get_headers($nk, true);
        $d = $c['Location'];
        $q = json_encode($d);
        $k = explode("&k=",$q)[1];
        echo 'https://q.qlogo.cn/g?b=qq&k='.$k.'&s=100';
    }else{
                $email = md5($email);
                if($options->bcool_Gravatar == '1'){
                echo "//cn.gravatar.com/gravatar/" . $email . "?";
            }
            else if($options->bcool_Gravatar == '2'){
                echo "//gravatar.loli.top/avatar/" . $email . "?";
            }
            else if($options->bcool_Gravatar == '3'){
                echo "//cdn.v2ex.com/gravatar/" . $email . "?";
            }
            else if($options->bcool_Gravatar == '4'){
                echo "//gravatar.loli.net/avatar/" . $email . "?";
            }
            else if($options->bcool_Gravatar == '5'){
                echo "//sdn.geekzu.org/avatar/" . $email . "?";
            }
            else if($options->bcool_Gravatar == '6'){
                echo "//dn-qiniu-avatar.qbox.me/avatar/" . $email . "?";
            }
            else{
                echo "//gravatar.loli.top/avatar/" . $email . "?";
            }
            }
}

// 留言加@
function getPermalinkFromCoid($coid) {
	$db = Typecho_Db::get();
	$row = $db->fetchRow($db->select('author')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	if (empty($row)) return '';
	return '<a href="#comment-'.$coid.'">@'.$row['author'].'</a>';
}

//第三方分享
function share($t,$type){
    if($type == 'qq'){
   echo 'http://connect.qq.com/widget/shareqq/index.html?url='.$t->permalink.'&sharesource=qzone&title='.$t->title.'&pics='.thumb($t).'&summary='.$t->title.'&desc='.$t->title;  
    }
    else if($type == 'weibo'){
   echo 'https://service.weibo.com/share/share.php?url='.$t->permalink.'&title='.$t->title.'&pic='.thumb($t);  
    }
    else{
   echo 'https://www.facebook.com/sharer/sharer.php?u='.$t->permalink;  
    }
}