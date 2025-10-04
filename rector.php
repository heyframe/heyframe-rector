<?php

declare(strict_types=1);

use HeyFrame\Rector\Set\HeyFrameSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        HeyFrameSetList::HEYFRAME_6_5_0,
        HeyFrameSetList::HEYFRAME_6_6_0,
        HeyFrameSetList::HEYFRAME_6_6_4,
        HeyFrameSetList::HEYFRAME_6_6_10,
        HeyFrameSetList::HEYFRAME_6_7_0,
    ]);
};
