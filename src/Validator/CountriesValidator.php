<?php

namespace App\Validator;

use App\Repository\MissionsRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CountriesValidator extends ConstraintValidator
{
    private $missionsRepository;
    
    public function __construct(MissionsRepository $missionsRepository)
    {
        $this->missionsRepository = $missionsRepository;
    }
    
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\Countries */

        $missionsCountry = $this->missionsRepository->getCountry();
        $agentsCountry = $this->agentsRepository->getCountry();

        if (null === $value || '' === $value) {
            return;
        }

        // TODO: implement the validation here
        $this->context->buildViolation($constraint->message)
            //->setParameter('{{ value }}', $value)
            ->addViolation();
    }
}
