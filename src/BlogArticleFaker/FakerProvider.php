<?php

namespace BlogArticleFaker;

use Faker\Provider\Base as FakerProviderBase;

/**
 * Class FakerProvider
 * Generates test content specifically for articles such as blog articles, news posts, etc...
 * @package BlogArticleFaker
 */
class FakerProvider extends FakerProviderBase
{
    /**
     * @var array
     */
    protected static $html;

    /**
     * @var array
     */
    protected static $markdown;

    /**
     * @var array
     */
    protected static $titles;

    /**
     * @var array
     */
    protected static $nouns;

    /**
     * @var array
     */
    protected static $verbs;

    /**
     * @var array
     */
    protected static $adjectives;

    /**
     * @var array
     */
    protected static $adverbs;

    /**
     * Returns array of formatted content for html content generation
     *
     * @return array
     */
    public function getHtmlTemplates()
    {
        if (empty(self::$html)) {
            self::$html = require_once 'templates/html.php';
        }

        return self::$html;
    }

    /**
     * Returns array of formatted titles for use in generating titles
     *
     * @return array
     */
    public function getMarkdownTemplates()
    {
        if (empty(self::$markdown)) {
            self::$markdown = require_once 'templates/markdown.php';
        }

        return self::$markdown;
    }

    /**
     * Returns array of formatted titles for use in generating titles
     *
     * @return array
     */
    public function getTitles()
    {
        if (empty(self::$titles)) {
            self::$titles = require_once 'templates/titles.php';
        }

        return self::$titles;
    }

    /**
     * Returns array of nouns
     *
     * @return string
     */
    public function getNouns()
    {
        if (empty(self::$nouns)) {
            self::$nouns = require_once 'words/nouns.php';
        }

        return self::$nouns;
    }

    /**
     * Returns array of verbs
     *
     * @return string
     */
    public function getVerbs()
    {
        if (empty(self::$verbs)) {
            self::$verbs = require_once 'words/verbs.php';
        }

        return self::$verbs;
    }

    /**
     * Returns array of adjectives
     *
     * @return string
     */
    public function getAdjectives()
    {
        if (empty(self::$adjectives)) {
            self::$adjectives = require_once 'words/adjectives.php';
        }

        return self::$adjectives;
    }

    /**
     * Returns array of adverbs
     *
     * @return string
     */
    public function getAdverbs()
    {
        if (empty(self::$adverbs)) {
            self::$adverbs = require_once 'words/adverbs.php';
        }

        return self::$adverbs;
    }

    /**
     * Returns a single random html template
     *
     * @return string
     */
    public function getHtmlTemplate()
    {
        return static::randomElement($this->getHtmlTemplates());
    }

    /**
     * Returns a single random html template
     *
     * @return string
     */
    public function getMarkdownTemplate()
    {
        return static::randomElement($this->getMarkdownTemplates());
    }

    /**
     * Returns a single random title
     *
     * @return string
     */
    public function getTitle()
    {
        return static::randomElement($this->getTitles());
    }

    /**
     * Returns a single random noun
     *
     * @return string
     */
    public function getNoun()
    {
        return static::randomElement($this->getNouns());
    }

    /**
     * Returns a single random verb
     *
     * @return string
     */
    public function getVerb()
    {
        return static::randomElement($this->getVerbs());
    }

    /**
     * Returns a single random adjective
     *
     * @return string
     */
    public function getAdjective()
    {
        return static::randomElement($this->getAdjectives());
    }

    /**
     * Returns a single random adverb
     *
     * @return string
     */
    public function getAdverb()
    {
        return static::randomElement($this->getAdverbs());
    }

    /**
     * Generates an article title using real words
     *
     * @return string
     */
    public function articleTitle()
    {
        $title = $this->getTitle();

        $search = [
            '{{ noun }}',
            '{{ verb }}',
            '{{ adjective }}',
            '{{ adverb }}',
        ];

        $replace = [
            $this->getNoun(),
            $this->getVerb(),
            $this->getAdjective(),
            $this->getAdverb(),
        ];

        $title = ucfirst(str_replace($search, $replace, $title));

        return $title;
    }

    /**
     * Generates article content with in HTML
     *
     * @return mixed
     */
    public function articleContent()
    {
        $content = $this->getHtmlTemplate();

        $search = [
            '{{ title }}',
            '{{ paragraph }}',
            '{{ paragraphs }}',
            '{{ words }}',
            '{{ image }}',
            '{{ sentence }}',
        ];

        $replace = [
            self::articleTitle(),
            $this->generator->paragraph(),
            nl2br($this->generator->paragraphs(rand(5, 10), true)),
            $this->generator->sentence(rand(3, 5)),
            $this->generator->imageUrl(),
            $this->generator->sentence(),
        ];

        $content = str_replace($search, $replace, $content);

        return $content;
    }

    /**
     * Generates article content in Markdown format based on some templates
     *
     * @return string
     */
    public function articleContentMarkdown()
    {
        $content = $this->getMarkdownTemplate();

        $search = [
            '{{ title }}',
            '{{ paragraph }}',
            '{{ paragraphs }}',
            '{{ words }}',
            '{{ image }}',
            '{{ sentence }}',
        ];

        $replace = [
            self::articleTitle(),
            $this->generator->paragraph(),
            $this->generator->paragraphs(rand(5, 10), true),
            $this->generator->sentence(rand(3, 5)),
            $this->generator->imageUrl(),
            $this->generator->sentence(),
        ];

        $content = str_replace($search, $replace, $content);

        return $content;
    }
}