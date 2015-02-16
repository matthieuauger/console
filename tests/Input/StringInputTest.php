<?php

/*
 * This file is part of the webmozart/console package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Webmozart\Console\Tests\Input;

use PHPUnit_Framework_TestCase;
use Webmozart\Console\Input\StringInput;

/**
 * @since  1.0
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class StringInputTest extends PHPUnit_Framework_TestCase
{
    const LOREM_IPSUM = "Lorem ipsum dolor sit amet,\nconsetetur sadipscing elitr,\nsed diam nonumy eirmod tempor invidunt";

    public function testRead()
    {
        $input = new StringInput(self::LOREM_IPSUM);

        $this->assertSame('L', $input->read());
        $this->assertSame('o', $input->read());
        $this->assertSame('rem ipsum dolor sit ', $input->read(20));
        $this->assertSame("amet,\nconsetetur sadipscing elitr,\nsed diam nonumy eirmod tempor invidunt", $input->read(100));
        $this->assertNull($input->read());
    }

    public function testReadLine()
    {
        $input = new StringInput(self::LOREM_IPSUM);

        $this->assertSame("Lorem ipsum dolor sit amet,\n", $input->readLine());
        $this->assertSame('consetetu', $input->readLine(10));
        $this->assertSame("r sadipscing elitr,\n", $input->readLine(100));
        $this->assertSame('sed diam nonumy eirmod tempor invidunt', $input->readLine());
        $this->assertNull($input->read());
    }
}