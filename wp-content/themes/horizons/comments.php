<?php
function custom_comment($comment, $args, $depth)
{
    $comment_author = get_comment_author();
    $comment_date = get_comment_date();
    $comment_text = get_comment_text();
?>
    <li id="comment-2" class="comment">
        <div class="comment-body">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, 100); ?>
                <h3 class="name"><?php echo $comment_author; ?></h3>
            </div>
            <div class="comment-meta"><?php echo $comment_date; ?></div>
            <p><?php echo $comment_text; ?></p>
        </div>
    </li>
<?php
}

if (have_comments()) {
?>
    <div class="row">
        <div class="col-md-12">
            <div class="clear" id="comment-list">
                <div class="comments-area" id="comments">
                    <h2 class="comments-title">Commentaires</h2>
                    <ol class="comment-list">
                        <?php wp_list_comments(array(
                            'walker' => null,
                            'max_depth' => '',
                            'style' => 'ul',
                            'reply_text' => 'reply',
                            'avatar_size' => '100',
                            'format' => 'html5',
                            'echo' => true,
                            'callback' => 'custom_comment'
                        )) ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php
} ?>
<div id="comments" class="row">
    <div class="col-md-12 item-form">
        <?php comment_form() ?>
    </div>
</div>