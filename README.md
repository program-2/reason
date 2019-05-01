## Reason  A PHP Dependency Injection Container

### Introduction

Reason is a brief dependency injection Container that also supports a direct

object injection mechanism  for PHP of 52 lines,

with no need to any configuration, that uses reflection.


It can  also be used for the last part of 

an Inversion Of Control (IOC) system to route

a control flow with inputs to their destination.



### Aims

1- to be as small as possible.

2- to be able to handle the dependency of a dependency. 

3- to be fast. reflection is much faster than annotation.


### Instalation

Load Reason along with all dependency classes in your project.



### How to use it (3 ways explained)
-
-

#### First way 
   
   (the **recommended way**; beacause it will not occupy 

   the parameters palce of methods, it only occupies parameters 
   
   place of construct method which is allocated for dependency injection purposes.)


1- Put "Reason $Reason" as parameter of the **construc method** of the class: 
      
      public function __construct(Reason $Reason)
      {
        //
      }

2- Instantiate the Class where/when needed with "Reason":
    
      ((new Reason)->inject('Class'));
    
   Inside the construct method you will have access to injected $Reason object
   
   so you can  make $Reason available within the class
   
   with programing techniques like using a property to share it:

      $Reason->inject('Class');
    
   example:
   
     $obj = $Reason->inject('DataBaseClass');
     
     $obj->query(..);
     
   (Here the dependencies of dependencies will also be injected as well)


#### Second way

   (calling a method and injecting the type-hinted Reason)     


1- Put "Reason $Reason" as parameter of the **method**: 
      
      public function Method(Reason $Reason)
      {
        //
      }

      
2- Instantiate the methods where/when needed with "Reason":
    
      ((new Reason)->inject('Class','Method'));
    

   Inside the methods use injected $Reason object to get an instance of any dependency:

      $Reason->inject('Class','Method');
    
   (Here the dependencies of dependencies will also be injected as well) 

    
**Notice:** 

   As you don't have access to pass parameters to methods directly  
   
   in the second way, any needed values can be passed throuth one(1) array of
  
   keys/values as the third(3rd) parameter position:
   
      ((new Reason)->inject('Class', 'Method', array('john'=>'4')));
  
   and when injected into objects:  
   
      $Reason->inject('Class', 'Method', array('john'=>'4'));   
  
   then accessible:    
   
      $john;


      
#### Third way 

   ( use it for  "unlimitted number of direct object injection"  only if your dependency
   
   classes themselves are independent so they don't have Reason inside their own class definition.
   
   Please note that Reason itself can be among these type-hinted classes. )


1- Put "AnyDependencyClass   $AnyDependencyClass" as parameter of the **method**: 
      
      Class 
      {
          public function Method(Class1 $Class1, Class2 $Class2, Reason $Reason, ...)
          {
            //
          }
      }
      

2- Instantiate the methods where/when needed with "Reason":
    
      ((new Reason)->inject('Class','Method'));
    

   Inside the methods directly use your injected object:

      $Class1;
      
      $Class2;
    
      $Reason;
   
 
**Notice:**

   It is possible to pass Reason Manually like any of the parameter
  
   of the method if the method accepts any paratemer:
  
     ((new Reason)->inject('Class'))->Method(new Reason);
  
   or make it inside a method of a class:  
  
     $reason = new Reason;
  
   thus reserving the parameters place for the programing purpose,
  
   but ways increase the **coupling degree** a little.
  
  

### Credit

Developed by Ehsan Yousefi <mailbox5517@gmail.com> [https://fsdeveloper.ir]
 
 

### Updates

" 8/4/2019 1.0.0 first release" - Backwards incompatible

"25/4/2019 2.0.0 new features added >> ways(No.1 & No.3)" - Backwards incompatible
