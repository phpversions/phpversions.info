<?php

declare(strict_types=1);

namespace App\Services;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class CveService
{
    public function __construct(SitemapGenerator $sitemap)
    {
        $this->sitemap = $sitemap;
    }

    public function writeSitemap(string $path) : void
    {
        $this->sitemap->create('https://phpversions.co')
            ->getSitemap()
            ->add(Url::create('/about')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1)
            )
            ->add(Url::create('/managed-hosts')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
            )
            ->add(Url::create('/shared-hosts')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
            )
            ->add(Url::create('/paas-hosts')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
            )
            ->add(Url::create('/vulnerabilities')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
            )
            ->writeToFile($path);
    }
}