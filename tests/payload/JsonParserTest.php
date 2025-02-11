<?php

namespace payload;

use pagopa\sert\payload\JsonParser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\JsonParser::class')]
#[CoversClass(JsonParser::class)]
class JsonParserTest extends TestCase
{

    protected JsonParser $parser_1;

    protected JsonParser $parser_2;

    protected function setUp(): void
    {
        $json_1 = '
        {
    "node_1": 1,
    "node_2": 2,
    "node_3": 3,
    "node_4": [
        "array_child_1",
        "array_child_2"
    ],
    "node_5": {
        "object_child_1_key": "object_child_1_value",
        "object_child_2_key": "object_child_2_value"
    }
}';
        $this->parser_1 = new JsonParser($json_1);
    }

    #[TestDox('isValid()')]
    public function testIsValid()
    {
        $this->assertTrue($this->parser_1->isValid());
    }

    #[TestDox('getElement()')]
    public function testGetElement()
    {
        $this->assertEquals(1, $this->parser_1->getElement('node_1'));
        $this->assertEquals(2, $this->parser_1->getElement('node_2'));
        $this->assertEquals(3, $this->parser_1->getElement('node_3'));
        $this->assertEquals('array_child_1', $this->parser_1->getElement('node_4.0'));
        $this->assertEquals('array_child_2', $this->parser_1->getElement('node_4.1'));
        $this->assertEquals('object_child_1_value', $this->parser_1->getElement('node_5.object_child_1_key'));
        $this->assertEquals('object_child_2_value', $this->parser_1->getElement('node_5.object_child_2_key'));
        $this->assertNull($this->parser_1->getElement('node_5.object_child_3_key'));
        $this->assertNull($this->parser_1->getElement('node_6'));

    }

    #[TestDox('getElementsCount()')]
    public function testGetElementsCount()
    {
        $this->assertEquals(2, $this->parser_1->getElementsCount('node_4'));
        $this->assertEquals(1, $this->parser_1->getElementsCount('node_5'));
        $this->assertEquals(0, $this->parser_1->getElementsCount('node_1'));
    }
}
