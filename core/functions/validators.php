<?php

use App\App;
use App\Users\Model;

/**
 *checking field is not empty
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_not_empty($field_value, &$field): bool
{
    if (!$field_value) {
        $field['error'] = 'Field must be filled';
        return false;
    }

    return true;
}

/**
 * checking entered value is numeric
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_numeric($field_value, &$field): bool
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Field must be numeric';
        return false;
    }

    return true;
}

/**
 * checking entered value is an email
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_email($field_value, &$field): bool
{
    if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        $field['error'] = 'Field must be an email';
        return false;
    }

    return true;
}

/**
 * checking entered value doesn't contain a number, symbol or space
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_contains_only_letters($field_value, &$field): bool
{
    if (preg_match('/[\W\d]/', $field_value) > 0) {
        $field['error'] = 'Field cannot contain numbers, symbols and spaces';
        return false;
    }

    return true;
}

/**
 *checking if user is logged in
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_user_logged_in($field_value, &$field): bool
{
    if (!App::$session->getUser()) {
        $field['error'] = 'You must be logged in to leave a comment';
        return false;
    }

    return true;
}

/**
 * Validate field length
 * 
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_length($field_value, array &$field, array $params): bool
{
    if (isset($params['max']) && strlen($field_value) >= $params['max']) {
        $field['error'] = "Field has to be shorter than {$params['max']} characters";
        return false;
    }

    if (isset($params['min']) && strlen($field_value) <= $params['min']) {
        $field['error'] = "Field has to be longer than {$params['min']} character";
        return false;
    }

    return true;
}

/**
 * Validate fields match
 * 
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_fields_match(array $filtered_input, array &$form, array $params): bool
{
    foreach ($params as $field_id) {
        $reference_value = $reference_value ?? $filtered_input[$field_id];

        if ($reference_value !== $filtered_input[$field_id]) {
            $form['fields'][$field_id]['error'] = 'Fields do not match';

            return false;
        }
    }

    return true;
}

/**
 * Validate login
 * 
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_login(array $filtered_input, array &$form): bool
{
    $userData = Model::getWhere(['email' => $filtered_input['email']]);

    $user = $userData[0] ?? null;

    if (!$user) {
        $form['fields']['email']['error'] = 'User does not exist';
        return false;
    }

    if (!password_verify($filtered_input['password'], $user->password)) {
        $form['fields']['password']['error'] = 'Wrong Password';
        return false;
    }

    return true;
}