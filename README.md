<br />
<p align="center">
  <img src="https://user-images.githubusercontent.com/45073703/174469932-d3cbf8a0-b6ba-4c64-ab77-456ea4408f87.png" width="50%">

  <h4 align="center">PHP client to get recent blog posts from popular blogging platforms</h4>

  <p align="center">
    <a href="https://packagist.org/packages/arifszn/blog-client">
      <img src="https://img.shields.io/packagist/v/arifszn/blog-client"/>
    </a>
    <a href="https://github.com/arifszn/php-blog-client/blob/main/LICENSE">
        <img src="https://img.shields.io/github/license/arifszn/php-blog-client"/>
    </a>
    <a href="https://github.com/arifszn/php-blog-client/blob/main/CONTRIBUTING.md">
      <img src="https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat"/>
    </a>
    <a href="https://www.buymeacoffee.com/arifszn">
      <img src="https://img.shields.io/badge/sponsor-buy%20me%20a%20coffee-FFDD00?logo=buymeacoffee"/>
    </a>
    <a href="https://twitter.com/intent/tweet?text=PHP%20client%20to%20get%20recent%20blog%20posts%20from%20popular%20blogging%20platforms:&url=https%3A%2F%2Fgithub.com%2Farifszn%2Fphp-blog-client&hashtags=php,opensource,blog,webdev,developers">
      <img src="https://img.shields.io/twitter/url?url=https%3A%2F%2Fgithub.com%2Farifszn%2Fphp-blog-client"/>
    </a>
  </p>

  <p align="center">
    <a href="https://packagist.org/packages/arifszn/blog-client">Packagist</a>
    ·
    <a href="https://github.com/arifszn/php-blog-client/issues">Report Bug</a>
    ·
    <a href="https://github.com/arifszn/php-blog-client/discussions">Request Feature</a>
  </p>
</p>

<br/>

<p>Get recent blog posts from popular blogging platforms by just providing your username and showcase them on your portfolio or website.</p>

> JavaScript version: <a href="https://github.com/arifszn/blog.js">blog.js</a>

## Installation

Install via <a href="https://packagist.org/packages/arifszn/blog-client">composer</a>

```sh
composer require arifszn/blog-client
```

## Usage

- **`getDevPost()`:** Get 10 recent posts from [dev](https://dev.to).

  ```php
  use Arifszn\Blog\Client;

  $client = new Client();
  $result = $client->getDevPost('yourusername');
  ```

- **`getMediumPost()`:** Get 10 recent posts from [medium](https://medium.com).

  ```php
  use Arifszn\Blog\Client;

  $client = new Client();
  $result = $client->getMediumPost('yourusername');
  ```

## Sample Response

```php
array:2 [▼
  0 => array:6 [▼
    "title" => "Why Enhancing Virtual Reality is Important",
    "description" => "Virtual reality is seen as a “fun” technology to some without much...",
    "thumbnail" => "https://cdn-images-1.medium.com/max/2600/0*kz30LOdXT8CyOymh",
    "link" => "https://medium.com/p/ac19dd21c728",
    "categories" => array:5 [▼
      "vr",
      "technology",
      "virtual-reality",
      "engineering",
      "artificial-intelligence"
    ],
    "publishedAt" => "2020-11-08 18:43:34"
  ],
  1 => array:6 [▼
    "title" => "How to Get Started With Data Science: a Brief Guide",
    "description" => "You’ve heard about data science and machine learning, and you want to get started. Maybe you hear...",
    "thumbnail" => "https://cdn-images-1.medium.com/max/2600/0*Ah0vLtsvxqUvRWuS",
    "link" => "https://medium.com/p/88ec244f2fee",
    "categories" => array:3 [▼
      "beginner-coding",
      "data-science-training",
      "machine-learning-course"
    ],
    "publishedAt" => "2020-26-07 22:55:26"
  ]
]
```

## Contribute

Please read the [contributing guide](https://github.com/arifszn/php-blog-client/blob/main/CONTRIBUTING.md) to learn how you can help.

## Support

<p>You can show your support by starring this project.</p>
<a href="https://github.com/arifszn/php-blog-client/stargazers">
  <img src="https://img.shields.io/github/stars/arifszn/php-blog-client?style=social" alt="Github Star">
</a>

## License

[MIT](https://github.com/arifszn/php-blog-client/blob/main/LICENSE)
