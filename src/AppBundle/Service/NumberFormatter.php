<?php
/**
 * Created by PhpStorm.
 * User: kkraujelis
 * Date: 11/14/17
 * Time: 12:25 PM
 */

namespace AppBundle\Service;

class NumberFormatter
{

    public function format(float $num) : string
    {

        //Force only positive numbers and remember
        //if it originally was positive or negative number/
        $isNegative = $num < 0;
        if($isNegative)
            $num = -$num;

        //Then goes the main part of conversion.
        if($num >= 999500)
            $result =
                sprintf('%.2fM',
                    $num / 1000000);

        else if($num >= 99950)
            $result =
                sprintf('%.0fK',
                    $num / 1000);

        else if($num >= 1000)
            $result =
                sprintf('%.0f %.0f',
                    floor($num / 1000),
                    round($num) % 1000);

        else if($num % 1 === 0)
            $result =
                sprintf('%.2f',
                    $num);

        else
            $result =
                sprintf('%.2f',
                    $num);

        //Then we handle negative numbers
        if($isNegative)
            $result = '-' . $result;

        return $result;
    }

}