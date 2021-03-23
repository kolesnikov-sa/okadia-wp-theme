<?php
get_header(); ?>
<div id="main-container">
  <div id="main-content">
    <?php while (have_posts()) {
      the_post(); ?>
      <div class="page-title"><?php the_title('<h1>', '</h1>'); ?></div>
      <div class="page-content"><?php the_content(); ?></div>
    <?php } ?>
    <?php if (!have_posts()) { ?>
      <p>Записей нет.</p>
    <?php } ?>
  </div>
</div>
<?php get_footer();
?>