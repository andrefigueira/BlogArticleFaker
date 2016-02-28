<?php

class BlogArticleFakerTest extends PHPUnit_Framework_TestCase
{
    protected $faker;

    protected $testableProvider;

    public function setUp()
    {
        $faker = \Faker\Factory::create();
        $testableProvider = new TestableBlogArticleFaker($faker);
        $faker->addProvider($testableProvider);

        $this->faker = $faker;
        $this->testableProvider = $testableProvider;
    }

    public function test_get_titles_returns_array()
    {
        $this->assertTrue(is_array($this->testableProvider->getTitles()));
    }

    public function test_get_adverbs_returns_array()
    {
        $this->assertTrue(is_array($this->testableProvider->getAdverbs()));
    }

    public function test_get_nouns_returns_array()
    {
        $this->assertTrue(is_array($this->testableProvider->getNouns()));
    }

    public function test_get_adjectives_returns_array()
    {
        $this->assertTrue(is_array($this->testableProvider->getAdjectives()));
    }

    public function test_title_generates()
    {
        $expected = 'TestTitle: laugh is a verb, apple is a noun, wisely is an adverb, fake is an adjective';

        $title = $this->faker->articleTitle;

        $this->assertEquals($expected, $title);
    }
}

class TestableBlogArticleFaker extends BlogArticleFaker\FakerProvider
{
    public function getTitle()
    {
        return 'TestTitle: {{ verb }} is a verb, {{ noun }} is a noun, {{ adverb }} is an adverb, {{ adjective }} is an adjective';
    }

    public function getVerb()
    {
        return 'laugh';
    }

    public function getNoun()
    {
        return 'apple';
    }

    public function getAdverb()
    {
        return 'wisely';
    }

    public function getAdjective()
    {
        return 'fake';
    }
}