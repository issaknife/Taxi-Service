<table <?php print html_attr($data['attr'] ?? []) ?>>
    <tr>
        <?php foreach ($data['headings'] as $heading_key => $heading) : ?>
            <?php if (is_array($heading)) : ?>
                <th <?php print html_attr($heading ?? []) ?>> <?php print $heading_key; ?> </th>
            <?php else : ?>
                <th><?php print $heading ?></th>
            <?php endif ?>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($data['rows'] ?? [] as $row) : ?>
        <tr>
            <?php foreach ($row as $col) : ?>
                <td><?php print $col ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>