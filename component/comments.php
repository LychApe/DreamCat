<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if ($this->options->DC_CommentsRadio != "TureMode") {
    return;
} ?>

<script >
	function getResponseIdFromTypecho() {
		return "<?php echo $this->respondId(); ?>";
	}
</script >

<div class="mdui-container dreamcat-comment-box-send" >
	<div id="comments" >
        <?php $comments = null;
        $this->comments()->to($comments); ?>

        <?php if ($this->allow('comment')): ?>
			<div class="mdui-chip shadow-A1 dreamcat-comment-title" >
				<span class="mdui-chip-icon" ><i class="mdui-icon material-icons" >create</i ></span >
				<span class="mdui-chip-title" >添加新评论</span >
			</div >
			<div id="<?php $this->respondId(); ?>" class="respond" >
				<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" >
					<div class="mdui-card border-comm-2 shadow-A1" >
						<div class="mdui-row" >
                            <?php if ($this->user->hasLogin()): ?>
								<div class="mdui-valign" >
									<p class="mdui-center" >登录身份:<a
												href="<?php $this->options->profileUrl(); ?>" ><?php $this->user->screenName(); ?></a >.
										<a href="<?php $this->options->logoutUrl(); ?>" title="Logout" >退出
										                                                                &raquo;</a >
									</p >
								</div >
                            <?php else: ?>
								<!--Card_1-->
								<div class="mdui-col-lg-6" >
									<div class="mdui-col-sm-12" >
										<div class="mdui-textfield" >
											<i class="mdui-icon material-icons" >account_circle</i >
											<input type="text" name="author" id="author" class="mdui-textfield-input"
											       placeholder="Username" value="<?php $this->remember('author'); ?>"
											       required />
										</div >
									</div >
								</div >
								<div class="mdui-col-lg-6" >
									<div class="mdui-col-sm-12" >
										<div class="mdui-textfield" >
											<i class="mdui-icon material-icons" >email</i >
											<input class="mdui-textfield-input" type="email" type="email" name="mail"
											       id="mail"
											       placeholder="Email" value="<?php $this->remember('mail'
                                            ); ?>" <?php echo $this->options->commentsRequireMail ?? 'required' ?> />
										</div >
									</div >
								</div >
								<div class="mdui-col-lg-12" >
									<div class="mdui-col-sm-12" >
										<div class="mdui-textfield" >
											<i class="mdui-icon material-icons" >language</i >
											<input type="url" name="url" id="url" class="mdui-textfield-input"
											       placeholder="https://" value="<?php $this->remember('url'); ?>"
                                                <?php echo $this->options->commentsRequireURL ?? 'required' ?> />
										</div >
									</div >
								</div >
                            <?php endif; ?>
							<!--Card_2-->
							<div class="mdui-col-lg-12" >
								<div class="mdui-col-sm-12" >
									<div class="mdui-textfield mdui-textfield-floating-label" >
										<i class="mdui-icon material-icons" >textsms</i >
										<textarea rows="8" cols="50" name="text" id="textarea"
										          class="mdui-textfield-input"
										          maxlength="<?php echo !empty($this->options->commentszs) ? $this->options->commentszs() : 1000 ?>"
										          placeholder="嘿~ 大神，快来点评一下吧"
										          required ><?php $this->remember('text'); ?></textarea >
									</div >
								</div >
							</div >

							<div class="mdui-float-right" >
								<div class="mdui-row mdui-row-gapless" >
									<input type="submit"
									       class="mdui-btn mdui-btn-raised mdui-color-deep-purple-accent border-comm-3"
									       id="Post"
									       value=" 发 射 ! " />
								</div >
							</div >
						</div >
					</div >
				</form >
			</div >
        <?php else: ?>
			<h3 >评论已关闭</h3 >
        <?php endif; ?>
	</div >
</div >

<?php if ($comments->have()): ?>
	<div class='mdui-container' >
		<div class="mdui-chip shadow-A1 dreamcat-comment-chip" >
			<span class="mdui-chip-icon" ><i class="mdui-icon material-icons" >assessment</i ></span >
			<span class="mdui-chip-title" >
			<?php $this->commentsNum('暂无评论', '仅有一条评论', '已有 %d 条评论'); ?>
		</span >
		</div >

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav(
            '<i class="mdui-icon material-icons">arrow_forward</i>',
            '<i class="mdui-icon material-icons">arrow_back</i>',
            10, '',
            array('wrapTag' => 'div', 'wrapClass' => 'pagination', 'itemTag' => '', 'currentClass' => 'page-number',)
        ); ?>
	</div >
<?php endif; ?>


<?php
function getAvatar($mail)
{
    $host = 'https://gravatar.loli.net';
    $url = '/avatar/';
    $rating = Helper::options()->commentsAvatarRating;
    $hash = md5(strtolower($mail));
    $email = strtolower($mail);
    $qq = str_replace('@qq.com', '', $email);
    if (strstr($email, "qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4) {
        $url = '//q3.qlogo.cn/g?b=qq&nk=' . $qq . '&s=100';
    } else {
        $url = $host . $url . $hash . '?s=50' . '&r=' . $rating . '&d=mm';
    }
    return $url;
}

// typecho use this function to render comments
function threadedComments($comments, $options)
{
    $commentClass = '';
    $identity = mt_rand() + mt_rand() + mt_rand() + mt_rand();
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $avatar_url = getAvatar($comments->mail);
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';


    ?>

	<li id="li-<?php $comments->theId(); ?>" class="dreamcat-comment-box-view comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>" >
		<div class="mdui-card fillet-A1 shadow-A1 button-ts dreamcat-comment-box-view"
		     id="<?php $comments->theId(); ?>" >
			<div class="mdui-card-header mdui-color-grey-50" >
				<a href="<?php $comments->permalink(); ?>" >
					<img class="mdui-card-header-avatar" src="<?php echo $avatar_url ?>" alt='avatar' />
				</a >
				<div class="mdui-card-header-title mdui-text-truncate" ><?php $comments->author(); ?></div >
				<div class="mdui-card-header-subtitle" ><?php $comments->date('Y-m-d H:i'); ?></div >
				<div class="mdui-card-menu" >
					<button class="mdui-btn mdui-btn-icon mdui-float-right"
					        mdui-tooltip="{content: '<?php echo getBrowser($comments->agent) . ' ' . getOs($comments->agent); ?>'}" >
						<i class="mdui-icon material-icons" >settings_system_daydream</i ></button >
				</div >
			</div >
			<div class="mdui-divider" ></div >
			<div class="mdui-card-content" id="<?php echo $identity; ?>" ><?php $comments->content(); ?></div >

			<div class="mdui-card-actions" >
				<div class="mdui-float-right" >
					<div class="mdui-row mdui-row-gapless" >
                    <span class="comment-reply cp-<?php $comments->theId(); ?> text-muted comment-reply-link" >
	                    <?php $comments->reply(
                            '<button class="mdui-btn mdui-btn-raised border-comm-3 shadow-A1 dreamcat-comment-btn">回复</button>'
                        ); ?>
                    </span >
						<span id="cancel-comment-reply"
						      class="cancel-comment-reply dreamcat-comment-btn cl-<?php $comments->theId(); ?> text-muted comment-reply-link"
						      style="display:none" ><?php $comments->cancelReply(
                                '<button class="mdui-btn mdui-btn-raised border-comm-3 shadow-A1" style="">取消</button>'
                            ); ?>
						</span >
					</div >
				</div >
			</div >
		</div >

        <?php if ($comments->children) { ?>
			<div class="comment-children" >
                <?php $comments->threadedComments($options); ?>
			</div >
        <?php } ?>
	</li >
<?php } ?>
