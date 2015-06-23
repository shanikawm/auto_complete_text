<?php
/**
 * Created by PhpStorm.
 * User: Shanika
 * Date: 6/23/2015
 * Time: 2:10 PM
 */

namespace actext;


class ac_text {
    private  $haystack;
    function __construct($h){
        $this->haystack=$h;
    }

    public function search($term,$limit=5){
        $term=strtolower($term);
        $result=array_values(preg_grep('/^'.$term.'/i',$this->haystack));
        if(count($result)<$limit){
            $result=array_merge($result,array_values(preg_grep('/ '.$term.'/i',$this->haystack)));
        }
        if(count($result)<$limit){
            $similar=array();
            foreach($this->haystack as $c){
                $sc=explode(' ',$c);
                if(count($sc)>1){
                    foreach($sc as $scp){
                        similar_text(strtolower($scp),$term,$p);
                        $similar[$c]=max($p,$similar[$c]);
                    }
                } else {
                    similar_text(strtolower($c),$term,$p);
                    $similar[$c]=$p;
                }
        }   
        arsort($similar);
        $similar=array_keys($similar);
        while(count($result)<$limit){
            $e=array_shift($similar);
            if(!in_array($e,$result)){
                $result[]=$e;
            }
        }
        }
    return $result;
    }
}
