var todo_name;
var todo_id;

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
	document.cookie = "list_" + todo_id + "=" + node.innerText;
	todo_id++;
}

function delete_todo(todo_id_to_del)
{
	var r = confirm("You really want to delete that?");
	if (r == true)
	{
		var item = document.getElementById(todo_id_to_del);
		item.parentNode.removeChild(item);
		document.cookie = todo_id_to_del + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	}
}

function load_cookies()
{
	regpatt = new RegExp("-->[\\sa-zA-Z0-9_-]*<--$")
	regpatt_2 = new RegExp("list_[0-9]+");
	l_cookies = document.cookie;
	if (l_cookies.length == 0)
	{
		todo_id = 0;
		console.log("No Cookies!");
	}
	else
	{
		console.log("Cookies! Hurray!");
		l_array = l_cookies.split(";");
		todo_id = l_array.length;
		id_backup = todo_id;
		for (i = 0; i < l_array.length; i++)
		{
   			str = l_array[i];
   			regres = regpatt.exec(str);
   			regres = regres[0];
   			list_index = regpatt_2.exec(str);
   			list_index = list_index[0];
   			var node_b = document.createElement("DIV");
			node_b.appendChild(document.createTextNode(regres));
			node_b.setAttribute("onclick", "delete_todo(this.id)");
			node_b.setAttribute("id", list_index);
			var the_list_b = document.getElementById("ft_list");
			the_list_b.insertBefore(node_b, the_list_b.childNodes[0]);
			console.log(node_b);
		}
	}
}