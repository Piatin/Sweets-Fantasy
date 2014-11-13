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



</head>


<body class=" customize-support">

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


<?php get_sidebar(); ?>

<div id ="main">
	<figure><div id="page_top2"></div></figure>
	
</div>

	<!-- main -->
      <div id="main">


	<!-- ▼表示する記事がある場合、ループ開始▼ -->
<!--
■if( have_posts() ) 
該当ページで表示する記事があるかどうかを判断している。
記事があった場合、if内の処理を実行する。
■have_post()
ワードプレスの条件分岐テンプレタグ。条件式に使用する。
もし記事がある場合、trueを返す。
■while( have_posts() ) 
該当ページで表示する記事があるかどうかを判断している。
phpのループ構文while文。条件式がtrueの間、処理を繰り返す。
■the_post();
現在の記事番号の取得と、カウンターの増減をするテンプレタグ。
while文のループ内で記述する$i++;のような変数の増減と同じ。
ループ内の処理の一番最初に記述する点に注意。
これがないと現在の記事番号が変化しないため、ループから抜け出せれない。
-->
<?php
if(have_posts()) :
while(have_posts()) :
the_post(); ?>

<!--
■the_permalink();
該当記事のURLを出力してくれるテンプレタグ
■the_title();
該当記事のタイトルを出力してくれるテンプレタグ
-->
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p>

<!--
■the_content();
該当記事の本文を出力してくれるテンプレタグ
()内の引数は、記事入力内でmoreを使用した際に表示させる文。
なので、moreを使わなかった場合、表示されない。
-->
	<?php the_content('続きを読む &rarr;'); ?>

	<br clear="all" />
	</p>


	<div class="meta">
<!--
■the_date();
該当記事の投稿日を出力してくれるテンプレタグ
-->
	投稿日: <?php the_date(); ?><br />

<!--
■the_category();
該当記事が所属するカテゴリー名とリンクを出力してくれるテンプレタグ
()内の引数は、カテゴリーを出力した後の区切り文字を指定出来る。
■the_tags();
該当記事が所属するタグ名とリンクを出力してくれるテンプレタグ
()内の引数は the_tags('前', '区切り文字', '後'); という形で使用可能。
引数は省略出来るので、今回は第2引数まで入力をしている。
the_tags('タグ: ',' ');
■the_author_posts_link();
該当記事の投稿者名とリンクを出力するテンプレタグ
-->
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
<!--
■$wp_query->max_num_pages
総ページ数を取得する。
■if文の条件式の内容
総ページ数が1より多い場合、ページャーを表示する。
-->

<?php if ( $wp_query -> max_num_pages > 1 ) : ?>
<div style="width:100%">
	<div style="float:left">
<!--
■previous_posts_link('&laquo;次ページ');
previous_posts_link();の引数でリンクする文字を決めている。
-->
	<?php previous_posts_link('&laquo;前ページ'); ?>
	</div>

	<div style="float:right">
<!--
■next_posts_link('&laquo;次ページ');
next_posts_link();の引数でリンクする文字を決めている。
-->
	<?php next_posts_link('次ページ&raquo;'); ?>
	</div>
</div>
<?php endif; ?>
	<!-- ▲もし記事が表示数より多い場合、ページャーを表示する▲ -->


<!-- ▼ここにコメントの入力欄を記述する -->


      </div>

<div id ="main">
	<figure><div id="page_top"></div></figure>
	<!-- /main -->



<footer>
	<a href="#">(C)2012-My New Portfolio Site</a>
</footer>

</body>
</html>