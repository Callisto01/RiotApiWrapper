<?php

namespace Callisto\RiotApiWrapper\TFT\Options;

class LeagueOPT
{
    public static function byTierAndDivision(array $options = []): string
    {
        if(empty($options)){
            return '';
        }

        $default = [
            'page' => 1
        ];

        foreach ($options as $key => $option){
            if(!isset($default[$key])){
                throw new \Exception('Unknown parameter '. $key . ' in matches ids request.');
            }

            if($default[$key] == 'int' && !is_int($option)){
                throw new \Exception($key . ' must be type of int.');
            }

            if($default[$key] == 'string' && !is_string($option)){
                throw new \Exception($key . ' must be type of string.');
            }
        }

        return '?' . http_build_query($options);
    }
}