# Real Simple REST
A trio of files to make talking to a server easier.

It'll work just fine out of the box, but it's minimal code so it's easy for you to mash it up and work it into your project.


## Front End
sync.js allows you to simply pass a model and a CRUD operation to a function and have the rest done automagically.

Accepts an object with the following properties

`method` 'create' | 'read' | 'update' | 'delete'

`id` must be supplied when the method is 'read', it's the ID of the thing you want to read

`modelType` must be supplied when the method isn't read. This is the thing you're dealing with

`model` the model, as a JavaScript object

`success` a callback function called when the request completes successfully

#### Example
```javascript
myApp.sync({
	method: 'create',
	modelType: 'task',
	model: model,
	callback: function(response) {
		//do something with the response
	}
});
```

Note that the file uses JSON, so if you're targeting older (<IE9) browsers, you'll want to include a JSON shim. See testPage.html for an example.

## Middle
The .htaccess file takes the URL as created by sync.js, jiggles it about and passes it on to rest.php

The .htaccess should be in the same directory (or higher) as rest.php. If you have an .htaccess file furter up in your directory, you can incorporate these rules into that file.


## Back End
rest.php takes the data and passes it to the appropriate function based on what model and CRUD operation you sent through.