<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProductComment;

class ProductCommentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_product_comment()
    {
        $productComment = factory(ProductComment::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/product_comments', $productComment
        );

        $this->assertApiResponse($productComment);
    }

    /**
     * @test
     */
    public function test_read_product_comment()
    {
        $productComment = factory(ProductComment::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/product_comments/'.$productComment->id
        );

        $this->assertApiResponse($productComment->toArray());
    }

    /**
     * @test
     */
    public function test_update_product_comment()
    {
        $productComment = factory(ProductComment::class)->create();
        $editedProductComment = factory(ProductComment::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/product_comments/'.$productComment->id,
            $editedProductComment
        );

        $this->assertApiResponse($editedProductComment);
    }

    /**
     * @test
     */
    public function test_delete_product_comment()
    {
        $productComment = factory(ProductComment::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/product_comments/'.$productComment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/product_comments/'.$productComment->id
        );

        $this->response->assertStatus(404);
    }
}
