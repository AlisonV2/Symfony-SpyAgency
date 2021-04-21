<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Target({"PROPERTY", "ANNOTATION"})
 */
class Countries extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'The targets and contacts should be of the same country as the mission\'s. The agents cannot be of the same country as the mission\'s.';
}