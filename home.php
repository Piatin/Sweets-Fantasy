<!DOCTYPE html>
<html lang ="ja">
<head>
	<title>Sweets Fantasy</title>
	<meta charset ="utf-8">
	<meta name="viewport" content="width=divice-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel ="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.16.0/build/cssreset/cssreset-min.css">
	<link rel ="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style3.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	

<script type="text/javascript">
$(function(){
	$('#loopslider').each(function(){
		var loopsliderWidth = $(this).width();
		var loopsliderHeight = $(this).height();
		$(this).children('ul').wrapAll('<div id="loopslider_wrap"></div>');

		var listWidth = $('#loopslider_wrap').children('ul').children('li').width();
		var listCount = $('#loopslider_wrap').children('ul').children('li').length;

		var loopWidth = (listWidth)*(listCount);

		$('#loopslider_wrap').css({
			top: '0',
			left: '0',
			width: ((loopWidth) * 2),
			height: (loopsliderHeight),
			overflow: 'hidden',
			position: 'absolute'
		});

		$('#loopslider_wrap ul').css({
			width: (loopWidth)
		});
		loopsliderPosition();

		function loopsliderPosition(){
			$('#loopslider_wrap').css({left:'0'});
			$('#loopslider_wrap').stop().animate({left:'-' + (loopWidth) + 'px'},43000,'linear');
			setTimeout(function(){
				loopsliderPosition();
			},43000);
		};

		$('#loopslider_wrap ul').clone().appendTo('#loopslider_wrap');
	});
});
</script>


<?php wp_head(); ?>
</head>


<body>

<div id="container">
	<header>
		<nav id="mainNav">
			<ul id="nav">
				<li><a href="#test"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_home.png"></a></li><!--↓でhにつけたidを#~で追加する-->
				<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_diary.png"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_contact.png"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_rss.png"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_cube.png"></a></li>
				<li><a href="http://www.twitter.com"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_twitter.png"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/icon_fb.png"></a></li>

			</ul>
		</nav>
		<div id="top-image"></div>
	</header> 

	<div class ="main">
	<figure><div id="page_top2"></div></figure>
	<article>
		<h1>ブログ</h1>
		<p>aaaaa</p>
		<div id="slideshow"></div>
		<a id="link1" href="index.html"></a>
	</article>
	
	<figure><div id="page_top"></div></figure>
	<article>
<?php query_posts('showposts=5');?>
<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php
endwhile; // 繰り返し処理終了
else : ?>
<div class="post">
<h2>記事はありません</h2>
<p>お探しの記事は見つかりませんでした。</p>
</article>
</div>
<?php endif; ?>
</div>



</div>

<?php get_sidebar(); ?>


<footer>
	<a href="#">(C)2012-My New Portfolio Site</a>

</footer>
	<?php wp_footer(); ?>

</body>
</html>