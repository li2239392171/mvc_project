<?php
    function smarty_block_test2($t,$content){
        $replace = $t['replace'];
        $maxnum = $t['maxnum'];
        if($replace == 'true'){
            $content = str_replace('，',',',$content);
            $content = str_replace('。','.',$content);

        }
        $content = substr($content,0,$maxnum);
        return $content;
    }
?>