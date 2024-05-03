<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if (!empty($this->options->DC_WebCustomFooterModeRadio == 'LRMode')): ?>
	<footer >
		<div style="background-color: #f2f2f2; padding: 0 8%;" >
			<div style="display: flex; justify-content: space-between;color: #000;padding: 40px 0;" >

				<div style="display: flex;flex-direction: column;line-height: 2;color: #000;" >
                    <?php if (!empty($this->options->icpba)): ?>
						<a target="_blank"
						   style="color: black;background-color: transparent;text-decoration-line: none;"
						   href="https://beian.miit.gov.cn/" >互联网ICP备案：<?php $this->options->icpba() ?></a >
                    <?php endif; ?>
					<span ><?php $this->options->DC_WebCustomFooter(); ?></span >
					<span >Copyright © <?php echo date('Y'); ?> <?php $this->options->DC_WebName(); ?>.</span >
				</div >

				<div class="mdui-hidden-sm-down"
				     style="box-sizing: border-box; display: flex;flex-direction: column;align-items: flex-start;padding: 0 50px;position: relative;" >
					<div class="footer-top-contact-logos" >
                        <?php
                        if (!empty($this->options->DC_FooterLogoUrl)) {
                            echo('<img width="180px" height="50px" src="' . $this->options->DC_FooterLogoUrl . '">');
                        }
                        ?>
					</div >
					<div style="align-items: center;" >
						<div class="mdui-row-xs-3" >
							<div class="mdui-col" >
                                <?php if (!empty($this->options->DC_A_qq)): ?>
									<a mdui-dialog="{target: '#DC_A_qq'}" >
										<div class="DreamCat-icon-ts icon iconfont icon-QQ-circle-fill"
										     style="font-size: 35px;" ></div >
									</a >
                                <?php endif; ?>
							</div >
							<div class="mdui-col" >
                                <?php if (!empty($this->options->DC_A_github)): ?>
									<a href="<?php $this->options->DC_A_github() ?>"
									   style="text-decoration: none;color: black;" >
										<div class="DreamCat-icon-ts icon iconfont icon-github"
										     style="font-size: 35px;" ></div >
									</a >
                                <?php endif; ?>
							</div >
							<div class="mdui-col" >
                                <?php if (!empty($this->options->DC_A_wx)): ?>
									<a mdui-dialog="{target: '#DC_A_wx'}" >
										<div class="DreamCat-icon-ts icon iconfont icon-logo-wechat"
										     style="font-size: 35px;" >
										</div >
									</a >
                                <?php endif; ?>
							</div >
						</div >
					</div >
				</div >

			</div >
		</div >
	</footer >
<?php else: ?>
	<footer class="dreamcat-footer-c-0" >
		<div class="dreamcat-footer-c-1"
		     style="
             background-color: #f2f2f2;
             display: flex;
             justify-content: center;
             align-items: center;" >
			<div class="dreamcat-footer--c2"
			     style="
                 display: flex;
                 justify-content: space-between;
                 color: #000;
                 padding: 40px 0;
                 text-align: center;" >

				<div class="dreamcat-footer-c-3"
				     style="
                     display: flex;
                     flex-direction: column;
                     line-height: 2;
                     color: #000;
                     text-align: center;" >
					<span ><?php $this->options->DC_WebCustomFooter(); ?></span >
                    <?php if (!empty($this->options->icpba)): ?>
						<a target="_blank"
						   style="color: black;background-color: transparent;text-decoration-line: none;"
						   href="https://beian.miit.gov.cn/" >互联网ICP备案：<?php $this->options->icpba() ?></a >
                    <?php endif; ?>
					<span >Copyright © <?php echo date('Y'); ?> <?php $this->options->DC_WebName(); ?>.</span >
				</div >

			</div >
		</div >
	</footer >
<?php endif; ?>

<div class="mdui-dialog" id="DC_A_qq" >
	<div class="mdui-dialog-title" >加我的QQ</div >
	<div class="mdui-dialog-content mdui-typo" >
		<img src="<?php $this->options->DC_A_qq(); ?>" >
	</div >
	<div class="mdui-dialog-actions" >
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
	</div >
</div >
<div class="mdui-dialog" id="DC_A_wb" >
	<div class="mdui-dialog-title" >加我的微博</div >
	<div class="mdui-dialog-content mdui-typo" >
		<img src="<?php $this->options->DC_A_wb() ?>" >
	</div >
	<div class="mdui-dialog-actions" >
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
	</div >
</div >
<div class="mdui-dialog" id="DC_A_zfb" >
	<div class="mdui-dialog-title" >加我的支付宝</div >
	<div class="mdui-dialog-content mdui-typo" >
		<img src="<?php $this->options->DC_A_zfb() ?>" >
	</div >
	<div class="mdui-dialog-actions" >
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
	</div >
</div >
<div class="mdui-dialog" id="DC_A_wx" >
	<div class="mdui-dialog-title" >加我的微信</div >
	<div class="mdui-dialog-content mdui-typo" >
		<img src="<?php $this->options->DC_A_wx() ?>" >
	</div >
	<div class="mdui-dialog-actions" >
		<button class="mdui-btn mdui-ripple" mdui-dialog-confirm >确认</button >
	</div >
</div >
<div class="mdui-fab-wrapper" >
	<a href="#top" class="mdui-fab mdui-fab-mini mdui-ripple mdui-color-pink scrollTop" id="back-top"
	   onclick="scrollFunction()" >
		<i class="mdui-icon material-icons" >&#xe5d8;</i ></a >
</div >

<script
		src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/mdui.min.js', 'mdui.min.js'); ?>" >
</script >
<script
		src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/highlight.min.js', 'highlight.min.js'); ?>" >
</script >
<script
		src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/smooth-scroll.min.js', 'smooth-scroll.min.js'); ?>" >
</script >
<script
		src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/dreamcat.js', 'dreamcat.js'); ?>" >
</script >
<script >
	hljs.initHighlightingOnLoad();
</script >


<?php if (is_array($this->options->DC_GlobalApp) && in_array('DCShowClickEffect', $this->options->DC_GlobalApp)): ?>
	<script
			src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/axtx.js', 'axtx.js'); ?>" >
	</script >
<?php endif; ?>

<script >
    <?php $this->options->DC_WebCustomJavascript() ?>
</script >
<?php $this->footer(); ?>

</body>

</html>
