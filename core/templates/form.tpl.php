<form <?php print html_attr($data['attr'] ?? []); ?>>

    <!--Field generation start-->
    <?php foreach ($data['fields'] ?? [] as $field_id => $field) : ?>
        <div>
            <?php if (isset($field['label'])) : ?>
                <label><?php print $field['label']; ?></label>
            <?php endif; ?>

            <?php if ($field['type'] == 'textarea') : ?>

                <textarea <?php print input_attr($field_id, $field) ?>></textarea>

            <?php else : ?>

                <!--Input tag generation-->
                <input <?php print input_attr($field_id, $field) ?>>

            <?php endif; ?>

            <!-- Field error generation-->
            <?php if (isset($field['error'])) : ?>
                <div class="error"><?php print $field['error']; ?></div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <!--Field generation end-->

    <!--Button generation start-->
    <?php foreach ($data['buttons'] ?? [] as $button_id => $button) : ?>
        <button <?php print button_attr($button_id, $button) ?>>
            <?php print $button['title']; ?>
        </button>
    <?php endforeach; ?>
    <!--Button generation end-->

    <?php if (isset($data['message'])) : ?>
        <div class="message"><?php print $data['message']; ?></div>
    <?php endif; ?>

</form>