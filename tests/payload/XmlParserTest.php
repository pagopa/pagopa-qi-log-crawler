<?php

namespace payload;

use pagopa\sert\payload\XmlParser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('pagopa\sert\payload\XmlParser::class')]
#[CoversClass(XmlParser::class)]
class XmlParserTest extends TestCase
{

    protected XmlParser $parser_1;

    protected XmlParser $parser_2;


    protected function setUp(): void
    {
        $xml_content_1 = '<root><element_1>Elemento 1</element_1><element_2>Elemento 2</element_2><parent><child>Figlio 1</child><child>Figlio 2</child></parent></root>';
        $this->parser_1 = new XmlParser($xml_content_1);

    }

    #[TestDox('getElement()')]
    public function testGetElement()
    {
        $this->assertEquals('Elemento 1', $this->parser_1->getElement('//root/element_1'));
        $this->assertEquals('Elemento 2', $this->parser_1->getElement('//root/element_2'));
        $this->assertEquals('Figlio 1', $this->parser_1->getElement('//root/parent/child[1]'));
        $this->assertEquals('Figlio 2', $this->parser_1->getElement('//root/parent/child[2]'));
        $this->assertNull($this->parser_1->getElement('//root/figlio'));
        $this->assertNull($this->parser_1->getElement(''));

    }

    #[TestDox('getElementsCount()')]
    public function testGetElementsCount()
    {
        $this->assertEquals(1, $this->parser_1->getElementsCount('//root/element_1'));
        $this->assertEquals(1, $this->parser_1->getElementsCount('//root/element_2'));
        $this->assertEquals(2, $this->parser_1->getElementsCount('//root/parent/child'));
        $this->assertEquals(0, $this->parser_1->getElementsCount('//root/figlio'));
        $this->assertEquals(0, $this->parser_1->getElementsCount(''));

    }

    #[TestDox('isValid()')]
    public function testIsValid()
    {
        $this->assertTrue($this->parser_1->isValid());

        $xml_content_2 = '<root><element_1>Elemento 1</eleme></rot>';
        $this->parser_2 = new XmlParser($xml_content_2);
        $this->assertFalse($this->parser_2->isValid());
    }
}
