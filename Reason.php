<?php

/* A Dependency Injection for PHP
 * author Ehsan Yousefi 
 * copyright 2019-2025 Ehsan Yousefi <mailbox5517@gmail.com> | https://fsdeveloper.ir 
 * version 2     */
class Reason 
{

    public $Nominees = [];

    public function inject($ClassName, $ClassMethod = 0, $data = null)
    { 
        if (!class_exists($ClassName)) {
            throw new Exception('Reason'.': class'.var_dump($ClassName).' is not loaded yet.');
        }
        if ($ClassMethod == null) {
            $ReflectionClass = new ReflectionClass($ClassName);
            if($ReflectionClass->getConstructor()){
                return $ReflectionClass->newInstance($this);
            } else {
                return $ReflectionClass->newInstance();
            }
        }
        $ReflectionMethod = new ReflectionMethod($ClassName, $ClassMethod);
        $Parameters = $ReflectionMethod->getParameters();
        $j = count($Parameters);
        $j--;
        if ($j == -1) {
            return $ReflectionMethod->invoke(new $ClassName());
        }
        for ($i=0; $i<=$j; $i++) {
                $id = [$ClassName, $ClassMethod];
                $ReflectionParameter = new ReflectionParameter($id, $i) ;
                $MiddleCheck = $ReflectionParameter->name;
                if (class_exists($MiddleCheck)) {
                    array_push($this->Nominees, new $MiddleCheck);
                }
        }
        $ReflectionMethod->invokeArgs(new $ClassName, $this->Nominees);
    }
}   
