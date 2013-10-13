# Real Simple REST
A trio of files to make talking to a server easier.

For the less seasoned coders, think of it as a way to map a function in JavaScript to a function in PHP without having to worry about all the middle stuff.

This is for use with Apache/PHP servers. It'll work just fine out of the box, and the code is minimal so it's easy to mash it up and work into your own project.

To get started, put rest.js, rest.php, .htaccess and testPage.html all in the same directory and open testPage.html in your browser.

If you're the inpatient type, you can see it in action at http://kronia.com.au/dev/rest/testPage.html


## Front End
rest.js allows you to pass a model and a CRUD operation to a function and have the rest done automagically.

Accepts an object with the following properties

`method` 'create' | 'read' | 'update' | 'delete'

`id` must be supplied when the method is 'read', it's the ID of the thing you want to read

`modelType` must be supplied when the method isn't read. This is the type thing you're dealing with (e.g. a 'task')

`model` the model, as a JavaScript object

`callback` a callback function called when the request completes successfully

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
The .htaccess file takes the request as sent by rest.js, jiggles it about and passes it on to rest.php

The .htaccess should be in the same directory (or higher) as rest.php. If you have an .htaccess file further up in your directory, you can incorporate these rules into that file.


## Back End
rest.php takes the data and passes it to the appropriate function based on what model type (e.g. 'task') and CRUD operation (e.g. 'create') you sent through.