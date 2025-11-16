<?php /* Template Name: Sitemap Template */ ?>

<?php 
get_header();
?>
<div class="codelicious-sitemap" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/pattern.png')"> 
<?php
echo the_content();
?>

</div> 
<?php
get_footer(); ?> 