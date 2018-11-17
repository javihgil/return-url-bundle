<?php

namespace Jhg\ReturnUrlBundle\Controller\Traits;

use Jhg\ReturnUrlBundle\Helper\ReturnUrlHelper;
use Symfony\Component\HttpFoundation\RedirectResponse;

trait ReturnUrlControllerTrait
{
    protected function redirectToRuOrRoute(string $route, array $parameters = array(), int $status = 302): RedirectResponse
    {
        /** @var ReturnUrlHelper $ruHelper */
        $ruHelper = $this->container->get('jhg_ru');

        return $this->redirect($ruHelper->last($this->generateUrl($route, $parameters)), $status);
    }
}