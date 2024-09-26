<?php

namespace App\Markdown;

use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use Torchlight\Commonmark\V2\TorchlightExtension;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;

/**
 * Converts GitHub Flavored Markdown to HTML.
 */
class GithubFlavoredMarkdownConverter extends MarkdownConverter
{
    /**
     * Create a new Markdown converter pre-configured for GFM
     *
     * @param  array<string, mixed>  $config
     */
    public function __construct(array $config = [])
    {
        $config['heading_permalink'] = [
            'html_class' => 'heading-permalink',
            'id_prefix' => 'content',
            'apply_id_to_heading' => false,
            'heading_class' => '',
            'fragment_prefix' => 'content',
            'insert' => 'before',
            'min_heading_level' => 1,
            'max_heading_level' => 3,
            'title' => 'Permalink',
            'symbol' => '',
            'aria_hidden' => true,
        ];
        $config['table_of_contents'] = [
            'html_class' => 'table-of-contents',
            'position' => 'placeholder',
            'style' => 'bullet',
            'min_heading_level' => 2,
            'max_heading_level' => 3,
            'normalize' => 'relative',
            'placeholder' => '[TOC]',
        ];

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new TorchlightExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new TableOfContentsExtension());
        $environment->addExtension(new FrontMatterExtension());

        parent::__construct($environment);
    }

    public function getEnvironment(): EnvironmentInterface
    {
        \assert($this->environment instanceof EnvironmentInterface);

        return $this->environment;
    }
}
