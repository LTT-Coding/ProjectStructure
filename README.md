# Project Structure
This is the structure I use for my projects.

## Installation

## Autoload
This is my autoload class, so you (almost) don't need any requirements and includes anymore!
It works by mapping the namespaces to the folder structure. By example for the Example class.

    namespace App\Controller;
    
    class Example extends AbstractController
    {
    ...
    }

The use statement is used in this case.

    use App\Controller\Example;
The autoloader uses the namespace structure require_once to find all the necessary classes.

## Abstract Controller
## Example Controller
## Config
## Htaccess
## Composer
### What is a Composer?
### Twig Template Engine
## Folder Structure

 - app
	 - config
	 - controller
	 - library
	 - model
 - themes
	 - theme
		 - assets
			 - css
			 - img
			 - js
		 - view
 - vendor
