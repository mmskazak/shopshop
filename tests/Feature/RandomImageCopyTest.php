<?php

namespace Tests\Feature;

use App\Providers\FakerExtension\ImageLocalFakerProvider;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RandomImageCopyTest extends TestCase
{
    use WithFaker;

    private string $path_to;
    private string $path_from;

    public function setUp(): void
    {
        parent::setUp();

//        if this use in phpunit test
//        $this->faker = Factory::create();
//        $this->faker->addProvider(new ImageLocalFakerProvider($this->faker));

        $this->path_from = base_path('tests/Fixtures/images/products');
        $this->path_to = storage_path('app/public/images/products');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function testCopyRandomFileWithRelativePath()
    {
        $nameFile = $this->faker->copyRandomImage($this->path_from, $this->path_to, true);

        $this->assertFileExists($this->path_to . '/' . $nameFile);
    }
//
//    public function testCopyRandomFileWithOnlyFileName()
//    {
//        $src = __DIR__ . '/src';
//        $dst = __DIR__ . '/dst';
//
//        $fileName = $this->factory->copyRandomImage($src, $dst, true);
//
//        $this->assertFileExists($dst . '/' . $fileName);
//    }
//
//    public function testCopyRandomFileWithNonExistingDestination()
//    {
//        $src = __DIR__ . '/src';
//        $dst = __DIR__ . '/non_existing_dst';
//
//        $path = $this->factory->copyRandomImage($src, $dst);
//
//        $this->assertFileExists($dst . '/' . $path);
//    }
//
//    public function testCopyRandomImageWithNonExistingDestination()
//    {
//        $src = __DIR__ . '/src';
//        $dst = __DIR__ . '/non_existing_dst';
//
//        $path = $this->factory->copyRandomImage($src, $dst);
//
//        $this->assertTrue($this->isImage($path));
//    }
//
//    private function isImage($file): bool
//    {
//        $imageMimes = ['image/jpeg', 'image/png', 'image/gif'];
//        $finfo = finfo_open(FILEINFO_MIME_TYPE);
//        $mime = finfo_file($finfo, $file);
//        finfo_close($finfo);
//        return in_array($mime, $imageMimes);
//    }
}
