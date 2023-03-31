<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;">
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="mdui-container">
                    <div class="mdui-valign mdui-typo" itemprop="name headline">
                        <h1 itemprop="url" href="<?php $this->permalink() ?>" class="mdui-center">
                            <?php $this->title() ?>
                        </h1>
                    </div>
                    <br/>
                    <div class=" mdui-container page-content">
                        <?php $this->content(); ?>
                    </div>
                    <?php
                    $CommentSectionSwitch = $this->options->CommentSectionSwitch;
                    if (empty($CommentSectionSwitch || $CommentSectionSwitch == "disabled")) {

                    } else {
                        echo "<br/>";
                        $this->need('comments.php');
                    }
                    ?>
                    <br/>
                    <br/>
                </div>
                <?php #$this->need('sidebar.php'); ?>
                <?php $this->need('footer.php'); ?>
            </div><!-- end .row -->
        </div>
    </div><!-- end #body -->
