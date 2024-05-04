<div class="mdui-card dreamcat-post-copyright mdui-color-grey-50" >
	<img alt="info_icon" src="<?php CustomCDN_FAM('DreamCat_StaticResources/img/', '', 'img/info.svg', 'info.svg'); ?>" >
	<div class="mdui-card-actions mdui-typo" >
		#本文链接：<a href="<?php $this->permalink() ?>" ><?php $this->permalink() ?></a ><br >
		#本文采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" target="_blank"
		             rel="noopener" >CC BY-NC-SA 4.0</a > 协议进行许可
		<br />
		#如无特别声明，该文章均为 <a
				href="<?php $this->options->siteUrl(); ?>" ><?php $this->author(); ?></a > 原创,转载请遵循
		署名-非商业性使用 4.0 国际(CC BY-NC 4.0)协议,即转载请注明文章来源。
		<br />
		#最后编辑时间为: <?php echo date('Y 年 m 月 d 日', $this->modified); ?>
	</div >
</div >