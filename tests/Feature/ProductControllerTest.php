<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Sanctum::actingAs(
            User::factory()->create()
        );
    }

    public function test_index()
    {
        // factory(Product::class, 5)->create();
        Product::factory(5)->create();

        $response = $this->getJson('/api/products');

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(5);
    }

    public function test_create_new_product()
    {
        // $this->withoutExceptionHandling(); // and read the stacktrace
        $data = [
            'name' => 'Hola',
            'price' => 1000,
        ];
        
        $response = $this->postJson('/api/products', $data);
        // dd($response->status());

        $response->assertSuccessful();
        // $response->assertHeader('content-type', 'application/json');
        $this->assertDatabaseHas('products', $data);
    }

    public function test_update_product()
    {
        /** @var Product $product */
        $product = Product::factory()->create();
        // $product = factory(Product::class)->create();

        $data = [
            'name' => 'Update Product',
            'price' => 20000,
        ];

        $response = $this->patchJson("/api/products/{$product->getKey()}", $data);
        $response->assertSuccessful();
        // $response->assertHeader('content-type', 'application/json');
    }

    public function test_show_product()
    {

        /** @var Product $product */
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->getKey()}");

        $response->assertSuccessful();
        // $response->assertHeader('content-type', 'application/json');
    }

    public function test_delete_product()
    {

        /** @var Product $product */
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->getKey()}");

        $response->assertSuccessful();
        // $response->assertHeader('content-type', 'application/json');
        $this->assertDeleted($product);
    }

}
