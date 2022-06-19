<?php

namespace Arifszn\Blog;

use Arifszn\Blog\Utils;

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
     */
    public function getMediumPost(string $user): array
    {
        try {
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
        } catch (\Throwable $th) {
            return [];
        }
    }

    /**
     * Get most recent dev posts.
     *
     * @param string $user
     * @return array
     */
    public function getDevPost(string $user): array
    {
        try {
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
        } catch (\Throwable $th) {
            return [];
        }
    }
}
