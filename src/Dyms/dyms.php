<?php
/**
 * Author: Shanika Amarasoma
 * Date: 6/23/2015
 * Time: 2:10 PM
 */

namespace Dyms;


class dyms
{
    private $haystack;

    function __construct($h)
    {
        $this->haystack = $h;
    }

    public function search($needle, $limit = 5)
    {
        $needle = strtolower($needle);
        $result = array_values(preg_grep('/^' . preg_quote($needle, '/') . '/i', $this->haystack));
        if (count($result) < $limit) {
            $result = array_merge($result, array_values(preg_grep('/.+' . preg_quote($needle, '/') . '/i',
                $this->haystack)));
        }
        if (count($result) < $limit) {
            $similar = array();
            foreach ($this->haystack as $h) {
                $h_split = preg_split('/[^A-Za-z0-1]+/', $h);
                if (count($h_split) > 1) {
                    foreach ($h_split as $hs) {
                        similar_text(strtolower($hs), $needle, $p);
                        if (isset($similar[$h])) {
                            $similar[$h] = max($p, $similar[$h]);
                        } else {
                            $similar[$h] = $p;
                        }
                    }
                } else {
                    similar_text(strtolower($h), $needle, $p);
                    $similar[$h] = $p;
                }
            }
            arsort($similar);
            $similar = array_keys($similar);
            while (count($result) < $limit) {
                $e = array_shift($similar);
                if (!in_array($e, $result)) {
                    $result[] = $e;
                }
            }
        }
        return $result;
    }
}
