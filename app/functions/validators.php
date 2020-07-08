<?php

use App\App;

/**
 * Validate field is unique
 * 
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_unique(array $form_values, array &$form, array $params): bool
{
    $unique_field = $params['field'];
    $users = App::$db->getRowsWhere('users', []);

    foreach ($users as $user) {
        if ($form_values[$unique_field] === $user['email']) {
            $form['fields'][$unique_field]['error'] = 'Field is not unique';
            return false;
        }
    }

    return true;
}
