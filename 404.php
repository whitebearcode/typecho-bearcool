<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="page-wrap page-404">
                <div class="archive-header">
                    <div class="wrap wrap-center">
                        <div class="wrap_float">
                            <h1 class="page-title">页面不存在!</h1>
                            <div class="text">
                                <p>
                                    抱歉，您访问的页面似乎自己走丢了~
                                </p>
                                <p>
                                    您可以直接<a href="/">返回首页</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other-posts-section section">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <h2 class="title">其他文章</h2>
                        <div class="arrows">
                            <div class="arrow prev"></div>
                            <div class="arrow next"></div>
                        </div>
                        <div class="section-content">
                            <div class="other-posts-slider" id="js-other-posts-slider">
                              <?php RandomPosts(10);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	<?php $this->need('footer.php'); ?>
