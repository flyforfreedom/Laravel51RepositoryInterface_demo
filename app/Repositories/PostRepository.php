<?php

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PostRepository
 * @package App\Repositories
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    protected $Post;

    /**
     * PostRepository constructor.
     * @param Post $Post
     */
    public function __construct(Post $Post)
    {
        $this->Post = $Post;
    }

    /**
     * 傳回最新3筆文章
     *
     * @return Collection
     */
    public function getLatest3Posts()
    {
        return $this->Post
            ->query()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
    }
}