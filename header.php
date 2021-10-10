<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->bcool_title(); ?><?php if(!empty($this->options->bcool_titleb)) :?> - <?php $this->options->bcool_titleb(); ?><?php endif; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/whitebearcode/bearcool-space/assets/css/styles.css" rel="prefetch">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/whitebearcode/bearcool-space/assets/css/viewer.min.css" rel="prefetch">
    <link href="https://cdn.bootcdn.net/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <?php if(!empty($this->options->bcool_favicon)) :?>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php $this->options->bcool_favicon();?>">
    <?php endif; ?>
<?php if($this->options->bcool_gray == '2') :?>
<style>
html {filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1); -webkit-filter: grayscale(100%); }
</style>
<?php endif; ?>
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<body class="transition-none">
    <div class="search-section">
        <div class="wrap">
            <div class="wrap_float">
                <div class="search-form">
                    <form  role="search" method="get">
                    <input type="text" name="s" class="search-input" placeholder="输入关键词进行搜索">
                    <button type="submit" class="search-submit"></button>
                    </form>
                </div>
                <div class="search-close" id="search-close"></div>
            </div>
        </div>
    </div>
    <div class="container page">
        <div class="container-wrap">
            <div class="mobile-panel">
                <div class="wrap">
                    <div class="wrap_float">
                        <div class="mobile-btn" id="js-menu-open">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a class="logo" href="/">
                            <?php if(!empty($this->options->bcool_logo)): ?>
                           
                            <img width="190" height="40" src="<?php $this->options->bcool_logo() ?>">
                            <?php else: ?>
                             <?php $this->options->bcool_title() ?>
                             <?php endif ;?>
                        </a>
                        <div class="search-button"></div>
                    </div>
                </div>
            </div>
            <div class="container-wrap--dummy"></div>
            <div class="top-panel" id="js-panel">
                <div class="wrap">
                    <div class="wrap_float">
                        <div class="mode-check">
                            <input type="checkbox" id="mode-checkbox" class="mode-checkbox-input">
                            <label for="mode-checkbox" class="mode-checkbox-label" data-dark-title="夜间模式" data-light-title="昼间模式"></label>
                        </div>
                        <div class="wrap-center">
                            <a class="logo" href="/">
                            <?php if(!empty($this->options->bcool_logo)): ?>
                           
                            <img width="150" height="40" src="<?php $this->options->bcool_logo() ?>">
                            <?php else: ?>
                             <?php $this->options->bcool_title() ?>
                             <?php endif ;?>
                        </a>
                            <div class="menu" id="js-menu">
                                <ul>
                                <li>
                                        <a  href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                                        </li>
                                <li>
                                        <a>文章分类</a>
                                        <ul>
                                             <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
<?php while($categorys->next()): ?>
<?php if ($categorys->levels === 0): ?>
<?php $children = $categorys->getAllChildren($categorys->mid); ?>
<?php if (empty($children)) { ?>
 <li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>" style="word-break:break-all;"><?php $categorys->name(); ?></a></li>
 <?php }  else { ?>
                                            <li>
                                                <a><div href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></div></a>
                                                <ul>
                                                    <?php foreach ($children as $mid) { ?>
<?php $child = $categorys->getCategory($mid); ?>
                                                    <li><a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>" style="word-break:break-all;"><?php echo $child['name']; ?></a></li>
                                                   <?php } ?>
                                                </ul>
                                            </li>
                                            <?php } ?>
<?php endif; ?><?php endwhile; ?>
    </ul>
                                      </li>
                                 
                                      <li>
                                        <a>页面列表</a>
                                        <ul>
                                            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                                            <li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" style="word-break:break-all;"><?php $pages->title(); ?></a></li>
                                            <?php endwhile; ?>
                                                </ul>
                                            </li>
                               </ul>
                              
                                <ul><?php if(!$this->user->hasLogin()):?>
                                    <li class="login-li"><a data-href="#modal-login" class="login-link getModal">登录</a></li>
                                    <?php else: ?>
                                    <li class="login-li"><a href="<?php $this->options->adminUrl();?>" class="login-link">您好~<?php $this->user->screenName(); ?></a></li>
                                    <?php endif; ?>
                                     
                                </ul>
                            </div>
                        </div>
                        <div class="search-button" id="btn-search"></div>
                    </div>
                    <div class="menu-close" id="js-menu-close"></div>
                </div>
            </div>