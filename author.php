<?php get_header();
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<div class="content-wrap">
	<div class="content">
		<header class="archive-header">
			<h1><?php echo $curauth->display_name.'的文章' ?></h1>
			<?php if ( $curauth->description ) echo '<div class="archive-header-info">'.$curauth->description.'</div>'; ?>
		</header>
<<<<<<< HEAD
		<?php if (git_get_option('git_card_b'))
		{
		include 'modules/card.php';
		}else{
		include 'modules/excerpt.php';
		}?>
=======

		<?php include( 'modules/excerpt.php' ); ?>
>>>>>>> 8139b7357cac83572df28d58c3f7a41e55da56bb
	</div>
</div>
<?php if(!G_is_mobile() ){?>
<?php get_sidebar();?>
<?php }?>
<?php get_footer(); ?>
