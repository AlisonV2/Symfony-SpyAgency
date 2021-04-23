<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Target({"PROPERTY", "ANNOTATION"})
 */
class Countries extends Constraint
{

    public $message = 'The targets and contacts should be of the same country as the mission\'s. The agents cannot be of the same country as the mission\'s.';

    public $agentsCountry;
    public $targetsCountry;
    public $safeplacesCountry;
    public $contactsCountry;
    public $missionsCountry;
    
}