<?php

/**
 * Display form validation field error.
 *
 * @param object $validation
 * @param string $field
 * @return mixed
 */
function display_error($validation, $field)
{
    if ($validation->hasError($field)) {
        return $validation->getError($field);
    }
    return false;
}
