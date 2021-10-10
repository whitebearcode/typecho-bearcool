<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**屏蔽报错**/
error_reporting(0);

include_once('core/func.php');

function themeVersion()
        {
            return '1.0.4';
        }
        

function themeConfig($form)
{
   $options = Helper::options();
   ?>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/whitebearcode/bearcool-space/assets/backend/bearui.min.css">
   
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/whitebearcode/bearcool-space/assets/backend/bearui.min.js"></script>
    
<link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
	<script src="https://www.layuicdn.com/layui/layui.js"></script>
	 <link href="https://cdn.bootcdn.net/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
	 <link href="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"><script src="https://cdn.bootcdn.net/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	 <div class="bearui_config">
        <div>
            <div class="bearui_config__aside">
                <div class="logo"><div class="ui blue big label">BearCool V<?php echo themeVersion(); ?></div></div>
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
    
    $bcool_menu = new Typecho_Widget_Helper_Form_Element_Select('bcool_menu', array('1' => '集合为下拉列表',  '2' => '形成单独导航'), '2', '独立页面在导航菜单的表现形式', '默认为集合下拉列表，若有需要形成单独导航则选择第二个即可');
    $bcool_menu->setAttribute('class', 'bearui_content bearui_global');
    $form->addInput($bcool_menu->multiMode());
    
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
 <i class="angle double up icon"></i>
  <div class="content">
    文章置顶
    <div class="sub header">设置文章置顶功能</div>
  </div>
</h2>
</div>

HTML;

	$layout = new Typecho_Widget_Helper_Layout();
	$layout->html(_t($Html));
	$layout->setAttribute('class', 'bearui_content bearui_article');
	$form->addItem($layout);
	
	$Sticky = new Typecho_Widget_Helper_Form_Element_Textarea('sticky_cid',null,'', '置顶文章CID', '多篇文章使用英文逗号或空格进行分隔');
    $Sticky->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($Sticky);
    
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
    
    $Html = <<<HTML
	<div class="ui piled segment">
		<h2 class="ui icon header aligned center ">
 <i class="image icon"></i>
  <div class="content">
    文章图片水印
    <div class="sub header">设置图片水印功能</div>
  </div>
</h2>
</div>
     
HTML;

	$layout = new Typecho_Widget_Helper_Layout();
	$layout->html(_t($Html));
	$layout->setAttribute('class', 'bearui_content bearui_article');
	$form->addItem($layout);
	
	 //水印设置
    $Watermark = new Typecho_Widget_Helper_Form_Element_Select('Watermark', array('1' => '否',  '2' => '是'), '2', '是否开启文章图片水印功能', '开启后可对本功能进行详细设置，前台输出图片时自动打上水印');
    $Watermark->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($Watermark->multiMode());
    
    $WatermarkType = new Typecho_Widget_Helper_Form_Element_Select('WatermarkType', array('1' => '文字',  '2' => '图片'), '1', '水印类型', '选择要打上什么样式的水印，若选择图片方式的话在非当前域名下可能存在跨域方面的问题，需自行根据服务器情况设置');
    $WatermarkType->setAttribute('class', 'bearui_content bearui_article');
    $form->addInput($WatermarkType->multiMode());
    
    $waterMarkName = new Typecho_Widget_Helper_Form_Element_Text('waterMarkName', NULL, '', _t('水印文字/图片地址'),'若水印类型选择的是文本，则填写文字，若选择的是图片，则请填写图片直链');
        $waterMarkName->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkName);
    
    $waterMarkKd = new Typecho_Widget_Helper_Form_Element_Text('waterMarkKd', NULL, '130', _t('水印宽度'),'填写水印宽度，单位px，填写数字即可，默认则为130');
        $waterMarkKd->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkKd);
        
    $waterMarkTextSize = new Typecho_Widget_Helper_Form_Element_Text('waterMarkTextSize', NULL, '12', _t('水印文字大小'),'[仅当水印类型为文字的时候本项有效]<br>填写水印文字大小，单位是px，填写数字即可，默认则为12');
        $waterMarkTextSize->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkTextSize);
        
    $waterMarkTextColor = new Typecho_Widget_Helper_Form_Element_Text('waterMarkTextColor', NULL, 'white', _t('水印文字颜色'),'[仅当水印类型为文字的时候本项有效]<br>填写水印文字颜色，可以是HEX或者RGBA 颜色代码，举个最简单的例子，比如填white，则为白色，black则为黑色');
        $waterMarkTextColor->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkTextColor);
        
     $waterMarkTextBackground = new Typecho_Widget_Helper_Form_Element_Text('waterMarkTextBackground', NULL, 'black', _t('水印文字背景颜色'),'[仅当水印类型为文字的时候本项有效]<br>填写水印文字背景颜色，可以是HEX或者RGBA 颜色代码，举个最简单的例子，比如填white，则为白色，black则为黑色');
        $waterMarkTextBackground->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkTextBackground);
        
    $waterMarkLocation = new Typecho_Widget_Helper_Form_Element_Select('waterMarkLocation', array('nw' => '左上角',  'n' => '正上方',  'ne' => '右上角','w' => '正左边','e' => '正右边','sw' => '左下角','s' => '正下方','se' => '右下角','c' => '正中间'),  'c', _t('水印位置'),'选择水印位置');
        $waterMarkLocation->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkLocation);
    
    $waterMarkOpacity = new Typecho_Widget_Helper_Form_Element_Text('waterMarkOpacity', NULL, '0.7', _t('水印透明度'),'填写水印透明度，在0-1之间填写一个数字，默认0.7');
        $waterMarkOpacity->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkOpacity);
     
    $waterMarkMargin = new Typecho_Widget_Helper_Form_Element_Text('waterMarkMargin', NULL, '10', _t('水印到图片边缘的距离'),'填写水印到图片边缘的距离，填写数字即可，默认10');
        $waterMarkMargin->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkMargin);
    
    $waterMarkOutput = new Typecho_Widget_Helper_Form_Element_Select('waterMarkOutput', array('null'=>'使用原图格式','jpeg'=>'jpeg','png'=>'png','webp'=>'webp'), '', _t('打上水印后的图片格式'),'选择打上水印后的图片格式，默认情况下原图啥格式，输出就啥格式');
        $waterMarkOutput->setAttribute('class', 'bearui_content bearui_article');
        $form->addInput($waterMarkOutput);  
        
$bcool_gray = new Typecho_Widget_Helper_Form_Element_Select('bcool_gray', array('1' => '关闭','2' => '开启'), '1', '是否开启哀悼模式', '开启后全站变灰。');
    $bcool_gray->setAttribute('class', 'bearui_content bearui_other');
    $form->addInput($bcool_gray->multiMode());

$bcool_animate = new Typecho_Widget_Helper_Form_Element_Select(
        'bcool_animate',
        array(
            'close' => '关闭',
            'bounce' => 'bounce',
            'flash' => 'flash',
            'pulse' => 'pulse',
            'rubberBand' => 'rubberBand',
            'headShake' => 'headShake',
            'swing' => 'swing',
            'tada' => 'tada',
            'wobble' => 'wobble',
            'jello' => 'jello',
            'heartBeat' => 'heartBeat',
            'bounceIn' => 'bounceIn',
            'bounceInDown' => 'bounceInDown',
            'bounceInLeft' => 'bounceInLeft',
            'bounceInRight' => 'bounceInRight',
            'bounceInUp' => 'bounceInUp',
            'bounceOut' => 'bounceOut',
            'bounceOutDown' => 'bounceOutDown',
            'bounceOutLeft' => 'bounceOutLeft',
            'bounceOutRight' => 'bounceOutRight',
            'bounceOutUp' => 'bounceOutUp',
            'fadeIn' => 'fadeIn',
            'fadeInDown' => 'fadeInDown',
            'fadeInDownBig' => 'fadeInDownBig',
            'fadeInLeft' => 'fadeInLeft',
            'fadeInLeftBig' => 'fadeInLeftBig',
            'fadeInRight' => 'fadeInRight',
            'fadeInRightBig' => 'fadeInRightBig',
            'fadeInUp' => 'fadeInUp',
            'fadeInUpBig' => 'fadeInUpBig',
            'fadeOut' => 'fadeOut',
            'fadeOutDown' => 'fadeOutDown',
            'fadeOutDownBig' => 'fadeOutDownBig',
            'fadeOutLeft' => 'fadeOutLeft',
            'fadeOutLeftBig' => 'fadeOutLeftBig',
            'fadeOutRight' => 'fadeOutRight',
            'fadeOutRightBig' => 'fadeOutRightBig',
            'fadeOutUp' => 'fadeOutUp',
            'fadeOutUpBig' => 'fadeOutUpBig',
            'flip' => 'flip',
            'flipInX' => 'flipInX',
            'flipInY' => 'flipInY',
            'flipOutX' => 'flipOutX',
            'flipOutY' => 'flipOutY',
            'rotateIn' => 'rotateIn',
            'rotateInDownLeft' => 'rotateInDownLeft',
            'rotateInDownRight' => 'rotateInDownRight',
            'rotateInUpLeft' => 'rotateInUpLeft',
            'rotateInUpRight' => 'rotateInUpRight',
            'rotateOut' => 'rotateOut',
            'rotateOutDownLeft' => 'rotateOutDownLeft',
            'rotateOutDownRight' => 'rotateOutDownRight',
            'rotateOutUpLeft' => 'rotateOutUpLeft',
            'rotateOutUpRight' => 'rotateOutUpRight',
            'hinge' => 'hinge',
            'jackInTheBox' => 'jackInTheBox',
            'rollIn' => 'rollIn',
            'rollOut' => 'rollOut',
            'zoomIn' => 'zoomIn',
            'zoomInDown' => 'zoomInDown',
            'zoomInLeft' => 'zoomInLeft',
            'zoomInRight' => 'zoomInRight',
            'zoomInUp' => 'zoomInUp',
            'zoomOut' => 'zoomOut',
            'zoomOutDown' => 'zoomOutDown',
            'zoomOutLeft' => 'zoomOutLeft',
            'zoomOutRight' => 'zoomOutRight',
            'zoomOutUp' => 'zoomOutUp',
            'slideInDown' => 'slideInDown',
            'slideInLeft' => 'slideInLeft',
            'slideInRight' => 'slideInRight',
            'slideInUp' => 'slideInUp',
            'slideOutDown' => 'slideOutDown',
            'slideOutLeft' => 'slideOutLeft',
            'slideOutRight' => 'slideOutRight',
            'slideOutUp' => 'slideOutUp',
        ),
        'off',
        '选择一款显示动画',
        '开启后，首页等位置都将显示此动画'
    );
    $bcool_animate->setAttribute('class', 'bearui_content bearui_other');
    $form->addInput($bcool_animate->multiMode());
    
require_once('core/upgrade.php');
} 

