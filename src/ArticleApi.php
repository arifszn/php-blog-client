<?php

namespace arifszn\ArticleApi;

require_once('Utils.php');

use arifszn\ArticleApi\Utils;

class ArticleApi
{
    /**
     * Utility class
     *
     * @var Utils
     */
    private $utils;

    /**
     * Create a new instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->utils = new Utils();
    }

    /**
     * Get most recent medium articles
     *
     * @param string $user
     * @return array
     */
    public function getMediumArticle(string $user)
    {
        try {
            if (empty($user)) {
                return [];
            }

            $url = 'https://api.rss2json.com/v1/api.json?rss_url=https://medium.com/feed/@'.$user;

            $response = $this->utils->request($url);

            $result = [];

            if (isset($response->items)) {
                foreach ($response->items as $item) {
                    array_push($result, $this->utils->formatMediumArticle($item));
                }
            }

            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }

    /**
     * Get most recent dev.to articles
     *
     * @param string $user
     * @return array
     */
    public function getDevtoArticle(string $user)
    {
        try {
            if (empty($user)) {
                return [];
            }

            $url = 'https://dev.to/api/articles?per_page=10&username='.$user;

            $response = $this->utils->request($url);

            $result = [];

            foreach ($response as $item) {
                array_push($result, $this->utils->formatDevtoArticle($item));
            }

            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }
}
