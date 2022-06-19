<?php

namespace Arifszn\Blog\Tests;

use Arifszn\Blog\Client;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;

class BlogClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * This method is called before each test.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();
    }

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
        $this->assertInstanceOf(Client::class, $this->client);
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
        $result = $this->client->getDevPost('arifszn');

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
        $result = $this->client->getDevPost('');

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
        $result = $this->client->getMediumPost('arifszn');

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
        $result = $this->client->getMediumPost('');

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
