<h1 align="center">Article-api</h1>
<p align="center">Api client for dev.to and medium to fetch recent articles</p>
<p align="center">
    <a href="https://packagist.org/packages/arifszn/article-api"><img src="https://img.shields.io/packagist/v/arifszn/article-api"/></a>
    <a href="https://github.com/arifszn/article-api-php/blob/main/LICENSE"><img src="https://img.shields.io/github/license/arifszn/article-api-php"/></a>
</p>

<br/>
<br/>

<p>Get recent articles from dev.to and medium by just providing your username and showcase them on your portfolio or blog site.</p>

> JavaScript version: <a href="https://github.com/arifszn/article-api">Article-api</a>

## Installation

Install via <a href="https://packagist.org/packages/arifszn/article-api">composer</a>
```
composer require arifszn/article-api
```


## Usage

<details>
<summary>getDevtoArticle()</summary>

```php
use arifszn\ArticleApi\ArticleApi;


$articleApi = new ArticleApi();
$result = $articleApi->getDevtoArticle('yourusername');
```

</details>

<details>
<summary>getMediumArticle()</summary>

```php
use arifszn\ArticleApi\ArticleApi;


$articleApi = new ArticleApi();
$result = $articleApi->getMediumArticle('yourusername');
```

</details>


## Result


<details>
<summary>Sample Response</summary>

```php
array:2 [▼
    0 => array:6 [▼
    "title" => "Why Enhancing Virtual Reality is Important"
    "description" => "Virtual reality is seen as a “fun” technology to some without much...",
    "thumbnail" => "https://cdn-images-1.medium.com/max/2600/0*kz30LOdXT8CyOymh"
    "link" => "https://medium.com/p/ac19dd21c728"
    "categories" => array:5 [▼
        "vr", "technology", "virtual-reality", "engineering", "artificial-intelligence"
    ]
    "publishedAt" => "2020-11-08 18:43:34"
    ]
    1 => array:6 [▼
    "title" => "How to Get Started With Data Science: a Brief Guide"
    "description" => "You’ve heard about data science and machine learning, and you want to get started. Maybe you hear...",
    "thumbnail" => "https://cdn-images-1.medium.com/max/2600/0*Ah0vLtsvxqUvRWuS"
    "link" => "https://medium.com/p/88ec244f2fee"
    "categories" => array:3 [▼
        "beginner-coding", "data-science-training", "machine-learning-course"
    ]
    "publishedAt" => "2020-26-07 22:55:26"
    ]
]
```

</details>


## Contribute

To contribute, clone this repo locally and commit your code on a new branch. Feel free to create an issue or make a pull request.


## Thank You

[![Stargazers repo roster for @arifszn/article-api-php](https://reporoster.com/stars/arifszn/article-api-php)](https://github.com/arifszn/article-api-php/stargazers)


## Support

Show your ❤️ and support by giving a star.


## License

<p>MIT Licensed.</p>
<p>Copyright © <a href="https://arifszn.github.io">MD. Ariful Alam</a> 2021.</p>
