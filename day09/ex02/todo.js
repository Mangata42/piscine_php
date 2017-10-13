var todo_name;

var todo_id = 0;

function prompt_todo()
{
	todo_name = prompt("New todo: ");
	if (todo_name.length != 0)
		add_todo();
}

function add_todo()
{
	todo_name = "  --> " + todo_name + " <--";
	var node = document.createElement("DIV");
	node.appendChild(document.createTextNode(todo_name));
	node.setAttribute("onclick", "delete_todo(this.id)");
	node.setAttribute("id", "list_" + todo_id);
	var the_list = document.getElementById("ft_list");
	the_list.insertBefore(node, the_list.childNodes[0]);
	todo_id++;
	save_to_cookie();
}

function delete_todo(todo_id_to_del)
{
	var r = confirm("You really want to delete that?");
	if (r == true)
	{
		var item = document.getElementById(todo_id_to_del);
		item.parentNode.removeChild(item);
	}
}

function save_to_cookie()
{
	
}