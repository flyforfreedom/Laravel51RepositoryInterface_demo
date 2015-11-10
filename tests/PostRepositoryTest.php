<?php

use App\Repositories\PostRepository;
use App\Contracts\PostRepositoryInterface;

class PostRepositoryTest extends TestCase
{
    /**
     * @var PostRepositoryInterface
     */
    protected $target = null;

    public function setUp()
    {
        parent::setUp();
        $this->initDatabase();

        // by DI
        //$this->target = new PostRepository();
        // by IoC Container
        $this->target = $this->app->make(PostRepository::class);
    }

    public function tearDown()
    {
        $this->resetDatabase();
        $this->target = null;
        parent::tearDown();
    }

    /**
     * @group PostRepository
     * @group PostRepository0
     */

    public function testGetLatest3Posts()
    {
        // Arrange
        factory(App\Post::class, 100)->create();
        $expected = [];
        for ($i = 100; $i >= 98; $i--) {
            $expected[] = [
                'id' => $i
            ];
        }

        // Act
        $actual = $this->target
            ->getLatest3Posts()
            ->toArray();

        // Assert
        $this->assertArraySubset($expected, $actual);
    }
}