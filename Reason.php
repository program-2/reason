<?php

/* PHP Dependency Injection
 * author Ehsan Yousefi 
 * copyright 2019-2025 Ehsan Yousefi <mailbox5517@gmail.com> | https://fsdeveloper.ir
 * license http://www.apache.org/licenses/LICENSE-2.0
 * version 1.0.1  */
class Reason 
{
    public function inject($ClassName, $ClassMethod = 0, $data = null)
    { 
        $Reason = "Reason";
        if(!class_exists($ClassName)) {
           throw new Exception($Reason.': class'.var_dump($ClassName).' is not loaded yet.');
        }
        
        if($ClassMethod == null){
            $Reason = new Reason;
            return  new $ClassName($Reason);
        }
        $ReflectionMethod = new ReflectionMethod($ClassName, $ClassMethod);
        $Parameters = $ReflectionMethod->getParameters();
        $j = count($Parameters);
        $j--;
        if($j == -1){
           return $ReflectionMethod->invoke(new $ClassName());
        }
        for($i=0; $i<=$j; $i++){
                $ReflectionParameter = new ReflectionParameter(array($ClassName, $ClassMethod), $i) ;
                $MiddleCheck = $ReflectionParameter->name;
                if(class_exists($MiddleCheck)) {$Parameter[$i] = $MiddleCheck;}
                else {$j--;}
        }
        
        if($j == 0){
           $ReflectionMethod->invoke(new $ClassName,  new $Parameter[0], $data );  
        }
    }
}   
