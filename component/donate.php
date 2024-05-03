<?php if (!empty($this->options->DC_AdmireQCode)): ?>
	<div class="mdui-col" >
		<div class="dreamcat-post-btn" >
			<button mdui-menu="{target: '#Dreamcat-post-btn',align: 'center'}"
			        mdui-tooltip="{content: '赞赏'}"
			        class="mdui-btn mdui-btn-icon mdui-color-grey-200 mdui-ripple" >
				<i class="mdui-icon material-icons" >&#xe3e7;</i >
			</button >
			<div class="mdui-menu mdui-menu-open" id="Dreamcat-post-btn"
			     style="box-shadow: rgb(245 245 245 / 65%) 6px 15px 20px 18px; transform-origin: 50% 0px; position: absolute; top: 9843px; left: 619px; border-radius: 0.75rem;" >
				<img alt="赞赏" src="<?php $this->options->DC_AdmireQCode(); ?>"
				     style="object-fit: cover;height: 100%;width: 100%;" >
			</div >
		</div >
	</div >
<?php endif; ?>