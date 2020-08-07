# Shopware 6 plugin installer for composer.

## Installation

In your plugin do `composer require radixs/composer-shopware6-installer`.

Optionally in your plugin's composer.json add:
```json
    "extra": {
        "installer-name": "YourPluginName"
    }
```
This is important for Shopware to be able to recognize the plugin as it should have the same name as configured in it's config files.

Also make sure you plugin has this in composer.json:
```json
    "type": "shopware-platform-plugin",
```
All other types will not be recognized by shopware and this installer works only with this type.
