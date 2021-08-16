<?php

namespace arifszn\ArticleApi;

use Exception;

class Utils
{
    /**
     * Create a new instance
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Make a get request
     *
     * @param string $url
     * @return mixed
     * @throws Exception
     */
    public function request(string $url)
    {
        try {
            $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            $output = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($output);

            return $response;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }


    /**
     * Format raw medium article
     *
     * @param object $article
     * @return array
     * @throws Exception
     */
    public function formatMediumArticle(object $article)
    {
        try {
            return [
                'title' => trim($article->title),
                'description' => $this->formatDescription($article->content, true),
                'thumbnail' => $article->thumbnail,
                'link' => $article->guid,
                'categories' => $article->categories,
                'publishedAt' => date('Y-m-d H:i:s', strtotime($article->pubDate)),
            ];
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Format raw dev.to article
     *
     * @param object $article
     * @return array
     * @throws Exception
     */
    public function formatDevtoArticle(object $article)
    {
        try {
            return [
                'title' => trim($article->title),
                'description' => $this->formatDescription($article->description),
                'thumbnail' => !empty($article->social_image) ? $article->social_image : $article->cover_image,
                'link' => $article->url,
                'categories' => $article->tag_list,
                'publishedAt' => date('Y-m-d H:i:s', strtotime($article->published_at)),
            ];
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Ellipsis long text
     *
     * @param string $str
     * @param int $length
     * @param string $ending
     * @return string
     * @throws Exception
     */
    private function textEllipsis(string $str, int $length = 100, string $ending = '...')
    {
        try {
            return strlen($str) > $length ? substr($str, 0, $length).$ending : $str;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Format description
     *
     * @param string $description
     * @param bool $isMedium
     * @return string
     */
    private function formatDescription(string $description, bool $isMedium = false)
    {
        if ($isMedium) {
            $description = preg_replace('/<figcaption[^>]*>([\s\S]*?)<\/figcaption[^>]*>/', '', $description);
            $description = strip_tags($description);
        }

        return $this->textEllipsis((trim(str_replace(array("\r", "\n"), '', $description))));
    }
}
