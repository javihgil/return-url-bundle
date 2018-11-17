<?php

namespace Jhg\ReturnUrlBundle\Twig;

use Jhg\ReturnUrlBundle\Helper\ReturnUrlHelper;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Class ReturnUrlExtension
 */
class ReturnUrlExtension extends AbstractExtension implements GlobalsInterface
{

    /**
     * @var ReturnUrlHelper
     */
    protected $returnUrlHelper;

    /**
     * @param ReturnUrlHelper $returnUrlHelper
     */
    public function __construct(ReturnUrlHelper $returnUrlHelper)
    {
        $this->returnUrlHelper = $returnUrlHelper;
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return array(
            'current_ru' => $this->returnUrlHelper->current(),
            'last_ru' => $this->returnUrlHelper->last(),
            'current_ru64' => $this->returnUrlHelper->current64(),
            'last_ru64' => $this->returnUrlHelper->last64(),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'return_url_extension';
    }
}