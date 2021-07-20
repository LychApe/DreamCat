<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style>
.comment-list{list-style-type:none;}
.fillet-A1{border-radius:.5rem}
.shadow-A1{box-shadow:.5rem .875rem 2.375rem rgba(39,44,49,.06),.0625rem .1875rem .5rem rgba(39,44,49,.03)}
.button-ts{position:relative}
.button-ts:active{
transform:translateY(2px);
-webkit-transition:box-shadow 2.5s;
box-shadow:.5rem .875rem 2.375rem rgba(255,255,255,.12),
.0625rem .1875rem .5rem transparent
}
.border-comm{
    border-radius:12px;
}
    .border-comm-1{
        border-radius:9px;
    }
    .border-comm-2{
        border-radius:19px;
    }
    .border-comm-3{
        border-radius:19px;
    }
a{
    text-decoration: none;
    color: black;
}
</style>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="mdui-chip shadow-A1" style="background-color: #ececec;">
      <span class="mdui-chip-icon"><i class="mdui-icon material-icons">create</i></span>
      <span class="mdui-chip-title"><?php _e('添加新评论'); ?></span>
    </div>
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    <br/>
    <br/>
    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <div class="mdui-card border-comm-2 shadow-A1">
          <div class="mdui-row">
        <?php if($this->user->hasLogin()): ?>
        <div class="mdui-valign">
          <p class="mdui-center"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
        </div>
        <?php else: ?>
              <!--Card_1-->
                <div class="mdui-col-lg-6">
                <div class="mdui-col-sm-12">
                    <div class="mdui-textfield">
                        <i class="mdui-icon material-icons">account_circle</i>
                        <input type="text" name="author" id="author" class="mdui-textfield-input" placeholder="Username" value="<?php $this->remember('author'); ?>" required />
                    </div>
                </div>
                </div>
                <div class="mdui-col-lg-6">
                <div class="mdui-col-sm-12">
                    <div class="mdui-textfield">
                      <i class="mdui-icon material-icons">email</i>
                      <input class="mdui-textfield-input" type="email" type="email" name="mail" id="mail" placeholder="Email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> <?php endif; ?> />
                    </div>
                </div>
                </div>
                <div class="mdui-col-lg-12">
                <div class="mdui-col-sm-12">
                    <div class="mdui-textfield">
                      <i class="mdui-icon material-icons">language</i>
                      <input type="url" name="url" id="url" class="mdui-textfield-input" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </div>
                </div>
                </div>
<?php endif; ?>
              <!--Card_2-->
                  <div class="mdui-col-lg-12">
                  <div class="mdui-col-sm-12">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                      <i class="mdui-icon material-icons">textsms</i>
                      <textarea rows="8" cols="50" name="text" id="textarea" class="mdui-textfield-input" maxlength="<?php if(!empty($this->options->commentszs)): ?><?php $this->options->commentszs() ?><?php else: ?>1000<?php endif; ?>" placeholder="嘿~ 大神，快来点评一下吧" required><?php $this->remember('text'); ?></textarea>
                    </div>
                  </div>
                  </div>
                <br/>
                <!--<div class="mdui-clearfix">-->
                  <div class="mdui-float-right">
                      <div class="mdui-row mdui-row-gapless">
                             <input type="submit" class="mdui-btn mdui-btn-raised mdui-color-deep-purple-accent border-comm-3" id="Post" value=" 发 射 ! " />
                      </div>
                  </div>
    </form>             
                  
        </div>
        </div>          

    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    <?php if ($comments->have()): ?>
    <br/>
    <div class="mdui-chip shadow-A1" style="background-color: #ececec;">
      <span class="mdui-chip-icon"><i class="mdui-icon material-icons">assessment</i></span>
      <span class="mdui-chip-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>
    </div>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('<i class="mdui-icon material-icons">arrow_forward</i>', '<i class="mdui-icon material-icons">arrow_back</i>',10,'',array('wrapTag' => 'div', 'wrapClass' => 'pagination','itemTag' => '','currentClass' => 'page-number',)); ?>
    
    <?php endif; ?>
    
    

    
    


    
</div>






<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';

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
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    
        <div class="mdui-card fillet-A1 shadow-A1 button-ts" id="<?php $comments->theId(); ?>">
              <div class="mdui-card-header mdui-color-grey-50">
                <a href="<?php $comments->permalink(); ?>">
                    <img class="mdui-card-header-avatar" src="<?php echo $avatar ?>"/>
                </a>
                <div class="mdui-card-header-title mdui-text-truncate"><?php $comments->author(); ?></div>
                <div class="mdui-card-header-subtitle"><?php $comments->date('Y-m-d H:i'); ?></div>
                <div class="mdui-card-menu">
                <button class="mdui-btn mdui-btn-icon mdui-float-right" mdui-tooltip="{content: '<?php echo getBrowser($comments->agent); ?> <?php echo getOs($comments->agent); ?>'}"><i class="mdui-icon material-icons">settings_system_daydream</i></button>
                </div>
              </div>
              <div class="mdui-divider"></div>
              <?php $identity = mt_rand()+mt_rand()+mt_rand()+mt_rand();?>
              <div class="mdui-card-content" id="<?php echo $identity; ?>"><?php $comments->content(); ?></div>

  <div class="mdui-card-actions" style="padding: 0px;">
                  <div class="mdui-float-left">
                      <div class="mdui-row mdui-row-gapless">
                          <button class="mdui-btn mdui-btn-raised border-comm-3 shadow-A1" style="margin-left: -12px; background-color: rgb(236 236 236);"> <?php $comments->reply(); ?> </button>
                      </div>
                  </div>

<?php $comments->cancelReply('
  <div class="mdui-float-left" style="margin-left: -80px;">
          <button class="mdui-btn mdui-btn-raised border-comm-3 shadow-A1" style=" background-color: rgb(236 236 236);">取消回复</button>
  </div>'); ?>

    <button class="mdui-btn mdui-btn-icon mdui-float-right" onclick="playAudio(<?php echo $identity ?>)" ><i class="mdui-icon material-icons">settings_voice</i></button>
  </div>
        </div>
        <br/>
    <script type="text/javascript"> 
		function playAudio(commentID){
		    //commendID: The identity of every comment.
		    var audioID = "audioPlayer";
		    if(document.getElementById(audioID)) document.getElementById(audioID).remove();
		    var content = document.getElementById(commentID).innerHTML.replace(/\&/g,"和");
		    var audio = document.createElement("audio");
	        audio.setAttribute("autoplay","autoplay");
	        audio.setAttribute("id","audioPlayer");
	        var source = document.createElement("source");
	        source.src="https://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&spd=6&text="+content;
	        source.setAttribute("type","audio/mpeg");
	        var embed = document.createElement("embed");
	        embed.style.display="none";
	        audio.appendChild(source);
	        audio.appendChild(embed);
        	document.body.appendChild(audio);
		}
		if(typeof(publiced)=="undefined") console.log("使用此控制台可能会让攻击者利用 Self-XSS（自跨站脚本）攻击来冒充你，并窃取你的信息。请勿输入或粘贴你不明白的代码。");
		var publiced = true;
</script>


<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>


