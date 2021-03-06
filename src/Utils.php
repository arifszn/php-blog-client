<?php

namespace Arifszn\Blog;

use Exception;

class Utils
{
    /**
     * Make a get request.
     *
     * @param string $url
     * @return array
     * @throws Exception
     */
    public function request(string $url)
    {
        try {
            if ($url === '') {
                throw new Exception("Url is empty");
            }

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
     * Format raw medium post.
     *
     * @param object $post
     * @return array
     */
    public function formatMediumPost(object $post)
    {
        return [
            'title' => trim($post->title),
            'description' => $this->formatDescription($post->content, true),
            'thumbnail' => $post->thumbnail,
            'link' => $post->guid,
            'categories' => $post->categories,
            'publishedAt' => date('Y-m-d H:i:s', strtotime($post->pubDate)),
        ];
    }

    /**
     * Format raw dev post.
     *
     * @param object $post
     * @return array
     */
    public function formatDevPost(object $post)
    {
        return [
            'title' => trim($post->title),
            'description' => $this->formatDescription($post->description),
            'thumbnail' => !empty($post->social_image) ? $post->social_image : $post->cover_image,
            'link' => $post->url,
            'categories' => $post->tag_list,
            'publishedAt' => date('Y-m-d H:i:s', strtotime($post->published_at)),
        ];
    }

    /**
     * Ellipsis long text.
     *
     * @param string $str
     * @param int $length
     * @param string $ending
     * @return string
     */
    private function textEllipsis(string $str, int $length = 100, string $ending = '...')
    {
        return strlen($str) > $length ? substr($str, 0, $length) . $ending : $str;
    }

    /**
     * Format description.
     *
     * @param string $description
     * @param bool $isMedium
     * @return string
     */
    private function formatDescription(string $description, bool $isMedium = false)
    {
        if ($isMedium) {
            $description = preg_replace('/<figcaption[^>]*>([\s\S]*?)<\/figcaption[^>]*>/', '', $description);
            $description = $this->textEllipsis(strip_tags($description));
        }

        return trim(str_replace(array("\r", "\n"), '', $description));
    }
}
