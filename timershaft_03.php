<?php
	/**
	 * 时间轴 (DIY模式)
模板
	 *
	 * @package custom
	 */
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('header.php');
?>
<style>
#main {
	overflow:hidden;
	height:auto;
	width:1100px;
	position:relative;
}
#next{
	width: 100px;
    height: 36px;
    border-radius: 4px;
    text-align: center;
    line-height: 36px;
    margin: 10px auto;
    color: #838383;
}
#next a{
	font-size: 14px;
	color: #737373;
	text-decoration: none;
}
#dc_line {
	width:4px;
	height:100%;
	background-color:#666666;
	position:absolute;
	top:0;
	left:50%;
	margin-left:-2px
}
.lis {
    width: 100%;
    height: 150px;
    margin-top: 10px;
    padding: 10px;
}
.spot {
	width:20px;
	height:20px;
	position:absolute;
	left:50%;
	background-color:#666666;
	border:4px solid #f6f7f8;
	border-radius:20px;
}
.item {
	width:480px;
	height:auto;
	float:left;
	background-color:#fff;
	border-radius:6px;
	padding:14px;
	position: relative;
}
.dc_g-lin {
	width:200px;
	height:4px;
	background-color:#666666;
	position:relative;
	top:12px;
	z-index:-1;
	float: right;
	right: 0px;
}
#coos .lis:nth-child(even) .item {
	float:right!important;
	background-color:#fff;
}
#coos .lis:nth-child(even) .dc_g-lin {
	float: left;
	left: 0;
}
.date{
	position: absolute;
	top: -28px;
	right: 0px;
	padding: 3px 8px 3px;
	background-color: #fff;
	color: #666;
	font-size:12px;
	border-radius: 2px;
}
#coos .lis:nth-child(even) .date{
	left: 0px;
	right: inherit;
}

.tag{
    font-size: 20px;
    color: #666;
}
.title {
	width:100%;
	font-size:16px;
	height:auto;
	margin:10px auto;
	color:#fff!important;
	font-weight:700;
}
.title a{
	color: #595555!important;
    font-size: 20px;
    text-decoration: none;
}

.now {
	background:#bc95c5!important
}

#coos .lis:nth-child(even) .ke {
	float:right;
}
.ke {
	width:50%;
	height:100%;
}

.des{
	color: #666;
}


#nav{
    margin: 0 auto;
	text-align: center;
}
#nav li a{
	text-decoration: none;
	color: #606060;
}

#nav ul{
	display: indc_line;
}

#nav ul li{
    display: indc_line;
    margin-left: 10px;
    text-decoration: none;
    width: auto;
    text-align: center;
}

@media screen and (max-width:1200px) {
	.ke {
	width:50%;
	height:100%;
}
#main {
	width:98%
}
.item,#coos .lis:nth-child(even) .item
{
	width:84%
}
.dc_g-lin {
	float:right;
	left:0;
	top:12px
}

}@media screen and (max-width:800px) {
	*{
		font-size: 14px;
	}
	#dc_line {
	left:10%
	}
	.lis {
		width:90%;
		margin-left:10%
	}
	.ke {
		width:100%
	}
	.spot {
		left:10%
	}
	.item {
		float:right;
	}
	.dc_g-lin {
		float:none;
	}
	.item,#coos .lis:nth-child(even) .item {
		width:88%;
		padding:10px;
		border-radius:2px
	}
	#coos .lis:nth-child(even) .date,.date{
		left: 0px!important;
		right: inherit!important;
	}
	.des{
		font-size: 12px;
	}
}
</style>
<div class="mdui-container-fluid" style="padding-left: 0px; padding-right: 0px;">
	<div id="body">
		<div class="container">
			<div class="row">
				<div class="mdui-container">
					<div class="page-content mdui-container">
						<div class="mdui-row-sm-1 mdui-row-md-3 mdui-row-lg-4 mdui-row-xl-5">

<div id="main">
<div id="dc_line"></div>
<div id="coos">

    <?php $this->content(); ?>

</div>
</div>


						</div>
					</div>
				</div>
				<?php $this->need('footer.php'); ?>
			</div><!-- end .row -->
		</div>
	</div><!-- end #body -->