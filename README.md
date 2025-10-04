# Rector for HeyFrame

This project extends Rector with multiple Rules for HeyFrame specific. 

See available [HeyFrame rules](/docs/rector_rules_overview.md)


## Install

Make sure to install both `frosh/heyframe-rector` as well as `rector/rector`.

```bash
composer req frosh/heyframe-rector --dev
```

## Use Sets

To add a set to your config, use `HeyFrame\Rector\Set\HeyFrameSetList` class and pick one of constants:

```php
use HeyFrame\Rector\Set\HeyFrameSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        HeyFrameSetList::HEYFRAME_6_7_0,
    ]);
};
```

## Use directly the config

```bash
# Clone this repo

composer install

# Dry Run
./vendor/bin/rector process --config config/heyframe-6.7.0.php --autoload-file [HEYFRAME]/vendor/autoload.php [HEYFRAME]/custom/plugins/MyPlugin --dry-run

# Normal Run
./vendor/bin/rector process --config config/heyframe-6.7.0.php --autoload-file [HEYFRAME]/vendor/autoload.php [HEYFRAME]/custom/plugins/MyPlugin
```
