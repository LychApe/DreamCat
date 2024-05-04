<div class="mdui-col" >
	<div class="dreamcat-post-btn" >
		<button mdui-menu="{target: '#DreamCat-post-share',align: 'center'}"
		        mdui-tooltip="{content: '分享'}"
		        class="mdui-btn mdui-btn-icon mdui-color-grey-200 mdui-ripple" >
			<i class="mdui-icon material-icons" >&#xe80d;</i >
		</button >
		<ul class="mdui-menu dreamcat-share-panel" id="DreamCat-post-share" >
			<li class="mdui-menu-item" >
				<a href="https://connect.qq.com/widget/shareqq/index.html?site=<?php $this->options->title(); ?>&title=<?php $this->title() ?>&url=<?php $this->permalink() ?>"
				   class="mdui-ripple" >分享到 QQ</a >
			</li >
			<li class="mdui-menu-item" >
				<a href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&content=utf-8"
				   class="mdui-ripple" >分享到 QQ空间</a >
			</li >
			<li class="mdui-menu-item" >
				<a href="https://service.weibo.com/share/share.php?appkey=&title=<?php $this->title() ?>&url=<?php $this->permalink() ?>"
				   class="mdui-ripple" >分享到 微博</a >
			</li >
		</ul >
	</div >
</div >