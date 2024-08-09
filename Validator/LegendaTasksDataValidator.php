<?php

namespace Kanboard\Plugin\LegendaTasks\Validator;

use SimpleValidator\Validator;
use SimpleValidator\Validators;
use Kanboard\Validator\BaseValidator;

class LegendaTasksDataValidator extends BaseValidator
{
    public function validate(array $values)
    {
        $v = new Validator($values, array(
            new Validators\Required('nome', t('Este campo é obrigatório')),
            new Validators\Required('color_id', t('Este campo é obrigatório')),
        ));

        return array(
            $v->execute(),
            $v->getErrors()
        );
    }
}