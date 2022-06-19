<?php

namespace Arifszn\Blog;

use Arifszn\Blog\Utils;
use Exception;

class Client
{
    /**
     * Utility class
     *
     * @var Utils
     */
    private $utils;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->utils = new Utils();
    }

    /**
     * Get most recent medium posts.
     *
     * @param string $user
     * @return array
     * @throws Exception
     */
    public function getMediumPost(string $user)
    {
        if (empty($user)) {
            return [];
        }

        $result = [];
        $url = 'https://api.rss2json.com/v1/api.json?rss_url=https://medium.com/feed/@' . $user;
        $response = $this->utils->request($url);

        if (isset($response->items)) {
            foreach ($response->items as $item) {
                array_push($result, $this->utils->formatMediumPost($item));
            }
        }

        return $result;
    }

    /**
     * Get most recent dev posts.
     *
     * @param string $user
     * @return array
     * @throws Exception
     */
    public function getDevPost(string $user)
    {
        if (empty($user)) {
            return [];
        }

        $result = [];
        $url = 'https://dev.to/api/articles?per_page=10&username=' . $user;
        $response = $this->utils->request($url);

        foreach ($response as $item) {
            array_push($result, $this->utils->formatDevPost($item));
        }

        return $result;
    }
}
