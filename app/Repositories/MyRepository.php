<?php

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class MyRepository
 * @package App\Repositories
 */
class MyRepository implements PostRepositoryInterface
{

    /**
     * 傳回最新3筆文章
     *
     * @return Collection
     */
    public function getLatest3Posts()
    {
        $posts = new Collection();
        for ($i = 1; $i <= 3; $i++) {
            $post = [
                'id'        => $i,
                'title'     => 'My title' . $i,
                'sub_title' => 'My sub_title' . $i,
                'content'   => 'My content' . $i,
            ];

            $posts->push((object)$post);
        }

        return $posts;
    }
}