<?php namespace Tests\Repositories;

use App\Models\ProductComment;
use App\Repositories\ProductCommentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProductCommentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductCommentRepository
     */
    protected $productCommentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productCommentRepo = \App::make(ProductCommentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_product_comment()
    {
        $productComment = factory(ProductComment::class)->make()->toArray();

        $createdProductComment = $this->productCommentRepo->create($productComment);

        $createdProductComment = $createdProductComment->toArray();
        $this->assertArrayHasKey('id', $createdProductComment);
        $this->assertNotNull($createdProductComment['id'], 'Created ProductComment must have id specified');
        $this->assertNotNull(ProductComment::find($createdProductComment['id']), 'ProductComment with given id must be in DB');
        $this->assertModelData($productComment, $createdProductComment);
    }

    /**
     * @test read
     */
    public function test_read_product_comment()
    {
        $productComment = factory(ProductComment::class)->create();

        $dbProductComment = $this->productCommentRepo->find($productComment->id);

        $dbProductComment = $dbProductComment->toArray();
        $this->assertModelData($productComment->toArray(), $dbProductComment);
    }

    /**
     * @test update
     */
    public function test_update_product_comment()
    {
        $productComment = factory(ProductComment::class)->create();
        $fakeProductComment = factory(ProductComment::class)->make()->toArray();

        $updatedProductComment = $this->productCommentRepo->update($fakeProductComment, $productComment->id);

        $this->assertModelData($fakeProductComment, $updatedProductComment->toArray());
        $dbProductComment = $this->productCommentRepo->find($productComment->id);
        $this->assertModelData($fakeProductComment, $dbProductComment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_product_comment()
    {
        $productComment = factory(ProductComment::class)->create();

        $resp = $this->productCommentRepo->delete($productComment->id);

        $this->assertTrue($resp);
        $this->assertNull(ProductComment::find($productComment->id), 'ProductComment should not exist in DB');
    }
}
