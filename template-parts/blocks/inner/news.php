<?php

/**
 * Blockquote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-news-' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-news';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// block preview
if ( !empty( $block['data']['__is_preview'] ) ): ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;



// Load values and assing defaults.
$acf_news_heading = get_field('acf_news_heading');
$acf_news_block = get_field('acf_news_block');
$acf_news_block_title = get_field('acf_news_block_title');
$acf_news_block_link = get_field('acf_news_block_link');
$acf_news_block_date = get_field('acf_news_block_date');
?>


<section class="news">
    <div class="container">
        <div class="border-top"></div>
        <?php if ($acf_news_block) : foreach ($acf_news_block as $news_block) : ?>
                <div class="news__row">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php if (!empty($news_block['acf_news_block_title'])) : ?>
                                <div class="news__heading">
                                    <?php echo $news_block['acf_news_block_title']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($news_block['acf_news_block_link'])) : ?>
                            <div class="col-lg-4">
                                <div class="news__link"><a href="<?php echo $news_block['acf_news_block_link']['url']; ?>"><?php echo $news_block['acf_news_block_link']['title']; ?></a></div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($news_block['acf_news_block_date'])) : ?>
                            <div class="col-lg-4">
                                <div class="news__date"><?php echo $news_block['acf_news_block_date']; ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="border-bottom"></div>
        <?php endforeach;
        endif; ?>
    </div>
</section>