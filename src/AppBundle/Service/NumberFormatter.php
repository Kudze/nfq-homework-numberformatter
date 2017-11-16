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

        //Then goes the main part of conversion.
        if(abs($num) >= 999500)
            return sprintf('%.2fM',
                    round($num / 1000000, 2));

        if(abs($num) >= 99950)
            return sprintf('%dK',
                    round($num / 1000));

        if(abs($num) >= 950)
            return sprintf('%d %\'.03d',
                intval($num / 1000), //Using it instead of floor since it takes closest number to 0
                round(abs($num)) % 1000);

        if(abs($num) % 1 === 0)
            return sprintf('%.2f',
                    round($num, 2));

        return sprintf('%.2f', $num);
    }

}