<style>
div.catalog ul.chain{
	display:block;
	height:20px;
}

div.catalog ul.chain li{
	float:left;
	list-style:square;
}
div.catalog ul.chain li a{
	display:block;
	padding:2px;
	font-size:12px;
	padding-right:20px;
}

div.catalog div.menu ul li,
div.catalog div.products ul li{
	border-radius:5px;
	border:#000 solid 1px;
	width:100px;
	margin:10px;
}

div.catalog div.menu ul li a,
div.catalog div.products ul li a{
	margin-bottom:0px;
	margin-top:0px;
	width:100%;
	display:block;
	text-align:center;
	padding:2px;
	font-size:10px;
}

div.catalog div.menu ul li a:hover,
div.catalog div.products ul li a:hover{
}

div.catalog div.menu ul li a:first-child,
div.catalog div.products ul li a:first-child{
	border-radius:5px 5px 0px 0px;
	height:30px;
	font-size:12px;
}

div.catalog div.menu ul li a:last-child,
div.catalog div.products ul li a:last-child{
	border-radius:0px 0px 5px 5px;
}

div.catalog div.menu ul li a.edit,
div.catalog div.menu ul li a.edit:hover,
div.catalog div.products ul li a.edit,
div.catalog div.products ul li a.edit:hover{
	position:absolute;
	background:none;
	height:15px;
	border:none;
	margin-top:-40px;
}
div.catalog div.menu ul li a.edit:hover{
	color:#F00;
}
div.catalog div.products ul li a.edit{
	color:#000;
}
div.catalog div.products ul li a.edit:hover{
	color:#F00;
}

div.catalog div.products{
	clear:both;
}

div.catalog div.products ul{
	display:block;
}
div.catalog div.products ul li{
	float:left;
}

div.catalog div.products ul li a img{
	width:25px;
	height:25px;
	display:block;
}

div.catalog div.products ul li a span.description{
	display:none;
}

div.catalog form{
	margin:10px;
}

div.catalog form.images div{
	float:left;
	margin:10px;
}
div.catalog form.images div img{
	height:100px;
}
div.catalog form.images div div{
	float:none;
	margin:0px;
}
div.catalog div.clear{
	clear:both;
}
</style>