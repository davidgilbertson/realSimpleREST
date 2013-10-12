/* 
 * A function for working with a rest server.
 * Accepts an object with the following properties
 *
 * method: 'create' | 'read' | 'update' | 'delete'
 * id: must be supplied when the method is 'read'
 * modelType: must be supplied when the method isn't read. Defines the endpoint of the URL. e.g. 'user' | 'taskItem'
 * model: the model object
 * callback: a callback function called when the request completes
 *
 */

var myApp = myApp || {};

myApp.sync = function(opt) {
  var xhr = new XMLHttpRequest();
  
  if (opt.method === 'create') {
    xhr.open('POST', 'rest/' + opt.modelType, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState != 4 || xhr.status != 200) { return; }
      if (opt.callback) {
        opt.callback(JSON.parse(xhr.responseText));
      }
    }
    xhr.send(JSON.stringify(opt.model));
  }
  
  if (opt.method === 'read') {
    xhr.open('GET', 'rest/' + opt.modelType + '/' + opt.id, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState != 4 || xhr.status != 200) { return; }
      if (opt.callback) {
        opt.callback(JSON.parse(xhr.responseText));
      }
    }
    xhr.send();
  }
  
  if (opt.method === 'update') {
    xhr.open('PUT', 'rest/' + opt.modelType, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState != 4 || xhr.status != 200) { return; }
      if (opt.callback) {
        opt.callback(JSON.parse(xhr.responseText));
      }
    }
    xhr.send(JSON.stringify(opt.model));
  }
  
  if (opt.method === 'delete') {
    xhr.open('DELETE', 'rest/' + opt.modelType, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState != 4 || xhr.status != 200) { return; }
      if (opt.callback) {
        opt.callback(JSON.parse(xhr.responseText));
      }
    }
    xhr.send(JSON.stringify(opt.model));
    
  }
};