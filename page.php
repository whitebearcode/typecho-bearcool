<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="single-header header-wide header_version_1 <?php if($this->options->bcool_animate !== "close" || !empty($this->options->bcool_animate)): ?>animate__animated animate__<?php $this->options->bcool_animate() ?><?php endif; ?>">
                <img src="<?php echo thumb($this); ?>" alt="" class="image-cover bg-img">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <div class="breadcrumbs">
                            <a href="index.html">首页</a> / <a href="#">页面</a> / <span class="current"><?php $this->title() ?></span>
                        </div>

                        <h1 class="page-title">
                            <?php $this->title() ?>
                        </h1>
                        <div class="post-info">
                            <div class="post-author post-info-author">
                                <div class="author-image">
                                    <img src="<?php Gravatar($this->author->mail); ?>" alt="" class="image-cover">
                                </div>
                                <span><?php $this->author(); ?></span>
                            </div>
                            <div class="post-date post-info-date">
                                <?php $this->date(); ?>
                            </div>
                            <div class="post-views post-info-views">
                                <?php get_post_view($this) ?>
                            </div>
                           
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="page-wrap">
                <div class="page-wrap-content">
                    <div class="post-single-wrap sticky-parent">
                        <div class="share-block">
                            <div class="share-block-main js-share-block-main">
                                <div class="socials">
                                    <a href="<?php share($this,'qq'); ?>" class="soc-link" data-title="QQ">
                                        <span class="soc-icon">
                                                                                    <svg t="1631351289597" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2222" width="48" height="48"><path d="M511.037 986.94c-85.502 0-163.986-26.686-214.517-66.544-25.66 7.149-58.486 18.655-79.202 32.921-17.725 12.202-15.516 24.647-12.32 29.67 14.027 22.069 240.622 14.092 306.04 7.219v-3.265z" fill="#FAAD08" p-id="2223"></path><path d="M495.627 986.94c85.501 0 163.986-26.686 214.518-66.544 25.66 7.149 58.485 18.655 79.203 32.921 17.724 12.202 15.512 24.647 12.32 29.67-14.027 22.069-240.623 14.092-306.042 7.219v-3.265z" fill="#FAAD08" p-id="2224"></path><path d="M496.137 472.026c140.73-0.935 253.514-27.502 291.73-37.696 9.11-2.432 13.984-6.789 13.984-6.789 0.032-1.25 0.578-22.348 0.578-33.232 0-183.287-88.695-367.458-306.812-367.47C277.5 26.851 188.8 211.021 188.8 394.31c0 10.884 0.55 31.982 0.583 33.232 0 0 3.965 4.076 11.231 6.048 35.283 9.579 150.19 37.482 294.485 38.437h1.037zM883.501 626.967c-8.66-27.825-20.484-60.273-32.455-91.434 0 0-6.886-0.848-10.366 0.158-107.424 31.152-237.624 51.006-336.845 49.808h-1.026c-98.664 1.186-227.982-18.44-335.044-49.288-4.09-1.176-12.168-0.677-12.168-0.677-11.97 31.16-23.793 63.608-32.453 91.433-41.3 132.679-27.92 187.587-17.731 188.818 21.862 2.638 85.099-99.88 85.099-99.88 0 104.17 94.212 264.125 309.947 265.596a765.877 765.877 0 0 1 5.725 0c215.738-1.471 309.947-161.424 309.947-265.595 0 0 63.236 102.519 85.102 99.88 10.186-1.231 23.566-56.14-17.732-188.819" p-id="2225"></path><path d="M429.208 303.911c-29.76 1.323-55.195-32.113-56.79-74.62-1.618-42.535 21.183-78.087 50.95-79.417 29.732-1.305 55.149 32.116 56.765 74.64 1.629 42.535-21.177 78.08-50.925 79.397m220.448-74.62c-1.593 42.507-27.03 75.941-56.79 74.62-29.746-1.32-52.553-36.862-50.924-79.397 1.614-42.526 27.03-75.948 56.764-74.639 29.77 1.33 52.57 36.881 50.951 79.417" fill="#FFFFFF" p-id="2226"></path><path d="M695.405 359.069c-7.81-18.783-86.466-39.709-183.843-39.709h-1.045c-97.376 0-176.033 20.926-183.842 39.709a6.66 6.66 0 0 0-0.57 2.672c0 1.353 0.418 2.575 1.072 3.612 6.58 10.416 93.924 61.885 183.341 61.885h1.045c89.416 0 176.758-51.466 183.34-61.883a6.775 6.775 0 0 0 1.069-3.622 6.66 6.66 0 0 0-0.567-2.664" fill="#FAAD08" p-id="2227"></path><path d="M464.674 239.335c1.344 16.946-7.87 32-20.55 33.645-12.701 1.647-24.074-10.755-25.426-27.71-1.326-16.954 7.873-32.008 20.534-33.64 12.722-1.652 24.114 10.76 25.442 27.705m77.97 8.464c2.702-4.392 21.149-27.488 59.328-19.078 10.028 2.208 14.667 5.457 15.646 6.737 1.445 1.888 1.84 4.576 0.375 8.196-2.903 7.174-8.894 6.979-12.217 5.575-2.144-0.907-28.736-16.948-53.232 6.99-1.685 1.648-4.7 2.212-7.558 0.258-2.856-1.956-4.038-5.923-2.342-8.678" p-id="2228"></path><path d="M503.821 589.328h-1.031c-67.806 0.802-150.022-8.004-229.638-23.381-6.817 38.68-10.934 87.294-7.399 145.275 8.928 146.543 97.728 238.652 234.793 239.996h5.57c137.065-1.344 225.865-93.453 234.796-239.996 3.535-57.986-0.584-106.6-7.403-145.283-79.631 15.385-161.861 24.196-229.688 23.389" fill="#FFFFFF" p-id="2229"></path><path d="M310.693 581.35v146.633s69.287 13.552 138.7 4.17V596.897c-43.974-2.413-91.4-7.79-138.7-15.546" fill="#EB1C26" p-id="2230"></path><path d="M806.504 427.238s-130.112 43.08-302.66 44.309h-1.025c-172.264-1.224-302.217-44.161-302.66-44.309L156.58 541.321c108.998 34.464 244.093 56.677 346.238 55.387l1.024-0.002c102.152 1.297 237.226-20.917 346.24-55.385l-43.579-114.083z" fill="#EB1C26" p-id="2231"></path></svg>
                                        </span>
                                    </a>
                                    <a class="soc-link getModal" data-title="Wechat" data-href="#modal-qrcode">
                                        <span class="soc-icon">
                                            <svg t="1631351348370" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3148" width="48" height="48"><path d="M721.4592 366.3872c-94.3616 1.2288-176.5888 26.9824-240.8448 95.6416-65.536 70.0416-83.1488 150.6816-49.4592 248.8832-43.008-5.0176-81.4592-10.24-120.064-13.6704-11.264-0.9728-24.576 0.1536-34.2016 5.376-28.5184 15.4624-55.3472 34.048-83.6608 49.92-6.656 3.7376-18.2784 4.352-24.576 0.9728-4.1984-2.2528-5.5808-14.7968-3.9936-21.8112 5.2736-23.2448 11.6224-46.336 19.0976-69.0176 4.9664-15.1552 1.8432-24.2688-10.9568-34.9696-88.7296-73.9328-122.368-167.5776-89.1392-278.8864 22.9888-76.9024 77.568-130.1504 148.5824-166.7584 131.4816-67.7888 296.6016-48.4352 406.4768 48.0768 40.8576 35.9424 68.9152 79.9744 82.7392 136.2432zM510.3616 374.272c21.76-0.512 38.656-17.3056 38.2464-37.888-0.4096-20.6336-17.7664-36.1472-40.0384-35.84-21.504 0.3072-39.5776 17.7664-39.1168 37.632 0.4608 19.3024 20.0704 36.608 40.9088 36.096z m-212.7872 0c21.6064-0.5632 38.8608-17.7152 38.2464-37.9904-0.6144-20.6848-17.92-36.096-40.192-35.6864-21.76 0.3584-38.9632 17.2544-38.4 37.7344 0.512 20.1216 18.8928 36.5056 40.3456 35.9424z" fill="#1DCE75" p-id="3149"></path><path d="M964.096 614.9632c-0.6144 75.52-29.0304 126.0032-76.4416 166.4-11.9808 10.1888-15.3088 19.5584-12.1344 33.8944 2.8672 12.8512 4.864 26.0096 5.4272 39.1168 0.3072 6.5024-1.5872 16.7424-5.8368 18.8928-5.7344 2.9696-15.5648 1.792-22.016-1.1264-11.9296-5.4784-23.9616-12.1856-33.6384-20.8896-18.1248-16.3328-36.6592-16.9984-60.2624-13.1584-77.9776 12.6976-151.9616-0.512-215.3472-49.6128-117.8624-91.2384-114.8928-241.92 5.12-330.4448 115.2512-85.0432 289.8944-61.3888 376.6784 51.9168 26.112 34.0992 39.9872 73.1648 38.4512 105.0112z m-332.8-24.4736c16.9472 0 30.8736-12.8 30.5664-28.1088-0.3072-15.104-14.9504-28.672-30.7712-28.5184-15.9232 0.1536-30.4128 13.7216-30.5664 28.672-0.2048 15.1552 13.8752 27.9552 30.7712 27.9552z m178.5856-25.2928c0.5632-17.3056-13.1072-31.232-29.0816-31.4368-16.0256-0.2048-30.464 13.2608-30.5664 28.5184-0.0512 15.36 13.9776 28.672 30.6688 28.1088 17.1008-0.6144 27.0848-9.6256 28.9792-25.1904z" fill="#05C46D" p-id="3150"></path><path d="M927.0272 511.8464c-0.4608-0.6144-0.8704-1.28-1.3824-1.9456-86.784-113.2544-261.4272-136.96-376.6784-51.9168-119.9616 88.5248-122.9824 239.2064-5.12 330.4448 6.6048 5.12 13.3632 9.728 20.1728 14.08 158.208-41.0112 289.6896-148.3776 363.008-290.6624z m-295.7312 78.6432c-16.896 0-30.9248-12.8-30.7712-28.0064 0.1536-14.9504 14.6432-28.5184 30.5664-28.672 15.8208-0.1536 30.464 13.4656 30.7712 28.5184 0.3072 15.36-13.6704 28.2112-30.5664 28.16z m149.5552-0.1024c-16.64 0.6144-30.72-12.7488-30.6688-28.1088 0.0512-15.2576 14.5408-28.7744 30.5664-28.5184 16.0256 0.2048 29.6448 14.1312 29.0816 31.4368-1.8432 15.5648-11.8272 24.576-28.9792 25.1904z" fill="#1DCE75" p-id="3151"></path><path d="M638.72 230.1952c-109.9264-96.512-274.9952-115.8656-406.4768-48.0768-71.0144 36.608-125.5936 89.856-148.5824 166.7584-30.7712 103.0656-4.1984 191.0272 70.4 262.1952 28.6208 4.1984 57.9584 6.4 87.7568 6.4a599.04 599.04 0 0 0 174.2848-25.8048c5.9392-47.36 27.5968-90.1632 64.512-129.5872 64.256-68.6592 146.4832-94.4128 240.8448-95.6416-13.824-56.32-41.8816-100.352-82.7392-136.2432zM297.5744 374.272c-21.4528 0.5632-39.8336-15.7696-40.3968-35.9424-0.5632-20.48 16.64-37.376 38.4-37.7344 22.272-0.3584 39.6288 15.0016 40.192 35.6864 0.6656 20.2752-16.5376 37.376-38.1952 37.9904z m212.7872 0c-20.8384 0.512-40.448-16.7936-40.9088-36.096-0.4608-19.9168 17.6128-37.3248 39.1168-37.632 22.272-0.3072 39.5776 15.2064 40.0384 35.84 0.4096 20.5824-16.4864 37.3248-38.2464 37.888z" fill="#3CD38E" p-id="3152"></path><path d="M548.9664 458.0352c-47.0016 34.7136-75.9808 78.9504-86.8352 125.3888 97.0752-35.8912 181.6576-97.4336 245.5552-176.4864-56.1152 0.2048-112.2304 16.7936-158.72 51.0976z" fill="#3CD38E" p-id="3153"></path><path d="M257.2288 338.3296c-0.5632-20.48 16.64-37.376 38.4-37.7344 22.272-0.3584 39.6288 15.0016 40.192 35.6864 0.2048 7.1168-1.792 13.7728-5.376 19.5072 90.5728-39.5264 169.472-100.8128 230.0928-177.2544-101.5808-49.152-225.28-49.5616-328.3456 3.584-71.0144 36.608-125.5936 89.856-148.5824 166.7584-5.7856 19.3536-9.472 38.144-11.264 56.3712 6.2464 0.2048 12.544 0.3072 18.8416 0.3072 68.352 0 134.0416-11.4688 195.2256-32.5632-16.3328-4.1984-28.7744-18.176-29.184-34.6624z" fill="#48E1AA" p-id="3154"></path></svg>
                                        </span>
                                    </a>
                                    <a href="<?php share($this,'weibo'); ?>"class="soc-link" data-title="Weibo">
                                        <span class="soc-icon">
                                            <svg t="1631351378490" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4128" width="48" height="48"><path d="M918.485 209.078c-62.138-69.905-155.345-95.796-238.195-77.672-20.713 5.178-31.069 23.301-28.48 44.014 5.178 20.713 23.302 31.069 44.014 28.48 59.55-12.945 126.865 5.178 170.88 54.37 44.014 49.193 56.96 116.509 36.247 176.058-2.59 10.356-2.59 18.123 2.589 28.48 5.178 7.767 12.945 15.534 20.712 18.123 18.124 5.178 38.836-5.178 46.604-23.302 23.301-85.44 7.767-178.646-54.371-248.551z" fill="#FFAE36" p-id="4129"></path><path d="M807.155 436.917c15.534 5.178 33.658-2.59 38.836-20.713 12.945-41.425 5.178-85.44-25.89-119.097-31.07-33.658-75.084-46.604-116.51-38.837-18.123 2.59-28.48 20.713-23.301 36.248 2.59 18.123 20.713 28.48 36.247 23.301 20.713-5.178 41.425 2.59 56.96 18.124 15.534 15.534 18.123 38.836 12.945 59.549-5.178 18.123 5.178 36.247 20.713 41.425z m-62.138 59.549c-12.945-5.179-23.302-7.768-15.535-23.302 15.535-38.836 15.535-72.494 0-95.796-31.068-44.014-116.508-41.425-212.304 0 0 0-31.069 12.945-23.302-10.356 15.535-49.193 12.946-88.029-10.356-111.33-51.781-51.782-191.592 2.588-310.689 121.686-88.029 90.618-139.81 183.824-139.81 266.675 0 157.934 201.948 253.73 398.718 253.73 258.907 0 429.786-150.167 429.786-269.265 0-72.494-62.138-113.919-116.508-132.042zM431.739 840.813c-157.934 15.534-292.566-56.96-302.922-157.934-10.357-103.563 108.74-199.359 266.675-214.893 157.933-15.535 292.565 56.96 302.922 157.933 10.356 103.563-108.742 199.36-266.675 214.894z" fill="#D81E06" p-id="4130"></path><path d="M447.273 545.658c-75.083-20.713-160.523 18.124-191.592 82.85-33.658 67.316 0 142.4 75.084 165.701 77.672 25.891 170.879-12.945 201.948-85.44 31.069-69.904-7.768-142.398-85.44-163.111z m-56.96 173.468c-15.534 23.302-46.603 36.247-72.494 23.302-23.301-10.356-31.069-38.836-15.534-62.138 15.534-23.302 46.603-33.658 69.905-23.302 25.89 7.768 33.658 36.247 18.123 62.138z" p-id="4131"></path></svg>
                                        </span>
                                    </a>
                                    <a href="<?php share($this,'facebook'); ?>" class="soc-link" data-title="Facebook">
                                        <span class="soc-icon">
                                            <svg t="1631353555223" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8022" width="48" height="48"><path d="M783.146667 180.693333V0h-236.8a184.96 184.96 0 0 0-184.96 184.96v176.426667h-120.533334v180.693333h120.533334V1024h241.066666V542.08h180.693334v-180.693333h-180.693334V180.693333z" p-id="8023"></path></svg>
                                        </span>
                                    </a>

                         
                                    <div class="soc-link show-more-socials" style="display: none;"></div>
                                </div>
                                <div class="share-block-item js-anchor link-to-comments" data-href="#comments-section">
                                    <div class="comments-count">
                                        <span><?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="share-block-item mobile-item js-mobile-share-show mobile-share-show-btn">
                                <div class="show-mobile-icon"></div>
                            </div>
                           
                        </div>
                        <div class="single-content wp-content">
                            <div class="wrap wrap-center">
                                <div class="wrap_float">
                                    <p>
                                        <?php echo ShortCode($this->content,$this,$this->user->hasLogin()); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                 
               <?php $this->need('comments.php'); ?>
            <div class="other-posts-section section">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <h2 class="title">转一转~</h2>
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
