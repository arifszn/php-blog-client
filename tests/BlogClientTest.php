<?php

namespace Arifszn\Blog\Tests;

use Arifszn\Blog\Client;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;

class BlogClientTest extends TestCase
{
    /**
     * Test Constructor.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testConstructor()
    {
        $client = new Client();
        $this->assertInstanceOf(Client::class, $client);
    }

    /**
     * Test `getDevPost` method with valid user.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     * @throws Exception
     */
    public function testGetDevPostWithValidUser()
    {
        $client = new Client();
        $result = $client->getDevPost('arifszn');

        $this->assertIsArray($result);

        foreach ($result as $value) {
            $this->assertArrayHasKey('title', $value);
            $this->assertIsString($value['title']);

            $this->assertArrayHasKey('description', $value);
            $this->assertIsString($value['description']);

            $this->assertArrayHasKey('thumbnail', $value);
            $this->assertIsString($value['thumbnail']);

            $this->assertArrayHasKey('link', $value);
            $this->assertIsString($value['link']);

            $this->assertArrayHasKey('categories', $value);
            $this->assertIsArray($value['categories']);

            $this->assertArrayHasKey('publishedAt', $value);
            $this->assertTrue($this->isValidDateTime($value['publishedAt']));
        }
    }

    /**
     * Test `getDevPost` method with empty user.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testGetDevPostWithEmptyUser()
    {
        $client = new Client();
        $result = $client->getDevPost('');

        $this->assertIsArray($result);
        $this->assertEquals(0, count($result));
    }

    /**
     * Test `getMediumPost` method with valid user.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     * @throws Exception
     */
    public function testGetMediumPostWithValidUser()
    {
        $client = new Client();
        $result = $client->getMediumPost('arifszn');

        $this->assertIsArray($result);

        foreach ($result as $value) {
            $this->assertArrayHasKey('title', $value);
            $this->assertIsString($value['title']);

            $this->assertArrayHasKey('description', $value);
            $this->assertIsString($value['description']);

            $this->assertArrayHasKey('thumbnail', $value);
            $this->assertIsString($value['thumbnail']);

            $this->assertArrayHasKey('link', $value);
            $this->assertIsString($value['link']);

            $this->assertArrayHasKey('categories', $value);
            $this->assertIsArray($value['categories']);

            $this->assertArrayHasKey('publishedAt', $value);
            $this->assertTrue($this->isValidDateTime($value['publishedAt']));
        }
    }

    /**
     * Test `getMediumPost` method with empty user.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testGetMediumPostWithEmptyUser()
    {
        $client = new Client();
        $result = $client->getMediumPost('');

        $this->assertIsArray($result);
        $this->assertEquals(0, count($result));
    }

    /**
     * Check valid date time.
     *
     * @param mixed $date
     * @return bool
     */
    private function isValidDateTime($date): bool
    {
        return date('Y-m-d H:i:s', strtotime($date)) === $date;
    }
}
