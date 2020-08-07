<?php

namespace ComposerShopware6Installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ComposerShopware6InstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ComposerShopware6Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}