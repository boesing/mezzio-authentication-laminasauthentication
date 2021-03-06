<?php

/**
 * @see       https://github.com/mezzio/mezzio-authentication-laminasauthentication for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-authentication-laminasauthentication/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-authentication-laminasauthentication/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mezzio\Authentication\LaminasAuthentication;

class ConfigProvider
{
    public function __invoke() : array
    {
        return [
            'authentication' => $this->getAuthenticationConfig(),
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getAuthenticationConfig() : array
    {
        return [
            'redirect' => '', // URL to which to redirect for invalid credentials
        ];
    }

    public function getDependencies() : array
    {
        return [
            // Legacy Zend Framework aliases
            'aliases' => [
                \Zend\Expressive\Authentication\ZendAuthentication\ZendAuthentication::class => LaminasAuthentication::class,
            ],
            'factories' => [
                LaminasAuthentication::class => LaminasAuthenticationFactory::class,
            ],
        ];
    }
}
