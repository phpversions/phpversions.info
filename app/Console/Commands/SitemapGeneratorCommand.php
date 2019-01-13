<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\SitemapService;
use Illuminate\Console\Command;

class SitemapGeneratorCommand extends Command
{
    private const PATH = __DIR__ . '/../../../public/sitemap.xml';

    /** @var SitemapService */
    private $sitemapService;

    protected $signature = 'phpversions:sitemap';

    protected $description = 'Generate Sitemap for PhpVersions';

    public function __construct(SitemapService $sitemapService)
    {
        parent::__construct();

        $this->sitemapService = $sitemapService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $this->info('Writing sitemap for https://phpversions.org');

        $this->sitemapService->writeSitemap(self::PATH);

        $this->info('Sitemap was generated and written to public/sitemap.xml');
    }
}
