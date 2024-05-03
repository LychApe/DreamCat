<?php while ($this->next()): ?>
    <?php if ($this->options->DC_ArticleListModeRadio == "ImgMode"): ?>
		<article class="post" itemscope itemtype="https://schema.org/BlogPosting" >
			<a itemprop="url" href="<?php $this->permalink() ?>" >
				<div class="mdui-card dreamcat-card dreamcat-card-animation-1" >
					<div class="mdui-card-media" >
                        <?php
                        $t = thumb($this);
                        $User_ImageUrl_TF = $this->fields->User_ImageUrl_TF;
                        if (!empty($User_ImageUrl_TF)) {
                            $src = $User_ImageUrl_TF;
                        } else {
                            $src = $t[1];
                        }
                        if ($t[0] == 0): ?>
							<img class="dreamcat-card-post-img" src="<?php echo $src ?>" alt="" />
                        <?php endif; ?>
                        <?php if ($t[0] == 1) : ?>
							<img class="dreamcat-card-post-img" src="<?php echo $src ?>" alt="" />
                        <?php endif; ?>

						<div class="mdui-card-media-covered" >
							<div class="mdui-card-primary" >
								<div class="mdui-card-primary-title" >
                                    <?php $this->title() ?>
									<br />
                                    <?php if (is_array($this->options->DC_GlobalApp) &&
                                        in_array('DCShowPublicationTime',
                                            $this->options->DC_GlobalApp)): ?>
										<small >发表时间:
											<time datetime="<?php $this->date('c'); ?>"
											      itemprop="datePublished" ><?php $this->date(); ?></time >
										</small >
                                    <?php endif; ?>
								</div >
							</div >
						</div >
					</div >
				</div >
			</a >
			<br />
		</article >
    <?php else: ?>
		<article class="post" itemscope itemtype="https://schema.org/BlogPosting" >
			<div class="mdui-card dreamcat-card dreamcat-card-animation-1" >
				<a itemprop="url" href="<?php $this->permalink() ?>" >
					<div class="mdui-card-primary"
					     style="background: linear-gradient(to bottom, rgb(238 242 245 / 50%), rgba(255, 255, 255, 0));
                                            mask-image: linear-gradient(to top, transparent, black);" >
						<div class="mdui-card-primary-title" >
                            <?php $this->title() ?>
						</div >
						<div class="mdui-card-primary-subtitle" >
                            <?php
                            if (
                                is_array($this->options->DC_GlobalApp)
                                &&
                                in_array('DCShowPublicationTime', $this->options->DC_GlobalApp)
                            ): ?>
								<small >
									发表时间:
									<time datetime="<?php $this->date('c'); ?>"
									      itemprop="datePublished" ><?php $this->date(); ?>
									</time >
								</small >
                            <?php endif; ?>
						</div >
						<div
								class="mdui-card-content"
								style="
                                            max-height: 200px;
                                            overflow: hidden;"
						>
                            <?php $this->summary(); ?>
						</div >
						<div
								style="text-align: center;"
						>
							<h3 style="font-weight: 200;" >- 阅读剩余部分 -</h3 >
						</div >
					</div >
				</a >
				<div class="mdui-chip" style="margin: 0px 15px 20px;" >
                                    <span class="mdui-chip-icon" >
                                        <i class="mdui-icon material-icons" >&#xe149;</i >
                                    </span >
					<span class="mdui-chip-title" >
                                        <?php echo $this->category(','); ?>
                                    </span >
				</div >
                <?php if (count($this->tags) > 0): ?>
					<div class="mdui-chip" >
                                    <span class="mdui-chip-icon" >
                                        <i class="mdui-icon material-icons" >&#xe226;</i >
                                    </span >
						<span class="mdui-chip-title" >
                                            <?php $this->tags(' , ', true, '没有标签'); ?>
                                        </span >
					</div >
                <?php endif; ?>
			</div >
			<br />
		</article >
    <?php endif; ?>
<?php endwhile; ?>

<div style="height: 30px;" ></div >

<div class="dreamcat-page-div DreamCat-card-a" >
    <?php $this->pageLink('<button
				class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 DreamCat-prev"
			>
				<i class="mdui-icon material-icons">navigate_before</i></button
			>', 'prev'); ?>
	<button class="mdui-btn dreamcat-number" disabled="" >
                <span class="" >
                    <?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo
                    1; ?>/
                    <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>
                </span >
	</button >
    <?php $this->pageLink('<button
				class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent mdui-shadow-5 DreamCat-next"
			>
				<i class="mdui-icon material-icons">navigate_next</i></button
			>', 'next'); ?>
</div >
