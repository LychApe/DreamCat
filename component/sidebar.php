<div class="mdui-card dreamcat-card" style="margin-right: 30px" >
    <?php if (!empty($this->options->DC_HeadImageUrl)) { ?>
		<img src="<?php $this->options->DC_HeadImageUrl(); ?>" class="card-img-top" style="width: 100%"
		     alt="head image" />
    <?php } else { ?>
		<img src="https://q1.qlogo.cn/g?b=qq&nk=10001&s=640" class="card-img-top" style="width: 100%"
		     alt="head image" />
    <?php } ?>
	<div class="mdui-card-primary" >
		<div class="mdui-card-primary-title" >
            <?php
            if (empty($this->options->DC_ProfileCardName)) {
                echo "博主";
            } else {
                $this->options->DC_ProfileCardName();
            }
            ?>
		</div >
		<div class="mdui-card-primary-subtitle" >
            <?php
            if (empty($this->options->DC_ProfileCardIntroduction)) {
                echo "博主很懒,啥都没写";
            } else {
                $this->options->DC_ProfileCardIntroduction();
            }
            ?>
		</div >
	</div >
    <?php
    if (!empty($this->options->DC_A_zfb) || !empty($this->options->DC_A_github)
        || !empty($this->options->DC_A_bilibili) || !empty($this->options->DC_A_linkedin)
        || !empty($this->options->DC_A_wx) || !empty($this->options->DC_A_wb)
        || !empty($this->options->DC_A_telegram) || !empty($this->options->DC_A_qq)):
        ?>
		<div style="border-top: 1px dashed #e0e0e0; font-size: 14px" ></div >
		<div class="mdui-card-content" >
            <?php if (!empty($this->options->DC_A_zfb)): ?>
				<a mdui-dialog="{target: '#DC_A_zfb'}" >
					<span class="icon iconfont icon-zhifubao" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_github)): ?>
				<a href="<?php $this->options->DC_A_github() ?>"
				   style="text-decoration: none; color: black" >
					<span class="icon iconfont icon-github" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_bilibili)): ?>
				<a href="<?php $this->options->DC_A_bilibili() ?>"
				   style="text-decoration: none; color: black" >
					<span class="icon iconfont icon-icon_bilibili-circle" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_linkedin)): ?>
				<a href="<?php $this->options->DC_A_linkedin() ?>"
				   style="text-decoration: none; color: black" >
					<span class="icon iconfont icon-linkedin0" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_wx)): ?>
				<a mdui-dialog="{target: '#DC_A_wx'}" >
					<span class="icon iconfont icon-logo-wechat" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_wb)): ?>
				<a href="<?php $this->options->DC_A_wb() ?>"
				   style="text-decoration: none; color: black" >
					<span class="icon iconfont icon-weibo" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_telegram)): ?>
				<a href="<?php $this->options->DC_A_telegram() ?>"
				   style="text-decoration: none; color: black" >
					<span class="icon iconfont icon-telegram" ></span >
				</a >
            <?php endif; ?>
            <?php if (!empty($this->options->DC_A_qq)): ?>
				<a mdui-dialog="{target: '#DC_A_qq'}" >
					<span class="icon iconfont icon-QQ-circle-fill" ></span >
				</a >
            <?php endif; ?>
		</div >
    <?php endif; ?>
</div >

<?php if (is_array($this->options->DC_ProfileCardModule) && in_array('DCShowPage', $this->options->DC_ProfileCardModule)): ?>
    <?php
    $pages = null;
    $pages = $this->widget('Widget_Contents_Page_List')->to($pages);
    ?>
    <?php if (!empty($pages->title)): ?>
		<br />
		<div class="mdui-card dreamcat-card" style="margin-right: 30px" >
			<div class="mdui-card-content" >
                <?php while ($pages->next()): ?>
					<li class="mdui-list-item mdui-ripple dreamcat-search" style="
                            margin: 0px 0px 15px;" >
						<a href="<?php $pages->permalink(); ?>"
						   class="mdui-list-item-content mdui-text-color-theme-text"
						   title="<?php $pages->title(); ?>" >
                            <?php $pages->title(); ?>
						</a >
					</li >
                <?php endwhile; ?>
			</div >
		</div >
    <?php endif; ?>
<?php endif; ?>

<?php if (is_array($this->options->DC_ProfileCardModule) && in_array('DCShowTags', $this->options->DC_ProfileCardModule)): ?>
    <?php
    $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=28')->to($tags); ?>
    <?php if (!empty($tags->name)): ?>
		<br />
		<div class="mdui-card dreamcat-card" style="margin-right: 30px" >
			<div class="mdui-card-content" >
                <?php while ($tags->next()): ?>
					<a href="<?php $tags->permalink(); ?>"
					   class="size-<?php $tags->split(5, 10, 20, 30); ?>" ><?php $tags->name(); ?></a >
                <?php endwhile; ?>
			</div >
		</div >
    <?php endif; ?>
<?php endif; ?>

<?php if (is_array($this->options->DC_ProfileCardModule) && in_array('DCShowInfo', $this->options->DC_ProfileCardModule)): ?>
	<br />
	<div class="mdui-card dreamcat-card" style="margin-right: 30px" >
		<div class="mdui-card-content" >
			<div class="dreamcat-search" style="margin: 0px 0px 15px;" >
				<div class='dreamcat-comment-text' > 文 章 : <?php $stat = null;
                    Typecho_Widget::widget('Widget_Stat')->to($stat);
                    $stat->publishedPostsNum() ?>
				</div >
			</div >
			<div class="dreamcat-search" style="" >
				<div class='dreamcat-comment-text' > 评 论
				                                     : <?php $stat->publishedCommentsNum() ?></div >
			</div >
		</div >
	</div >
<?php endif; ?>

<?php if (is_array($this->options->DC_ProfileCardModule) && in_array('DCShowCategory', $this->options->DC_ProfileCardModule)): ?>
    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
    <?php if (!empty($category)): ?>
		<br />
		<div class="mdui-card dreamcat-card" style="margin-right: 30px" >
			<div class="mdui-card-content" >
                <?php while ($category->next()): ?>
					<a href="<?php $category->permalink(); ?>"
					   class="size-<?php $category->split(5, 10, 20, 30); ?>" ><?php $category->name(); ?></a >
                <?php endwhile; ?>
			</div >
		</div >
    <?php endif; ?>
<?php endif; ?>
