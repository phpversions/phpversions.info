<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SitemapGeneratorCommand extends Command
{
    /** @var SitemapGenerator */
    private $sitemap;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpversions:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap for PhpVersions';

    protected $path = __DIR__ . '/../../../public/sitemap.xml';

    public function __construct(SitemapGenerator $sitemap)
    {
        parent::__construct();

        $this->sitemap = $sitemap;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
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
            ->writeToFile($this->path);
    }
}
