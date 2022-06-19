<?php

namespace Arifszn\Blog\Tests;

use Arifszn\Blog\Utils;
use Exception;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use PHPUnit\Framework\ExpectationFailedException;

class UtilsTest extends TestCase
{
    /**
     * @var Utils
     */
    private $utils;

    /**
     * This method is called before each test.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->utils = new Utils();
    }

    /**
     * Test request method.
     *
     * @return void
     * @throws Exception
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testRequest()
    {
        $response = $this->utils->request('https://dev.to/api/articles?per_page=10&username=arifszn');

        $this->assertIsArray($response);
    }

    /**
     * Test exception on request method.
     *
     * @return void
     * @throws Exception
     */
    public function testRequestException()
    {
        $this->expectException(Exception::class);
        $this->utils->request('');
    }
}
