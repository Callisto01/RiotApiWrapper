<?php

namespace Callisto\RiotApiWrapper\LOL\Options;

class MatchesOPT
{
    /**
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public static function ids(array $options = []): string
    {

        if(empty($options)){
            return '';
        }

        $default = array(
            'startTime' => 'int',
            'endTime'   => 'int',
            'queue'     => 'int',
            'type'      => 'string',
            'start'     => 'int',
            'count'     => 'int'
        );

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