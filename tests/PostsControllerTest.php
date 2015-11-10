<?php

use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\PostsController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Mockery\Mock;

class PostsControllerTest extends TestCase
{
    /**
     * @var PostsController
     */
    protected $target = null;

    /**
     * @var Mock
     */
    protected $mock = null;

    public function setUp()
    {
        parent::setUp();
        $this->mock = $this->initMock(
            PostRepositoryInterface::class
        );

        // by DI
//        $this->target = new PostsController(
//            $this->mock
//        );

        // IoC Container
        $this->target = $this->app->make(PostsController::class);
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * 測試PostsController@index
     *
     * @group PostsController
     * @group PostController0
     * @return void
     */
    public function testIndex()
    {
        // Arrange
        $expected = new Collection([1, 2, 3]);

        $this->mock
            ->shouldReceive('getLatest3Posts')
            ->once()
            ->andReturn($expected);

        // Act
        /** @var View $view */
        $view = $this->target->index();
        $actual = $view->posts;

        // Assert
        $this->assertEquals($expected, $actual);
    }
}
