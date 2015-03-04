		<?php if( dopt('d_adindex_02_b') ) printf('<div class="banner banner-sticky">'.dopt('d_adindex_02').'</div>'); ?>
<?php if(is_home()&& dopt('hot_list_check') ){ ?>
		<div><div class="left-ad" style="clear: both;background-color: #fff; width: 30%;float: left;margin-right:2%;"></div><div class="hot-posts">
			<h2 class="title"><?php echo dopt('hot_list_title') ?></h2>
			<ul><?php hot_posts_list($days=dopt('hot_list_date'), $nums=dopt('hot_list_number')); ?></ul>
		</div></div>
		<?php } ?>
<?php if (wp_is_mobile() ): ?><?php if( dopt('Mobiled_adindex_02_b') ) printf('<div class="banner-sticky">'.dopt('Mobiled_adindex_02').'</div>'); ?><?php endif ;?>
<?php
$_author = dopt('d_post_author_b');
$_time = dopt('d_post_time_b');
$_views = dopt('d_post_views_b');
$_comment = dopt('d_post_comment_b');
$_like = dopt('d_post_like_b');
?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
$_thumbnail = false;
if( has_post_thumbnail() || !dopt('d_thumbnail_b') ){
	$_thumbnail = true;
}
?>
<article class="excerpt<?php echo !$_thumbnail ? ' excerpt-nothumbnail' : '' ?>">
	<header><?php  if( !is_category() ) {$category = get_the_category();
		        if($category[0]){echo '<a class="label label-important" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'<i class="label-arrow"></i></a>';}
	        };?><h2><a target="_blank" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?>
 <?php $t1=$post->post_date;
$t2=date("Y-m-d H:i:s");
$diff=(strtotime($t2)-strtotime($t1))/3600;
if($diff<12){echo '<img src="'.get_bloginfo("template_url").'/img/new.gif" alt="24小时内最新">';}?> </a></h2>
	</header>
<?php if( $_thumbnail ){ ?>
<div class="focus"><a target="_blank" href="<?php the_permalink(); ?>">
<?php if( dopt('d_qiniucdn_b') ){
echo '<img class="thumb" src="';echo post_thumbnail_src();echo '?imageView2/1/w/200/h/123/q/85" alt="'.get_the_title().'" height="123" width="200" />';
}else{
echo '<img class="thumb" src="'.get_bloginfo("template_url").'/timthumb.php?src=';echo post_thumbnail_src();echo '&h=123&w=200&q=90&zc=1&ct=1" alt="'.get_the_title().'" height="123" width="200" />'; } ?>
</a></div>
	<?php } ?>
		<span class="note"> <?php echo deel_strimwidth(strip_tags(apply_filters('the_content', strip_shortcodes($post->post_content))), 0, 160, '……<a href="'.post_permalink().'" rel="nofollow" class="more-link">继续阅读 &raquo;</a>'); ?></span>
<p class="auth-span">
<?php if( !is_author() && !$_author ){ ?>
		<span class="muted"><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo get_the_author() ?></a></span>
	<?php } ?>
	<?php if( !$_time ){ ?><span class="muted"><i class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ) ?></span><?php } ?>
	<?php if( !$_views ){ ?><span class="muted"><i class="fa fa-eye"></i> <?php deel_views('浏览'); ?></span><?php } ?>
	<?php if( !$_comment ){ ?><span class="muted"><i class="fa fa-comments-o"></i> <?php
			if ( comments_open() ) echo '<a target="_blank" href="'.get_comments_link().'">'.get_comments_number('0', '1', '%').'评论</a>'
		?></span><?php } ?>
<?php if( !$_like ){ ?><span class="muted">
<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" id="Addlike" class="action<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' actived';?>"><i class="fa fa-heart-o"></i><span class="count"><?php if( get_post_meta($post->ID,'bigfa_ding',true) ){ echo get_post_meta($post->ID,'bigfa_ding',true); } else {echo '0';}?></span>个赞</a></span><?php } ?></p>
</article>
<?php endwhile; wp_reset_query(); ?>
<?php deel_paging(); ?>