<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**屏蔽报错**/
error_reporting(0);

include_once('core/func.php');

function themeVersion()
        {
            return '1.0.1';
        }
        

function themeConfig($form)
{
   $options = Helper::options();
   ?>
   <link rel="stylesheet" href="<?php Helper::options()->themeUrl('assets/backend/bearui.min.css') ?>">
   
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php Helper::options()->themeUrl('assets/backend/bearui.min.js') ?>"></script>
    
<link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
	<script src="https://www.layuicdn.com/layui/layui.js"></script>
	 <link href="https://cdn.bootcdn.net/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
	 <link href="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"><script src="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	 <div class="bearui_config">
        <div>
            <div class="bearui_config__aside">
                <div class="logo"><div class="ui blue big label">BearCool V1.0.0</div></div>
                <ul class="tabs">
                    <li class="item" data-current="bearui_notice"><i class="assistive listening systems icon"></i> 使用说明</li>
                    <li class="item" data-current="bearui_global"><i class="american sign language interpreting icon"></i> 基础设置</li>
                    <li class="item" data-current="bearui_high"><i class="industry icon"></i> 高级设置</li>
                    <li class="item" data-current="bearui_article"><i class="text height icon"></i> 文章设置</li>
                    <li class="item" data-current="bearui_other"><i class="heading icon"></i> 其他设置</li>
                    <li class="item" data-current="bearui_upgrade"><i class="cloud download icon"></i> 在线升级</li>
                  
                </ul>
                
                
            </div>
        </div>
       <div class="bearui_config__notice">
           
            <div class="ui blue message">
  <div class="header">
    欢迎使用BearCool主题,以下是使用须知~
  </div>
  <ul class="list">
    <li>本主题设置项请勿添加emoji表情，否则可能导致其他配置项被清空的情况。</li>
    <li>主题用户交流QQ群:561848356</li>
    <li>主题讨论微社区:<a href="https://support.qq.com/products/314782?">戳这里访问</a></li>
  </ul>
</div>
<div class="ui large message">
  本主题为瀑布流式摄影类博客主题,适合喜欢瀑布流的摄影类博客站长使用<br>
  不懂的问题或本主题存在的问题可加群或在微社区中进行反馈<br>
  最后，祝您使用愉快:)
</div>
             <center>
   
<div class="ui labeled button" tabindex="0">
                     
  <div class="ui black button">
    <i class="github icon"></i> 当前版本/最新版本
  </div>
  <a class="ui basic black left pointing label" href="https://github.com/whitebearcode/typecho-bearcool">
    V<?php echo themeVersion(); ?>/V<?php 
  
    $Version = file_get_contents('https://upgrade.bear-studio.net/Typecho/Bearcool/version.php');
    $Versions = json_decode($Version,true);
   
        echo $Versions['version'];
   
    
    ?> 
        </a>
</div>
<?php
if ($Versions['version'] > themeVersion()){
        echo ' <div class="ui red message">
    本主题最新版本为V'.$Versions['version'].'，您的版本为V'.themeVersion().'，请及时完成更新!
 
  </div>';
    }
   
    ?>
  
</center>

     
<?php require_once('core/backup.php'); ?>
     
       </div>
	  <?php
    //基础设置
    $Html = <<<HTML
	<div class="ui piled segment">
		<h2 class="ui icon header aligned center ">
  <div class="content">
    头部设置
    <div class="sub header">设置头部信息，站点标题、SEO相关等</div>
  </div>
</h2>
</div>

HTML;

	$layout = new Typecho_Widget_Helper_Layout();
	$layout->html(_t($Html));
	$layout->setAttribute('class', 'bearui_content bearui_global');
	$form->addItem($layout);
	
    $bcool_title = new Typecho_Widget_Helper_Form_Element_Text('bcool_title',null,$options->title, '站点标题', '请填入站点标题，不要太长');
    $bcool_title->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_title);
    $bcool_titleb = new Typecho_Widget_Helper_Form_Element_Text('bcool_titleb',null,'', '站点副标题', '请填入站点副标题，不要太长，将显示在站点标题的后面，不填则不显示');
    $bcool_titleb->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_titleb);
    $bcool_keywords = new Typecho_Widget_Helper_Form_Element_Text('bcool_keywords',null,$options->keywords, '站点SEO关键词', '请填入站点SEO关键词,请以半角逗号 "," 分割多个关键字.');
    $bcool_keywords->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_keywords);
    $bcool_description = new Typecho_Widget_Helper_Form_Element_Text('bcool_description',null,$options->description, '站点SEO描述', '请填入站点SEO描述,不要太长.');
    $bcool_description->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_description);
    
    $bcool_logo = new Typecho_Widget_Helper_Form_Element_Text('bcool_logo',null,'', '站点LOGO图片地址', '请填入站点LOGO图片地址，，当该项为空时默认显示站点标题作为文字LOGO');
    $bcool_logo->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_logo);
    
    $bcool_favicon = new Typecho_Widget_Helper_Form_Element_Text('bcool_favicon',null,'', '站点Favicon', '请填入站点Favicon图标地址');
    $bcool_favicon->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_favicon);
    
    $Html = <<<HTML
	<div class="ui piled segment">
		<h2 class="ui icon header aligned center ">
  <div class="content">
    底部设置
    <div class="sub header">设置ICP备案号、自定义代码等信息</div>
  </div>
</h2>
</div>

HTML;

	$layout = new Typecho_Widget_Helper_Layout();
	$layout->html(_t($Html));
	$layout->setAttribute('class', 'bearui_content bearui_global');
	$form->addItem($layout);
	
    $bcool_icp = new Typecho_Widget_Helper_Form_Element_Text('bcool_icp',null,'', 'ICP备案号', '请在这里填入站点ICP备案号');
    $bcool_icp->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_icp);
    
    $bcool_police = new Typecho_Widget_Helper_Form_Element_Text('bcool_police',null,'', '公安备案号', '请在这里填入站点公安备案号');
    $bcool_police->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_police);
    
    $bcool_myqq = new Typecho_Widget_Helper_Form_Element_Text('bcool_myqq',null,'', '我的QQ二维码', '请在这里填入QQ二维码图片直链，不填则不显示');
    $bcool_myqq->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_myqq);
    
    $bcool_mywechat = new Typecho_Widget_Helper_Form_Element_Text('bcool_mywechat',null,'', '我的微信二维码', '请在这里填入微信二维码图片直链，不填则不显示');
    $bcool_mywechat->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_mywechat);
    
    $bcool_myweibo = new Typecho_Widget_Helper_Form_Element_Text('bcool_myweibo',null,'', '我的微博链接', '请在这里填入微博链接，不填则不显示');
    $bcool_myweibo->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_myweibo);
    
    $bcool_mygithub = new Typecho_Widget_Helper_Form_Element_Text('bcool_mygithub',null,'', '我的Github链接', '请在这里填入Github链接，不填则不显示');
    $bcool_mygithub->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_mygithub);
    
    $bcool_mytg = new Typecho_Widget_Helper_Form_Element_Text('bcool_mytg',null,'', '我的小飞机链接', '请在这里填入小飞机链接，不填则不显示');
    $bcool_mytg->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_mytg);
    
    $bcool_cover = new Typecho_Widget_Helper_Form_Element_Textarea('bcool_cover',null,'', '文章自定义封面图片', '请填入首页、分类等页面输出文章时的文章自定义封面图片<br>优先级：文章封面->附件首图->文章首图->自定义随机图片，无图片时将随机显示<br>自定义图片链接可固定一张，多张随机使用|分割<br>例如:https://www.xxx.com/xxx.png|https://www.xxx.com/xxxx.png');
    $bcool_cover->setAttribute('class', 'bearui_content bearui_high');
    $form->addInput($bcool_cover);
    
    $bcool_pic = new Typecho_Widget_Helper_Form_Element_Textarea('bcool_pic',null,'', '页面底部图片集', '请填入七张不同的图片直链，我绝对不会说是用来填充底部不显得单调的QAQ<br>使用|分割<br>例如:https://www.xxx.com/xxx.png|https://www.xxx.com/xxxx.png，<a style="color:red">当本项为空或者图片数量少于7张时默认调用随机风景图</a>');
    $bcool_pic->setAttribute('class', 'bearui_content bearui_high');
    $form->addInput($bcool_pic);
    
    $bcool_Gravatar = new Typecho_Widget_Helper_Form_Element_Select('bcool_Gravatar', array('1' => 'Gravatar官方源','2' => 'LOLI.TOP*Gravatar镜像源', '3' => 'V2EX*Gravatar镜像源','4' => 'LOLI.NET*Gravatar镜像源','5' => '极客族*Gravatar镜像源','6' => '七牛*Gravatar镜像源'), '2', 'Gravatar源选择', '因Gravatar官方在中国大陆地区被Q，导致在中国大陆访问使用Gravatar的站点时头像不显示,这里支持您自主选择合适的源<br>本功能适配QQ,当填写的邮箱为QQ邮箱时则显示QQ头像');
    $bcool_Gravatar->setAttribute('class', 'bearui_content bearui_high');
    $form->addInput($bcool_Gravatar->multiMode());
    
     //评论设置
    
$Html = <<<HTML
	<div class="ui piled segment">
		<h2 class="ui icon header aligned center ">
 <i class="ban icon"></i>
  <div class="content">
    评论过滤
    <div class="sub header">默认强制性过滤全空格评论、包含XSS危险内容评论，其余需过滤内容您可以通过以下项进行设置。</div>
  </div>
</h2>
</div>

HTML;

	$layout = new Typecho_Widget_Helper_Layout();
	$layout->html(_t($Html));
	$layout->setAttribute('class', 'bearui_content bearui_article');
	$form->addItem($layout);
    
    $BearSpam_IP = new Typecho_Widget_Helper_Form_Element_Textarea('BearSpam_IP',null,'', '过滤IP', '多条IP请用换行符隔开<br />支持用*号匹配IP段，如：192.168.*.*');
    $BearSpam_IP->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_IP);
    //
    $BearSpam_EMAIL = new Typecho_Widget_Helper_Form_Element_Textarea('BearSpam_EMAIL',null,'', '过滤邮箱', '多个邮箱请用换行符隔开<br />可以是邮箱的全部，或者邮箱部分关键词');
    $BearSpam_EMAIL->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_EMAIL);
    //
    $BearSpam_URL = new Typecho_Widget_Helper_Form_Element_Textarea('BearSpam_URL',null,'', '过滤网址', '多个网址请用换行符隔开<br />可以是网址的全部，或者网址部分关键词。如果网址为空，该项不会起作用。');
    $BearSpam_URL->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_URL);
    //
    $BearSpam_ArticleTitle = new Typecho_Widget_Helper_Form_Element_Select('BearSpam_ArticleTitle',array('1' => '是',  '2' => '否'),'', '过滤含有文章标题的评论
', '根据研究表明机器人发表的内容可能含有评论文章的标题');
    $BearSpam_ArticleTitle->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_ArticleTitle);
    //
    $BearSpam_NAME = new Typecho_Widget_Helper_Form_Element_Textarea('BearSpam_NAME',null,'', '过滤昵称', '如果评论发布者的昵称含有该关键词，将执行该操作，多个请直接换行');
    $BearSpam_NAME->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_NAME);
    //
    $BearSpam_NAMEMIN = new Typecho_Widget_Helper_Form_Element_Text('BearSpam_NAMEMIN',null,'', '昵称允许的最短长度', '如果评论发布者的昵称小于该最短长度将拦截');
    $BearSpam_NAMEMIN->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_NAMEMIN);
    //
    $BearSpam_NAMEMAX = new Typecho_Widget_Helper_Form_Element_Text('BearSpam_NAMEMAX',null,'', '昵称允许的最长长度', '如果评论发布者的昵称大于该最长长度将拦截');
    $BearSpam_NAMEMAX->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_NAMEMAX);
    //
    $BearSpam_NAMEURL = new Typecho_Widget_Helper_Form_Element_Select('BearSpam_NAMEURL',array('1' => '是',  '2' => '否'),'', '过滤昵称为网址的评论', '根据研究表明机器人发表的评论，昵称很有可能为网址');
    $BearSpam_NAMEURL->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_NAMEURL);
    //
    $BearSpam_Chinese = new Typecho_Widget_Helper_Form_Element_Select('BearSpam_Chinese',array('1' => '是',  '2' => '否'),'', '过滤不包含中文的评论', '当评论内容中没有中文时进行拦截');
    $BearSpam_Chinese->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_Chinese);
    //
    $BearSpam_MIN = new Typecho_Widget_Helper_Form_Element_Text('BearSpam_MIN',null,'', '评论内容允许的最短长度', '如果评论发布者的评论内容小于该最短长度将拦截');
    $BearSpam_MIN->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_MIN);
    //
     $BearSpam_MAX = new Typecho_Widget_Helper_Form_Element_Text('BearSpam_MAX',null,'', '评论内容允许的最大长度', '如果评论发布者的评论内容长度大于该最大长度将拦截');
    $BearSpam_MAX->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_MAX);
    //
    $BearSpam_Words = new Typecho_Widget_Helper_Form_Element_Textarea('BearSpam_Words',null,'', '过滤敏感词', '多个词汇请用换行符隔开');
    $BearSpam_Words->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($BearSpam_Words);
    
$bcool_gray = new Typecho_Widget_Helper_Form_Element_Select('bcool_gray', array('1' => '关闭','2' => '开启'), '1', '是否开启哀悼模式', '开启后全站变灰。');
    $bcool_gray->setAttribute('class', 'bearui_content bearui_other');
    $form->addInput($bcool_gray->multiMode());

require_once('core/upgrade.php');
} 

