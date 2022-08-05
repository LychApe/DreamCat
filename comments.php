<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style>
.comment-list {
    list-style-type: none;
}

.fillet-A1 {
    border-radius: .5rem
}

.shadow-A1 {
    box-shadow: .5rem .875rem 2.375rem rgba(39, 44, 49, .06), .0625rem .1875rem .5rem rgba(39, 44, 49, .03)
}

.button-ts {
    position: relative
}

.button-ts:active {
    transform: translateY(2px);
    -webkit-transition: box-shadow 2.5s;
    box-shadow: .5rem .875rem 2.375rem rgba(255, 255, 255, .12),
        .0625rem .1875rem .5rem transparent
}

.border-comm {
    border-radius: 12px;
}

.border-comm-1 {
    border-radius: 9px;
}

.border-comm-2 {
    border-radius: 19px;
}

.border-comm-3 {
    border-radius: 19px;
}

a {
    text-decoration: none;
    color: black;
}

#cancel-comment-reply-link {
    display: inline !important;
}
</style>

<div id="comments">
    <?php $comments = null;
		$this->comments()->to($comments); ?>
    <script type="text/javascript">
    function showhidediv(id) {
        var sbtitle = document.getElementById(id);
        if (sbtitle) {
            if (sbtitle.style.display == 'flex') {
                sbtitle.style.display = 'none';
            } else {
                sbtitle.style.display = 'flex';
            }
        }
    }

    (function() {
        window.TypechoComment = {
            dom: function(id) {
                return document.getElementById(id)
            },
            pom: function(id) {
                return document.getElementsByClassName(id)[0]
            },
            iom: function(id, dis) {
                var alist = document.getElementsByClassName(id);
                if (alist) {
                    for (var idx = 0; idx < alist.length; idx++) {
                        var mya = alist[idx];
                        mya.style.display = dis
                    }
                }
            },
            create: function(tag, attr) {
                var el = document.createElement(tag);
                for (var key in attr) {
                    el.setAttribute(key, attr[key])
                }
                return el
            },
            reply: function(cid, coid) {
                var comment = this.dom(cid),
                    parent = comment.parentNode,
                    response = this.dom("<?php echo $this->respondId(); ?>"),
                    input = this.dom("comment-parent"),
                    form = "form" == response.tagName ? response : response.getElementsByTagName("form")[0],
                    textarea = response.getElementsByTagName("textarea")[0];
                if (null == input) {
                    input = this.create("input", {
                        "type": "hidden",
                        "name": "parent",
                        "id": "comment-parent"
                    });
                    form.appendChild(input)
                }
                input.setAttribute("value", coid);
                if (null == this.dom("comment-form-place-holder")) {
                    var holder = this.create("div", {
                        "id": "comment-form-place-holder"
                    });
                    response.parentNode.insertBefore(holder, response)
                }
                comment.appendChild(response);
                this.iom("comment-reply", "");
                this.pom("cp-" + cid).style.display = "none";
                this.iom("cancel-comment-reply", "none");
                this.pom("cl-" + cid).style.display = "";
                if (null != textarea && "text" == textarea.name) {
                    textarea.focus()
                }
                return false
            },
            cancelReply: function() {
                var response = this.dom("<?php echo $this->respondId(); ?>"),
                    holder = this.dom("comment-form-place-holder"),
                    input = this.dom("comment-parent");
                if (null != input) {
                    input.parentNode.removeChild(input)
                }
                if (null == holder) {
                    return true
                }
                this.iom("comment-reply", "");
                this.iom("cancel-comment-reply", "none");
                holder.parentNode.insertBefore(response, holder);
                return false
            }
        }
    })();
    </script>

    <div class="mdui-chip shadow-A1" style="background-color: #ececec;">
        <span class="mdui-chip-icon"><i class="mdui-icon material-icons">create</i></span>
        <span class="mdui-chip-title"><?php _e('添加新评论'); ?></span>
    </div>
    <?php if ($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <br />
        <br />
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <div class="mdui-card border-comm-2 shadow-A1">
                <div class="mdui-row">
                    <?php if ($this->user->hasLogin()): ?>
                    <div class="mdui-valign">
                        <p class="mdui-center"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(
									); ?></a>.
                            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?>
                                &raquo;</a>
                        </p>
                    </div>
                    <?php else: ?>
                    <!--Card_1-->
                    <div class="mdui-col-lg-6">
                        <div class="mdui-col-sm-12">
                            <div class="mdui-textfield">
                                <i class="mdui-icon material-icons">account_circle</i>
                                <input type="text" name="author" id="author" class="mdui-textfield-input"
                                    placeholder="Username" value="<?php $this->remember('author'); ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="mdui-col-lg-6">
                        <div class="mdui-col-sm-12">
                            <div class="mdui-textfield">
                                <i class="mdui-icon material-icons">email</i>
                                <input class="mdui-textfield-input" type="email" type="email" name="mail" id="mail"
                                    placeholder="Email" value="<?php $this->remember(
												   'mail'
										   ); ?>" <?php if ($this->options->commentsRequireMail): ?><?php endif; ?> />
                            </div>
                        </div>
                    </div>
                    <div class="mdui-col-lg-12">
                        <div class="mdui-col-sm-12">
                            <div class="mdui-textfield">
                                <i class="mdui-icon material-icons">language</i>
                                <input type="url" name="url" id="url" class="mdui-textfield-input"
                                    placeholder="<?php _e('http://'); ?>" value="<?php $this->remember(
												   'url'
										   ); ?>" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--Card_2-->
                    <div class="mdui-col-lg-12">
                        <div class="mdui-col-sm-12">
                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <i class="mdui-icon material-icons">textsms</i>
                                <textarea rows="8" cols="50" name="text" id="textarea" class="mdui-textfield-input"
                                    maxlength="<?php if (!empty($this->options->commentszs)): ?><?php $this->options->commentszs(
										  ) ?><?php else: ?>1000<?php endif; ?>" placeholder="嘿~ 大神，快来点评一下吧"
                                    required><?php $this->remember('text'); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!--<div class="mdui-clearfix">-->
                    <div class="mdui-float-right">
                        <div class="mdui-row mdui-row-gapless">
                            <input type="submit"
                                class="mdui-btn mdui-btn-raised mdui-color-deep-purple-accent border-comm-3" id="Post"
                                value=" 发 射 ! " />
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
<br />
<div class="mdui-chip shadow-A1" style="background-color: #ececec;">
    <span class="mdui-chip-icon"><i class="mdui-icon material-icons">assessment</i></span>
    <span class="mdui-chip-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>
</div>

<?php $comments->listComments(); ?>

<?php $comments->pageNav(
			'<i class="mdui-icon material-icons">arrow_forward</i>',
			'<i class="mdui-icon material-icons">arrow_back</i>',
			10, '',
			array('wrapTag' => 'div', 'wrapClass' => 'pagination', 'itemTag' => '', 'currentClass' => 'page-number',)
	); ?>

<?php endif; ?>


</div>


<?php function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		}
		else {
			$commentClass .= ' comment-by-user';
		}
	}
	
	$commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
	
	$host = 'https://gravatar.loli.net';
	$url = '/avatar/';
	$rating = Helper::options()->commentsAvatarRating;
	$hash = md5(strtolower($comments->mail));
	$email = strtolower($comments->mail);
	$qq = str_replace('@qq.com', '', $email);
	if (strstr($email, "qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4) {
		$avatar = '//q3.qlogo.cn/g?b=qq&nk=' . $qq . '&s=100';
	}
	else {
		$avatar = $host . $url . $hash . '?s=50' . '&r=' . $rating . '&d=mm';
	}
	?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
		if ($comments->levels > 0) {
			echo ' comment-child';
			$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
		}
		else {
			echo ' comment-parent';
		}
		$comments->alt(' comment-odd', ' comment-even');
		echo $commentClass;
	?>">

    <div class="mdui-card fillet-A1 shadow-A1 button-ts" id="<?php $comments->theId(); ?>">
        <div class="mdui-card-header mdui-color-grey-50">
            <a href="<?php $comments->permalink(); ?>">
                <img class="mdui-card-header-avatar" src="<?php echo $avatar ?>" />
            </a>
            <div class="mdui-card-header-title mdui-text-truncate"><?php $comments->author(); ?></div>
            <div class="mdui-card-header-subtitle"><?php $comments->date('Y-m-d H:i'); ?></div>
            <div class="mdui-card-menu">
                <button class="mdui-btn mdui-btn-icon mdui-float-right" mdui-tooltip="{content: '<?php echo getBrowser($comments->agent); ?> <?php echo getOs(
									$comments->agent
							); ?>'}">
                    <i class="mdui-icon material-icons">settings_system_daydream</i></button>
            </div>
        </div>
        <div class="mdui-divider"></div>
        <?php $identity = mt_rand() + mt_rand() + mt_rand() + mt_rand(); ?>
        <div class="mdui-card-content" id="<?php echo $identity; ?>"><?php $comments->content(); ?></div>

        <div class="mdui-card-actions" style="padding: 0px;">
            <div class="mdui-float-right">
                <div class="mdui-row mdui-row-gapless">
                    <span class="comment-reply cp-<?php $comments->theId(
						); ?> text-muted comment-reply-link"><?php $comments->reply(
									'<button class="mdui-btn mdui-btn-raised border-comm-3 shadow-A1" style="margin-right: -12px; background-color: rgb(236 236 236);">回复</button>'
							); ?></span><span id="cancel-comment-reply" class="cancel-comment-reply cl-<?php $comments->theId(
								); ?> text-muted comment-reply-link" style="display:none"><?php $comments->cancelReply(
									'<button class="mdui-btn mdui-btn-raised border-comm-3 shadow-A1" style="margin-right: -12px; background-color: rgb(236 236 236);">取消</button>'
							); ?></span>
                </div>
            </div>



        </div>
    </div>
    <br />


    <?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
    <?php } ?>
</li>
<?php } ?>