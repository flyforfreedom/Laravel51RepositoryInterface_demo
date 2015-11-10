<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PostRepositoryInterface
 * @package App\Contracts
 */
interface PostRepositoryInterface
{
    /**
     * 傳回最新3筆文章
     *
     * @return Collection
     */
    public function getLatest3Posts();
}