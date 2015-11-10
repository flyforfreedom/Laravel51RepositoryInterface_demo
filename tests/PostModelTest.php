<?php

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostModelTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->initDatabase();
    }

    public function tearDown()
    {
        $this->resetDatabase();
        parent::tearDown();
    }

    /**
     * @group PostModel
     * @group PostModel0
     */
    public function testEmptyResult()
    {
        // Arrange
        $expected = 0;

        // Act
        $posts = Post::all();
        $actual = count($posts);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @group PostModel
     * @group PostModel1
     */
    public function testCreateAndList()
    {
        // Arrange
        $expected = [
            'title' => 'My title',
        ];
        factory(App\Post::class)->create($expected);

        // Act

        // Assert
        $this->seeInDatabase('posts', $expected);
    }
}
