<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use App\Markdown\GithubFlavoredMarkdownConverter;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Cache\Repository as Cache;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;

class Documentation
{
    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The cache implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new documentation instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @return void
     */
    public function __construct(Filesystem $files, Cache $cache)
    {
        $this->files = $files;
        $this->cache = $cache;
    }

    /**
     * Get the documentation index page.
     *
     * @param  string  $version
     * @return string|null
     */
    public function getIndex($version)
    {
        return $this->cache->remember('docs.'.$version.'.index', 5, function () use ($version) {
            $path = base_path('resources/docs/'.$version.'/documentation.md');

            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, (new GithubFlavoredMarkdownConverter())->convert($this->files->get($path)));
            }

            return null;
        });
    }

    /**
     * Get the URL to edit the documentation.
     *
     * @param  string  $version
     * @param  string  $page
     * @return string
     */
    public function getEditUrl($version, $page)
    {
        $baseEditUrl = 'https://github.com/mage-os/devdocs/edit/';

        // Assuming page paths correspond with file paths in the repository,
        // and that all files are .md (Markdown) files.
        return "{$baseEditUrl}/{$version}/{$page}.md";
    }


    /**
     * Get the given documentation page.
     *
     * @param  string  $version
     * @param  string  $page
     * @return array|null
     */
    public function get($version, $page)
    {

        return $this->cache->remember('docs.'.$version.'.'.$page, 5, function () use ($version, $page) {
            $path = base_path('resources/docs/'.$version.'/'.$page.'.md');

            if ($this->files->exists($path)) {
                $content = $this->files->get($path);

                $content = (new GithubFlavoredMarkdownConverter())->convert($content);
                $frontendMatter = [];
                if ($content instanceof RenderedContentWithFrontMatter) {
                    $frontendMatter = $content->getFrontMatter();
                }

                return [
                    'content' => $this->replaceLinks($version, $content),
                    'frontendMatter' => $frontendMatter,
                ];
            }

            return null;
        });
    }

    /**
     * Get the array based index representation of the documentation.
     *
     * @param  string  $version
     * @return array
     */
    public function indexArray($version)
    {
        return $this->cache->remember('docs.{'.$version.'}.index', CarbonInterval::hour(1), function () use ($version) {
            $path = base_path('resources/docs/'.$version.'/documentation.md');

            if (! $this->files->exists($path)) {
                return [];
            }

            return [
                'pages' => collect(explode(PHP_EOL, $this->replaceLinks($version, $this->files->get($path))))
                    ->filter(fn ($line) => Str::contains($line, '/docs/{{version}}/'))
                    ->map(fn ($line) => resource_path(Str::of($line)->afterLast('(/')->before(')')->replace('{{version}}', $version)->append('.md')))
                    ->filter(fn ($path) => $this->files->exists($path))
                    ->mapWithKeys(function ($path) {
                        $contents = $this->files->get($path);

                        preg_match('/\# (?<title>[^\\n]+)/', $contents, $page);
                        preg_match_all('/<a name="(?<fragments>[^"]+)"><\\/a>\n#+ (?<titles>[^\\n]+)/', $contents, $section);

                        return [
                            (string) Str::of($path)->afterLast('/')->before('.md') => [
                                'title' => $page['title'],
                                'sections' => collect($section['fragments'])
                                    ->combine($section['titles'])
                                    ->map(fn ($title) => ['title' => $title])
                            ],
                        ];
                    }),
            ];
        });
    }

    /**
     * Replace the version place-holder in links.
     *
     * @param  string  $version
     * @param  string  $content
     * @return string
     */
    public static function replaceLinks($version, $content)
    {
        return str_replace('%7B%7Bversion%7D%7D', $version, $content);
    }

    /**
     * Check if the given section exists.
     *
     * @param  string  $version
     * @param  string  $page
     * @return boolean
     */
    public function sectionExists($version, $page)
    {
        return $this->files->exists(
            base_path('resources/docs/'.$version.'/'.$page.'.md')
        );
    }

    /**
     * Determine which versions a page exists in.
     *
     * @param  string  $page
     * @return \Illuminate\Support\Collection
     */
    public function versionsContainingPage($page)
    {
        return collect(static::getDocVersions())
            ->filter(function ($version) use ($page) {
                return $this->sectionExists($version, $page);
            });
    }

    /**
     * Get the publicly available versions of the documentation
     *
     * @return array
     */
    public static function getDocVersions()
    {
        return [
            'main' => 'Main',
            'develop' => 'Develop',
            '2.4.5' => '2.4.5',
        ];
    }
}
