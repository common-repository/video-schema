<?php
/*
Plugin Name: Video Schema
Plugin URI:  https://iamrizwan.com
Description: Video Rich Snippet Generator for schema.org Markup. Microdata can help searchengines better understand the content on your website With This Plugin.
Version:     1.1
Author:      Muhammad Rizwan
Author URI:  https://iamrizwan.com
*/

add_action( 'wp_head', 'video_schema_tags' );
function video_schema_tags() {
  if( is_single() ) {
  ?>
<?php $description = wp_trim_words( get_post_field('post_content', $post_id), 25 );?>
<div itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
<meta itemprop="name" content="<?php the_title(); ?>" />
<meta itemprop="description" content="<?php echo wp_html_excerpt( $description , 320 ) ?>" />
<link itemprop="thumbnailUrl" href="<?php the_post_thumbnail_url(); ?>" />
<meta itemprop="embedUrl" content="https://www.youtube.com/embed/<?php the_ID(); ?>" />
<meta itemprop="playerType" content="HTML5 Flash">
<meta itemprop="width" content="1280">
<meta itemprop="height" content="720">
<meta itemprop="uploadDate" content="<?php the_time('Y-m-d\TG:i:s+00:00') ?>" />
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
<link itemprop="thumbnailUrl" href="<?php the_post_thumbnail_url(); ?>" />
<meta itemprop="width" content="1280" />
<meta itemprop="height" content="720" /></span></div>
  <?php
  }
}