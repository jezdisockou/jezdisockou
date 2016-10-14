<?php
/**
 * Created by PhpStorm.
 * User: balach
 * Date: 14.10.2016
 * Time: 22:36
 */

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Security\User;
use Tracy\Debugger;


class SearchFormFactory
{
    use Nette\SmartObject;

    /** @var FormFactory */
    private $factory;

    public function __construct(FormFactory $factory)
    {
        $this->factory = $factory;
    }


    /**
     * @return Form
     */
    public function create(callable $onSuccess)
    {
        $form = $this->factory->create();
        $form->addText('from', 'Odkud:')
            ->setRequired('Odkud chcete jet?');

        $form->addText('destination', 'Kam:')
            ->setRequired('Kam chcete jet?');

        $form->addText('date', 'Datum')
            ->setType('date');

        $form->addText('time', 'Čas')
            ->setType('time');

        $form->addSubmit('send', 'Vyhledat');

        $form->onSuccess[] = function (Form $form, $values) use ($onSuccess){
Debugger::dump($values);


        };
        return $form;
    }
}