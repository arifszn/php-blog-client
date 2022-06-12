<?php

namespace arifszn\Blog;

use Exception;

class Utils
{
    /**
     * Make a get request.
     *
     * @param string $url
     * @return mixed
     * @throws Exception
     */
    public function request(string $url): mixed
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
     * Format raw medium post.
     *
     * @param object $post
     * @return array
     * @throws Exception
     */
    public function formatMediumPost(object $post): array
    {
        try {
            return [
                'title' => trim($post->title),
                'description' => $this->formatDescription($post->content, true),
                'thumbnail' => $post->thumbnail,
                'link' => $post->guid,
                'categories' => $post->categories,
                'publishedAt' => date('Y-m-d H:i:s', strtotime($post->pubDate)),
            ];
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Format raw dev post.
     *
     * @param object $post
     * @return array
     * @throws Exception
     */
    public function formatDevPost(object $post): array
    {
        try {
            return [
                'title' => trim($post->title),
                'description' => $this->formatDescription($post->description),
                'thumbnail' => !empty($post->social_image) ? $post->social_image : $post->cover_image,
                'link' => $post->url,
                'categories' => $post->tag_list,
                'publishedAt' => date('Y-m-d H:i:s', strtotime($post->published_at)),
            ];
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Ellipsis long text.
     *
     * @param string $str
     * @param int $length
     * @param string $ending
     * @return string
     * @throws Exception
     */
    private function textEllipsis(string $str, int $length = 100, string $ending = '...'): string
    {
        try {
            return strlen($str) > $length ? substr($str, 0, $length) . $ending : $str;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Format description.
     *
     * @param string $description
     * @param bool $isMedium
     * @return string
     */
    private function formatDescription(string $description, bool $isMedium = false): string
    {
        if ($isMedium) {
            $description = preg_replace('/<figcaption[^>]*>([\s\S]*?)<\/figcaption[^>]*>/', '', $description);
            $description = $this->textEllipsis(strip_tags($description));
        }

        return trim(str_replace(array("\r", "\n"), '', $description));
    }
}
