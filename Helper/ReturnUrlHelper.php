<?php

namespace Jhg\ReturnUrlBundle\Helper;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class ReturnUrlHelper
 */
class ReturnUrlHelper
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * ReturnUrlHelper constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @return null|Request
     */
    private function getRequest(): ?Request
    {
        return $this->requestStack->getCurrentRequest();
    }

    /**
     * @return string
     */
    public function current(): string
    {
        return $this->getRequest() ? $this->getRequest()->getRequestUri() : '';
    }

    /**
     * @return string
     */
    public function current64(): string
    {
        return base64_encode($this->current());
    }

    /**
     * @param string $default
     *
     * @return string
     */
    public function last(string $default = '/'): string
    {
        if ($this->getRequest() && $ru = $this->getRequest()->get('ru')) {
            return base64_decode($ru);
        } else {
            return $default;
        }
    }

    /**
     * @param string $default
     *
     * @return string
     */
    public function last64(string $default = ''): string
    {
        if ($this->getRequest() && $ru = $this->getRequest()->get('ru')) {
            return $ru;
        } else {
            return base64_encode($default);
        }
    }
}