<?php

namespace Tests\Unit;

use App\Providers\FakerExtension\ImageLocalFakerProvider;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class RandomImageCopyTest extends TestCase
{
    use WithFaker;

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

        $faker = $this->makeFaker();

        $src = __DIR__ . '/src';
        $dst = __DIR__ . '/dst';

        $path = $faker->copyRandomImage($src, $dst);

        $this->assertFileExists($dst . '/' . $path);
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
