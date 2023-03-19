<?php
function horizonsPagination()
{
    global $paged; // current page 
    if (empty($paged)) $paged = 1; // paged is empty on the first page 
    global $wp_query;
    $pages = $wp_query->max_num_pages; // number of all pages 

    if (!$pages) $pages = 1;

    if ($pages != 1) {
        echo '<div class="row">';
        echo '<div class="col-md-12 text-center">';
        echo '<ul class="blog-pagination-wrap align-center mb-30 mt-30">';
        if ($paged > 1) echo '<li><a href="' . get_pagenum_link($paged - 1) . '"><i class="ti-angle-left"></i></a></li>';

        for ($page = 1; $page <= $pages; $page++) {
            if ($page == $paged) {
                echo '<li><a href="' . get_pagenum_link($page) . '" class="active">' . $page . '</a></li>';
            } else {
                echo '<li><a href="' . get_pagenum_link($page) . '">' . $page . '</a></li>';
            }
        }

        if ($paged < $pages) echo '<li><a href="' . get_pagenum_link($paged + 1) . '"><i class="ti-angle-right"></i></a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * Display the HORIZONS banner.
 *
 * @param string $id the page id.
 * @param array $args an array of arguments if fields are empty.
 *
 * @return string The HTML for the banner section.
 */
function pageBanner($id, $args = NULL)
{

    if (empty($args['small_title'])) {
        if (get_field('pb_small_title', $id) && !is_archive()) {
            $args['small_title'] = get_field('pb_small_title', $id);
        } else {
            $args['small_title'] = ' ';
        }
    }
    if (empty($args['big_title'])) {
        if (get_field('pb_big_title', $id) && !is_archive()) {
            $args['big_title'] = get_field('pb_big_title', $id);
        } else {
            $args['big_title'] = get_the_title();
        }
    }
    if (empty($args['banner_img'])) {
        if (get_field('pb_image', $id) && !is_archive()) {
            $args['banner_img'] = get_field('pb_image', $id)['sizes']['PageBanner'];
        } else {
            $args['banner_img'] = get_theme_file_uri('/img/slider/3.jpg');
        }
    }
?>
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="6" data-background="<?php echo $args['banner_img'] ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <?php if (is_singular('post')) {
                    ?>
                        <h5><a href="<?php echo site_url('blog') ?>">Blog</a> / <?php the_title() ?></h5>
                    <?php
                    } else { ?>
                        <h5><?php echo $args['small_title'] ?></h5>
                    <?php
                    }
                    if (is_singular('post')) {
                    ?>
                        <h1><?php echo $args['big_title'] ?></h1>
                    <?php
                    } else {
                        list($firstPart, $lastWord) = highlight_the_text($args['big_title']);
                    ?>
                        <h1><?php echo $firstPart ?><span><?php echo $lastWord ?></span></h1> <!--  span to highlight the word -->
                    <?php }
                    if (is_singular('post')) {
                        $author_email = get_the_author_meta('email');
                        $author_image = get_avatar($author_email, 27, '', 'avatar');
                    ?>
                        <div class="post">
                            <div class="author">
                                <?php echo $author_image ?>
                                <!-- <img src="img/team/06.png" alt="" class="avatar">  -->
                                <span><?php the_author_posts_link() ?></span>
                            </div>
                            <div class="date-comment"> <i class="ti-calendar"></i>
                                <?php the_time('d M Y') ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}


/**
 * Separate the last word from the string.
 *
 * @param string $the_text the text you want to seperate the last word from.
 * 
 *
 * @return array return two values the first part of the string and last word .
 */
function highlight_the_text($the_text, $hollow = 'last')
{
    $title = $the_text;
    $pieces = explode(' ', $title);
    switch ($hollow) {
        case 'last':
            $lastPart = array_pop($pieces); // to return
            $nbChar = strlen($title) - strlen($lastPart);
            $firstPart = substr($title, 0, $nbChar); // to return
            break;
        case 'first':
            $firstPart = reset($pieces);
            $titleFirstWordCount = strlen($firstPart);
            $titleNbChar = strlen($title);
            $lastPart = substr($title, $titleFirstWordCount, $titleNbChar);
            break;
    }
    return array($firstPart, $lastPart);
}

/**
 * Separate the last word from the string.
 *
 * @param string $textAreaField the text field you want to wrap.
 * 
 * @param string $icon the icon before every line.
 * 
 *
 * @return array return the text field wrapped line after every comma.
 */
function wrap_textField($textAreaField, $icon)
{
    $formatted_value = '';
    $lines = explode(',', $textAreaField);

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line != '') {
            $formatted_value .= '<li><i class="' . $icon . '"></i>' . $line . '</li>';
        }
    }
    return $formatted_value;
}
