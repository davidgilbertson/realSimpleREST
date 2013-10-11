# Real Simple REST
A trio of files to make talking to a server easier.

It'll work just fine out of the box, but it's minimal code so it's easy for you to mash it up and work it into your project.


## Front End
sync.js allows you to simply pass a model and a CRUD operation to a function and have the rest done automagically.

Accepts an object with the following properties

`method` 'create' | 'read' | 'update' | 'delete'

`id` must be supplied when the method is 'read'

`modelType` must be supplied when the method isn't read. Defines the endpoint of the URL. e.g. 'user' | 'taskItem'

`model` the model object

`success` a callback function called when the request completes

#### Example
```javascript
myApp.sync({
	method: 'create',
	modelType: 'user',
	model: userModel,
	callback: function(response) {
		//do something with the response
	}
});
```

## Middle
The .htaccess file takes the URL as created by sync.js, jiggles it about and passes it on to rest.php

The .htaccess should be in the same directory (or higher) as rest.php. If you have an .htaccess file furter up in your directory, you can incorporate these rules into that file.


## Back End
rest.php takes the data and passes it to the appropriate function based on what model and CRUD operation you sent through.