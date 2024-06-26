<?php /**
 * Template version: 4.0.0
 *
 * -= 4.0.0 =-
 * - Code review
 * - Allows notes to be multiline
 *
 * -= 3.0.0 =-
 * - Initial version
 */ ?>

<?php /** @var array $note */ ?>

<?php
$id = $note['id'];
$timestamp = get_date_from_gmt($note['timestamp_gmt']);
$message = $note['message'];
$author = isset($note['author']) ? $note['author'] : '?';
if (!is_string($author)) $author = $author->user_login;
?>

<div class="cuar-payment-note cuar-js-payment-note" data-note-id="<?php echo esc_attr($note['id']); ?>">
    <em class="cuar-timestamp cuar-js-timestamp"><?php echo $timestamp; ?></em>&nbsp;&ndash;&nbsp;<strong class="cuar-author cuar-js-author"><?php echo $author; ?></strong>
    <p class="cuar-message cuar-js-message"><?php echo wpautop(esc_html($message)); ?></p>

    <div class="cuar-actions cuar-js-actions">
        <a href="#" class="cuar-remove-action cuar-js-remove-action" title="<?php esc_attr_e('Delete', 'cuar'); ?>">
            <span class="dashicons dashicons-trash"></span></a>
    </div>
</div>
