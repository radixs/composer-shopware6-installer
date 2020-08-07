<?php

namespace ComposerShopware6Installer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ComposerShopware6Installer extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $name = !empty($package->getExtra()) && !empty($package->getExtra()['installer-name']) ?
            $package->getExtra()['installer-name'] :
            $this->correctPluginName($package->getPrettyName());

        return 'custom/plugins/'.$name;
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'shopware-platform-plugin' === $packageType;
    }

    /**
     * Convert package name into into plugin name.
     *
     * @param $name
     *
     * @return string
     */
    private function correctPluginName($name)
    {
        if (strpos($name, '/') !== false) {
            list($vendor, $name) = explode('/', $name);
        } else {
            $vendor = '';
        }

        $camelCasedName = preg_replace_callback('/(-[a-z])/', function ($matches) {
            return strtoupper($matches[0][1]);
        }, $name);

        $name = ucfirst($vendor).ucfirst($camelCasedName);

        return $name;
    }
}