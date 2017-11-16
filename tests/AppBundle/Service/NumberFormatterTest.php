<?php
/**
 * Created by PhpStorm.
 * User: kkraujelis
 * Date: 11/14/17
 * Time: 12:29 PM
 */

namespace Tests\AppBundle\Service;

use AppBundle\Service\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class NumberFormatterTest extends TestCase
{

    /**
     * @dataProvider formatProvider
     */
    public function testFormat(float $num, string $result) : void
    {

        $numFormatter = new NumberFormatter();
        $subject = $numFormatter->format($num);

        $this->assertEquals($result, $subject);

    }

    public function formatProvider() : array
    {

        return [
            '1' => [2835779, '2.84M'],
            '2' => [999500, '1.00M'],
            '3' => [535216, '535K'],
            '4' => [99950, '100K'],
            '5' => [27533.78, '27 534'],
            '6' => [533.1, '533.10'],
            '7' => [66.6666, '66.67'],
            '8' => [12.00, '12'],
            '9' => [1000, '1 000'],
            '10' => [9.995, '10'],
            '11' => [1005000, '1.01M'],
            '-1' => [-2835779, '-2.84M'],
            '-2' => [-999500, '-1.00M'],
            '-3' => [-535216, '-535K'],
            '-4' => [-99950, '-100K'],
            '-5' => [-27533.78, '-27 534'],
            '-6' => [-533.1, '-533.10'],
            '-7' => [-66.6666, '-66.67'],
            '-8' => [-12.00, '-12'],
            '-9' => [-1000, '-1 000'],
            '-10' => [-9.995, '-10'],
            '-11' => [-1005000, '-1.01M'],
        ];

    }

}