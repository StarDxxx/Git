<?php
if (git_get_option('git_mobilesticky_b')) echo '<style type="text/css">@media screen and (max-width:1100px){ #wowslider-container1{display:none !important ;}}</style>'; ?>
<div id="wowslider-container1">
	<div class="ws_images"><ul>
<?php
$sticky = get_option('sticky_posts');
rsort($sticky);
query_posts(array(
    'post__in' => $sticky,
    'caller_get_posts' => 1,
    'showposts' => git_get_option('git_sticky_count') ? git_get_option('git_sticky_count') : 4
));
while (have_posts()):
    the_post();
    echo '<li><a target="_blank" href="' . get_permalink() . '" title="' . get_the_title() . '">';
    echo '<img src="';
    echo post_thumbnail_src();
    echo '" title="' . get_the_title() . '" alt="' . get_the_title() . '" /></a></li>';
endwhile;
wp_reset_query();
?>
	</ul>
</div>

<div class="ws_thumbs">
<div>
<?php
<<<<<<< HEAD
if (git_get_option('git_qncdn_b')) {
=======
if (git_get_option('git_cdnurl_b')) {
>>>>>>> 8139b7357cac83572df28d58c3f7a41e55da56bb
    $sticky = get_option('sticky_posts');
    rsort($sticky);
    query_posts(array(
        'post__in' => $sticky,
        'caller_get_posts' => 1,
        'showposts' => git_get_option('git_sticky_count') ? git_get_option('git_sticky_count') : 4
    ));
    while (have_posts()):
        the_post();
        echo '<a target="_blank" href="#" title="' . get_the_title() . '">';
        echo '<img src="';
        echo post_thumbnail_src();
<<<<<<< HEAD
        echo '?imageView2/1/w/120/h/62/q/75" alt="' . get_the_title() . '" /></a>';
=======
        echo '?imageView2/1/w/120/h/62/q/85" /></a>';
>>>>>>> 8139b7357cac83572df28d58c3f7a41e55da56bb
    endwhile;
    wp_reset_query();
} else {
    $sticky = get_option('sticky_posts');
    rsort($sticky);
    query_posts(array(
        'post__in' => $sticky,
        'caller_get_posts' => 1,
        'showposts' => git_get_option('git_sticky_count') ? git_get_option('git_sticky_count') : 4
    ));
    while (have_posts()):
        the_post();
        echo '<a target="_blank" href="#" title="' . get_the_title() . '">';
<<<<<<< HEAD
        echo '<img src="' . get_template_directory_uri() . '/timthumb.php?src=';
=======
        echo '<img src="' . get_bloginfo("template_url") . '/timthumb.php?src=';
>>>>>>> 8139b7357cac83572df28d58c3f7a41e55da56bb
        echo post_thumbnail_src();
        echo '&h=62&w=120&q=90&zc=1&ct=1" /></a>';
    endwhile;
    wp_reset_query();
}
?>
</div>
</div><div class="ws_shadow"></div>
	</div><script type="text/javascript" src="<?php
<<<<<<< HEAD
echo esc_url( get_template_directory_uri() ); ?>/assets/js/slider.js"></script>
=======
bloginfo('template_url'); ?>/js/slider.js"></script>
>>>>>>> 8139b7357cac83572df28d58c3f7a41e55da56bb
