# BlogArticleFaker

[![Build Status](https://travis-ci.org/andrefigueira/BlogArticleFaker.svg?branch=master)](https://travis-ci.org/andrefigueira/BlogArticleFaker)
[![Total Downloads](https://poser.pugx.org/andrefigueira/blog-article-faker/downloads)](https://packagist.org/packages/andrefigueira/blog-article-faker)

Generates titles and content for blog articles using faker

## Why?

If you're developing something which has some kind of blog or news system this will generate titles for them
it will also generate content in HTML and Markdown based on some templates, the titles use real words, and the content
uses Fakers Lorem ipsum generators.

## How?

We define formats which are then used to generate titles, the titles use real words, so we have a collection of adjectives, verbs, nouns and adverbs
to generate "close enough" article titles, some of them happy to be quite funny, I did not stop laughing whilst making this...

## Installation

Run the following:

    composer require x
    
Or add the following to your composer file:

    {
      "require": {
        "andrefigueira/blog-article-faker": "dev-master"
      }
    }
    
And then run: 

    composer install

## Usage

You can now use this FakerProvider with Faker to produce your fake article titles and content:

    $faker = Faker\Factory::create();
    
    $faker->addProvider(new BlogArticleFaker\FakerProvider($faker));
    
    echo $faker->articleTitle;
    echo $faker->articleContent
    echo $faker->articleContentMarkdown
    
If you have any questions let me know, and if you'd like to contribute be my guest! Submit pull requests!
    
    