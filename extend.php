<?php

/*
 * This file is part of huseyinfiliz/flagify.
 *
 * Copyright (c) 2024 Huseyin Filiz.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace huseyinfiliz\flagify;

use Flarum\Extend;
use huseyinfiliz\flagify\Listener\HandleFlags;

return [
    (new Extend\Event())
        ->listen(\Flarum\Flags\Event\Created::class, HandleFlags::class)
        ->listen(\Flarum\Flags\Event\Deleting::class, HandleFlags::class),

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),

    (new Extend\Locales(__DIR__.'/locale')),

    (new Extend\Settings())
        ->serializeToForum('flagify.threshold', 'huseyinfiliz-flagify.threshold', 'intval', 2),
];
