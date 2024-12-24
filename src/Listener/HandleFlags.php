<?php

namespace huseyinfiliz\flagify\Listener;

use Flarum\Flags\Event\Created;
use Flarum\Flags\Event\Deleting;
use Flarum\Flags\Flag;

class HandleFlags
{
    public function handle($event)
    {
        $post = $event->flag->post;

        if ($post) {
            // Mevcut flag sayısını hesapla
            $flagCount = Flag::where('post_id', $post->id)->count();

            // Eğer `Deleting` olayı ise, silinecek flag'i hesaba katmadan önce flag sayısını azaltın
            if ($event instanceof Deleting) {
                $flagCount -= 1;
            }

            // Threshold değerini al
            $threshold = resolve('flarum.settings')->get('huseyinfiliz.flagify.threshold', 2);

            // Eşik kontrolü
            $post->is_approved = $flagCount < $threshold;
            $post->save();
        }
    }
}
