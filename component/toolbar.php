<div class="mdui-container mdui-hidden-sm-down dreamcat-toolbar" >
	<div class='mdui-row' >
		<div class="mdui-card dreamcat-card" >
			<div class="mdui-card-content" >
				<div class="mdui-row" >
					<div class="mdui-col-xs-6 mdui-col-sm-3" >
						<form method="post" action="" class="dreamcat-search mdui-float-left" >
							<button type="submit" class="submit mdui-btn mdui-btn-icon" >
								<i class="mdui-icon material-icons mdui-text-color-theme-icon" >search</i ></button >
							<label >
								<input
										type="text" class="dreamcat-search-modal" name="s"
										placeholder="输入关键词进行搜索" />
							</label >
						</form >
					</div >
					<div class="mdui-col-xs-6 mdui-col-sm-6" >
						<form method="get" class="dreamcat-search" style="max-width: 100%" >
							<div class="dreamcat-search-modal" >
								<div class="mdui-card-primary-subtitle mdui-valign" >
									<p id="hitokoto" class="mdui-center" >
										<a href="#" id="hitokoto_text" >:D 获取中...</a >
									</p >
								</div >
							</div >
						</form >
						<script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer ></script >
						<script
								src="<?php CustomCDN_FAM('DreamCat_StaticResources/js/', '', 'js/time.js', 'time.js'); ?>" >
						</script >
					</div >
					<div class="mdui-col-xs-6 mdui-col-sm-3" >
						<form method="get" class="dreamcat-search mdui-hidden-sm-down mdui-float-right" >
							<button type="submit" class="submit mdui-btn mdui-btn-icon" >
								<i class="mdui-icon material-icons mdui-text-color-theme-icon" >access_time</i >
							</button >
							<div class="dreamcat-search-modal" style="height: 50%" >
								<div class="mdui-card-primary-subtitle" >
									<div class="showTime" ></div >
								</div >
							</div >
						</form >
					</div >
				</div >
			</div >
		</div >
	</div >
</div >