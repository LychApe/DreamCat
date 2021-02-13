<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		} else {
			$commentClass .= ' comment-by-user';
		}
	}

	$commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
<?php
	$host = 'https://gravatar.loli.net'; 
	$url = '/avatar/'; 
	$rating = Helper::options()->commentsAvatarRating;
	$hash = md5(strtolower($comments->mail));
	$email = strtolower($comments->mail);
	$qq=str_replace('@qq.com','',$email);
	if(strstr($email,"qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4) {
		$avatar = '//q3.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
	}
	else {
		$avatar = $host . $url . $hash . '?s=50' . '&r=' . $rating . '&d=mm';
	}	   
?>
		<div class="mdui-card" style="border-radius:18px;" id="<?php $comments->theId(); ?>">
			<div class="mdui-card-header">
				<img class="mdui-card-header-avatar" src="<?php echo $avatar ?>"/>
				<div class="mdui-card-header-title mdui-typo"><?php $comments->author(); ?>
					<span class="mdui-float-right"><?php $comments->dateWord(); ?></span>
				</div>
				<div class="mdui-card-header-subtitle">
					<?php echo getBrowser($comments->agent); ?> <?php echo getOs($comments->agent); ?>
				</div>
			</div>
			<div class="mdui-card-content">
				<?php showCommentContent($comments->coid); ?>
			</div>
		</div> 
		<br/>
		<?php if ($comments->children): ?>
		<?php $comments->threadedComments($options); ?>
		<?php endif; ?>


<?php } ?>
<?php $this->comments()->to($comments); ?>
<?php if($this->allow('comment')): ?>


<div class="" id="<?php $this->respondId(); ?>">
<form  method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
	<?php if($this->user->hasLogin()): ?>

<div class="mdui-card" style="border-radius:18px;">
	<div class="mdui-card-content">
		<div class="mdui-row">
			<div class="mdui-col-xs-12 mdui-col-sm-12">
			  <div class="mdui-typo">
                    <h4>
                        <?php _e('登录身份: '); ?>
                        <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
                        <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </h4>
                </div>
			<div class="mdui-textfield">
				<i class="mdui-icon material-icons">explore</i>
	
				<textarea name="text" id="veditor" class="mdui-textfield-input" maxlength="<?php if(!empty($this->options->commentszs)): ?><?php $this->options->commentszs() ?><?php else: ?>1000<?php endif; ?>" placeholder="嘿~ 大神，快来点评一下吧"><?php $this->remember('text',false); ?></textarea>
			</div>	  
			</div>
			<div class="mdui-col-xs-12 mdui-col-sm-12">
				<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-float-right" type="submit" title="Cmd|Ctrl+Enter" id="misubmit">回复</button>
				<?php $security = $this->widget('Widget_Security'); ?>  
			</div>
		</div>
	</div>
</div>
		
<?php else: ?>
	<div class="mdui-card" style="border-radius:18px;">
		<div class="mdui-card-content">
			<div class="mdui-row">
				<div class="mdui-col-xs-12 mdui-col-sm-6">
					<div class="mdui-textfield">
						<i class="mdui-icon material-icons">account_circle</i>
						<input class="mdui-textfield-input" type="text" name="author" placeholder="昵称" value="<?php $this->remember('author'); ?>"/>
					</div>
				</div>
				
				<div class="mdui-col-xs-12 mdui-col-sm-6">
					<div class="mdui-textfield">
						<i class="mdui-icon material-icons">email</i>
						<input class="mdui-textfield-input" type="email" name="mail" placeholder="邮箱" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>/>
					</div>
				</div>
				
			</div>
			<div class="mdui-row">
				<div class="mdui-col-xs-12 mdui-col-sm-12">
					<div class="mdui-textfield">
						<i class="mdui-icon material-icons">explore</i>
						<textarea name="text" id="veditor" class="mdui-textfield-input" maxlength="<?php if(!empty($this->options->commentszs)): ?><?php $this->options->commentszs() ?><?php else: ?>1000<?php endif; ?>" placeholder="嘿~ 大神，快来点评一下吧"><?php $this->remember('text'); ?></textarea>
					</div>
				</div>
			</div>
			
			<div class="mdui-row-xs-2">
				<div class="mdui-col">
				</div>
				<div class="mdui-col">
					<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-float-right" type="submit" title="Cmd|Ctrl+Enter" id="misubmit">回复</button>
					<?php $security = $this->widget('Widget_Security'); ?>
				</div>
			</div>
		
		</div>
	</div>
	</div>
		

<?php endif; ?>
</form>	
<?php if($this->commentsNum!=0): ?>
<!--<span class="vnum"><?php #$this->commentsNum('%d'); ?></span> 评论-->
<?php else: ?>
<!--<div class="vempty" style="display:block;">快来做第一个评论的人吧~</div>-->
<?php endif; ?>
<?php if ($comments->have()): ?>
<?php $comments->listComments(); ?>
<?php endif; ?>
		<?php $comments->pageNav('<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>',10,'',array('wrapTag' => 'div', 'wrapClass' => 'pagination','itemTag' => '','currentClass' => 'page-number',)); ?>
<?php endif; ?>