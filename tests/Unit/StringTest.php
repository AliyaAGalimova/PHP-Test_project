<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../function.php';

class StringTest extends TestCase
{
    public function test_first_upper_1(): void
    {
        $string = new StrangeString();
        $input = 'Cat';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'Tac');
    }

    public function test_first_upper_2(): void
    {
        $string = new StrangeString();
        $input = 'Мышь';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'Ьшым');
    }

    public function test_upper_in_the_middle(): void
    {
        $string = new StrangeString();
        $input = 'houSe';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'esuOh');
    }

    public function test_two_uppers_in_a_row(): void
    {
        $string = new StrangeString();
        $input = 'домИК';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'кимОД');
    }

    public function test_two_uppers(): void
    {
        $string = new StrangeString();
        $input = 'elEpHant';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'tnAhPele');
    }

    public function test_punctuation(): void
    {
        $string = new StrangeString();
        $input = 'cat,';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'tac,');
    }

    public function test_punctuation_and_uppercase_letter(): void
    {
        $string = new StrangeString();
        $input = 'Зима:' ;
        $result = $string->strangeString($input);
        $this->assertSame($result, 'Амиз:');
    }

    public function test_sentence_1(): void
    {
        $string = new StrangeString();
        $input = "is 'cold' now" ;
        $result = $string->strangeString($input);
        $this->assertSame($result, "si 'dloc' won");
    }

    public function test_sentence_2(): void
    {
        $string = new StrangeString();
        $input = 'это «Так» "просто"';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'отэ «Так» "отсорп"');
    }

    public function test_separators_1(): void
    {
        $string = new StrangeString();
        $input = 'third-part';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'driht-trap');
    }

    public function test_separators_2(): void
    {
        $string = new StrangeString();
        $input = 'can`t';
        $result = $string->strangeString($input);
        $this->assertSame($result, 'nac`t');
    }
}
