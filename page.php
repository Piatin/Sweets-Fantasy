<!DOCTYPE html>
<html lang ="ja">
<head>
	<title>Sweets Fantasy</title>
	<meta charset ="utf-8">
	<meta name="viewport" content="width=divice-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel ="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.16.0/build/cssreset/cssreset-min.css">
	<link rel ="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css">
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
</div>

<div id ="main">
	<figure><div id="page_top2"></div></figure>
	<article>
		<h1>Menu</h1>
		<p>aaaaa</p>
		<div id="slideshow"></div>
	</article>
</div>


	<!-- main -->
      <div id="main">


	<!-- ▼表示する記事がある場合、ループ開始▼ -->

<?php
if(have_posts()) :
while(have_posts()) :
the_post(); ?>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p>

	<?php the_content('続きを読む &rarr;'); ?>

	<br clear="all" />
	</p>


	<div class="meta">

	投稿日: <?php the_date(); ?><br />

	カテゴリー: <?php the_category('|'); ?> <?php the_tags('タグ: ',' '); ?> | 投稿者: <?php the_author_posts_link(); ?>
	</div>

<?php endwhile; else: ?>
	<p>
	記事がない場合に表示させる文章など。

	<br clear="all" />
	</p>



<?php
endif;
?>
	<!-- ▲表示する記事がある場合、ループ開始▲ -->



	<!-- ▼もし記事が表示数より多い場合、ページャーを表示する▼ -->

<?php if ( $wp_query -> max_num_pages > 1 ) : ?>
<div style="width:100%">

	<div style="float:left">
	<?php previous_posts_link('&laquo;前ページ'); ?>
	</div>

	<div style="float:right">
	<?php next_posts_link('次ページ&raquo;'); ?>
	</div>
</div>
<?php endif; ?>
	<!-- ▲もし記事が表示数より多い場合、ページャーを表示する▲ -->


      </div>
	<!-- /main -->


<div id ="main">
	<figure><div id="page_top"></div></figure>
	<article>
		<h1>Story</h1>
		<p>aaaaa</p>
		  
	</article>
</div>

<div id ="main">
	<figure><div id="page_top"></div></figure>
	<article>
		<h1 id="test">photos</h1> <!--hタグにidつける(ページスクロール-->
		
<div id="loopslider">
    <ul>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo1.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo2.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo3.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo4.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo5.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo6.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo7.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo8.jpg"></li>
    <li><img src="<?php bloginfo('template_directory'); ?>/assets/cake/photo9.jpg"></li>
  </ul>
 </div>			

	</article>
</div>

<footer>
	<a href="#">(C)2012-My New Portfolio Site</a>
</footer>

</body>
</html>