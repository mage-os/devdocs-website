<?php

namespace App\Http\Controllers;

use App\Documentation;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
    public const DEFAULT_META_TITLE = 'Mage-OS - Community driven eCommerce';
    public const DEFAULT_META_DESCRIPTION = 'The Mage-OS Association is a non-profit association Formed by people within the Magento community to represent and further the interests of that community as a whole: Merchants, developers, agencies, and all of the many people supporting and supported by this ecosystem.';
    const DEFAULT_META_KEYWORDS = 'Mage-OS DevDocs, Magento Documentation, Magento DevDocs, developer documentation';

    /**
     * The documentation repository.
     *
     * @var \App\Documentation
     */
    protected $docs;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Documentation  $docs
     * @return void
     */
    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    /**
     * Show the root documentation page (/docs).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showRootPage()
    {
        return redirect('docs/'.DEFAULT_VERSION);
    }

    /**
     * Show the documentation index JSON representation.
     *
     * @param  string  $version
     * @param  \App\Documentation  $docs
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function index($version, Documentation $docs)
    {
        $major = Str::before($version, '.');

        if (Str::before(array_values(Documentation::getDocVersions())[1], '.') + 1 === (int) $major) {
            $version = $major = 'main';
        }

        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/index.json', 301);
        }

        if ($major !== 'main' && $major < 9) {
            return [];
        }

        return response()->json($docs->indexArray($version));
    }

    /**
     * Show a documentation page.
     *
     * @param  string  $version
     * @param  string|null  $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($version, $page = null)
    {
        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version, 301);
        }

        if (! defined('CURRENT_VERSION')) {
            define('CURRENT_VERSION', $version);
        }

        $sectionPage = $page ?: 'installation-guide';
        $docPage = $this->docs->get($version, $sectionPage);
        $content = $docPage['content'];
        $pageCustomData = $docPage['frontendMatter'];
        $metaDescription = $pageCustomData['description'] ?? self::DEFAULT_META_DESCRIPTION;
        $metaKeywords = $pageCustomData['keywords'] ?? self::DEFAULT_META_KEYWORDS;
        $communityNote = $pageCustomData['communityNote'] ?? true;

        if (is_null($content)) {
            $otherVersions = $this->docs->versionsContainingPage($page);

            return response()->view('docs', [
                'title' => 'Page not found',
                'index' => $this->docs->getIndex($version),
                'content' => view('docs-missing', [
                    'otherVersions' => $otherVersions,
                    'page' => $page,
                ]),
                'currentVersion' => $version,
                'versions' => Documentation::getDocVersions(),
                'currentSection' => $otherVersions->isEmpty() ? '' : '/'.$page,
                'canonical' => null,
            ], 404);
        }

        $title = (new Crawler($content))->filterXPath('//h1');

        $section = '';

        if ($this->docs->sectionExists($version, $page)) {
            $section .= '/'.$page;
        } elseif (! is_null($page)) {
            return redirect('/docs/'.$version);
        }

        $canonical = null;

        if ($this->docs->sectionExists(DEFAULT_VERSION, $sectionPage)) {
            $canonical = 'docs/'.DEFAULT_VERSION.'/'.$sectionPage;
        }

        return view('docs', [
            'title' => count($title) ? $title->text() : self::DEFAULT_META_TITLE,
            'index' => $this->docs->getIndex($version),
            'content' => $content,
            'currentVersion' => $version,
            'versions' => Documentation::getDocVersions(),
            'currentSection' => $section,
            'canonical' => $canonical,
            'edit_link' => $this->docs->getEditUrl($version, $sectionPage),
            'metaTitle' => count($title) ? $title->text() : self::DEFAULT_META_TITLE,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
            'communityNote' => $communityNote,
        ]);
    }

    /**
     * Determine if the given URL segment is a valid version.
     *
     * @param  string  $version
     * @return bool
     */
    protected function isVersion($version)
    {
        return array_key_exists($version, Documentation::getDocVersions());
    }
}
