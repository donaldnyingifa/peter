// JavaScript Document

class Bug {
   constructor (
	title, description,projecttitle,supervisor,priority,status,screenshot,comment) {
	  this.title = title;
   	  this.description = description;
	  this.projecttitle = projecttitle;
	  this.supervisor = supervisor;
	  this.priority = priority;
	  this.status = status;
	  this.screenshot = screenshot;
	  this.comment = comment;
	  
  }
}

let bug = new Bug("login","lets me without pass", "Afridash","Richard","High","new","n/a","none" );



class Engineer{
	constructor(name,mybugs){
		this.name = name;
	}
	
}


class softwareTester extends Engineer{
	constructor(name,mybugs){
		super (name, mybugs);
	}
	
}