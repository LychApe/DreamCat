<div class="mdui-card dreamcat-post-copyright mdui-color-grey-50" >
	<svg class="icon" viewBox="0 0 1024 1024" width="128"
	     height="128" >
		<path
				d="M512 106.7a405.3 405.3 0 110 810.6 405.3 405.3 0 010-810.6zm0 85.3a320 320 0 100 640 320 320 0 000-640zm42.7 277.3V704h-85.4V469.3h85.4zM512 298.7a47 47 0 110 93.8 47 47 0 010-93.8z" >
		</path >
	</svg >
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