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
$id = 'acf-quote-block-' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-quote-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// block preview
if ( !empty( $block['data']['__is_preview'] ) ): ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

// Load values and assing defaults.

$acf_quote_blocks = get_field('acf_blocks_quote');
?>
<section class="quote-block">
    <div class="page-container">
        <div class="quote-block__row">
            <div class="row align-items-center justify-content-center">
                <?php if ($acf_quote_blocks) : foreach ($acf_quote_blocks as $block) : ?>
                        <div class="col-lg-5">
                            <div class="quote-block__box">
                                <h3><?php echo $block['acf_quote']; ?></h3>
                                <p><?php echo $block['acf_quote_author']; ?></p>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>

            </div>
        </div>
    </div>
    <div class="border-bottom"></div>
</section>