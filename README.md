# Magento 2 Debug Helper

## Information and Usage

<a href="https://shkoliar.com/articles/magento-2-debug-helper-module-usage-with-phpstorm-and-xdebug/" target="_blank">Magento 2 Debug Helper Module usage with PHPStorm and Xdebug</a>

## Installation

To install the Magento 2 Debug Helper module, simply run the command below

```bash
composer require --dev shkoliar/magento-debug-helper
```

Then enable the module

```bash
bin/magento module:enable Shkoliar_DebugHelper
```

Another few extra commands to ensure that the module is properly registered and classes are generated.

```bash
bin/magento setup:upgrade
bin/magento setup:di:compile
```