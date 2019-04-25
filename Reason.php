<?php

/* A Dependency Injection for PHP
 * Author Ehsan Yousefi 
 * copyright 2019 Ehsan Yousefi <mailbox5517@gmail.com> | https://fsdeveloper.ir 
 * version 2.0.0     */
class Reason 
{
    public function inject($ClassName, $ClassMethod = 0, $data = null)
    { 
        if(!class_exists($ClassName)) {
           throw new Exception('Reason'.': class'.var_dump($ClassName).' is not loaded yet.');
        }
        if($ClassMethod == null){
            $ReflectionClass = new ReflectionClass($ClassName);
            return $ReflectionClass-> newInstance($this);
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
        switch($j){
        case 0:
            $ReflectionMethod->invoke(new $ClassName,  new $Parameter[0], $data );  
            break;
        case 1:
            $ReflectionMethod->invoke(new $ClassName, new $Parameter[0],  new $Parameter[1],
            $data); 
            break;
        case 2:
            $ReflectionMethod->invoke(new $ClassName, new $Parameter[0],  new $Parameter[1], 
            new $Parameter[2], $data);
            break;
        case 3:
            $ReflectionMethod->invoke(new $ClassName, new $Parameter[0],  new $Parameter[1], 
            new $Parameter[3],new $Parameter[4], $data);  
            break;
        case 4:
            $ReflectionMethod->invoke(new $ClassName, new $Parameter[0],  new $Parameter[1], 
            new $Parameter[3],new $Parameter[4], new $Parameter[5], $data);  
            break;
        }
    }
}   
