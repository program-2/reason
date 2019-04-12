# Reason - A PHP Dependency Injection Container

Introduction
------------
Reason is a brief dependency injection Container for PHP
of only 34 lines,
with no need to any configuration,
that uses reflection.

Aims
-----
1 - to be as small as possible.

2 - to be able to handle the dependency of a dependency. 

3 - to be fast. reflection is much faster than annotation.


Instalation
-----------
Just include it to the project.


How to use it
-------------
1 - Load Reason along with all dependency classes in your project.


2 - Put "Reason $Reason" as parameter of the method: 
      
      public function My_Method(Reason $Reason)
      {
        //
      }

      
3 - Instantiate the methods where/when needed with "Reason":
    
      ((new Reason)->inject('Class','Method'));
    

4 - Inside the methods use 'injected $Reason object' to get an instance of any class:

      $Reason->inject('Class','Method');
    
  (Here the dependencies of dependencies will also be injected as well) 


 
Notice: 

  As there is no access to parameters of methods directly,  
  any needed values can be passed throuth one(1) array of
  keys/values as the third(3rd) parameter position:
  
       ((new Reason)->inject('Class', 'Method', array('john'=>'4')));
       
  or when injected into objects with:  
  
       $Reason->inject('Class', 'Method', array('john'=>'4'));   
       
  and then accessible in destination with:    
  
       $john;
 
 
Notice:

  It is possible to make and pass Reason like a parameter
  if the method accepts any parameter:
  
       ((new Reason)->inject('Class'))->Method(new Reason);
       
  or make it inside a method of a class:  
  
       $reason = new Reason;
       
  thus reserving the parameter place for the programming purposes,
  but these ways increase the coupling degree a little.
  
  
Credit
------
Developed by Ehsan Yousefi <mailbox5517@gmail.com> [https://fsdeveloper.ir]
 
 
Updates
-------
11/4/2019 'version 1.0.0 first Release' - backwards incompatible
