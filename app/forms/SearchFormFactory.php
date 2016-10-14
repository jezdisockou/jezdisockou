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

        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $form->addCheckbox('remember', 'Keep me signed in');

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
            try {
                $this->user->setExpiration($values->remember ? '14 days' : '20 minutes');
                $this->user->login($values->username, $values->password);
            } catch (Nette\Security\AuthenticationException $e) {
                $form->addError('The username or password you entered is incorrect.');
                return;
            }
            $onSuccess();
        };
        return $form;
    }