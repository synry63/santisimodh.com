<style>

div.menu{
	background:#e6e6e6;
	width:100%;
	border:#b3b3b3 solid 1px;
	padding:5px;
	margin-bottom:20px;
}

div.menu>ul{
	display:block;
	height:35px;
	background-color:#f2f2f2;
	width:100%;
	border:solid 1px #999999;
}

div.menu ul li{
	float:left;
}
div.menu ul li:last-child{
	float:right;
}
div.menu ul li:last-child a{
	border-left:solid 1px #999999;
	border-right:none;
}

div.content div.navigation select option,
div.content div.navigation ul li a,
div.menu ul li a{
	display:block;
	text-align:center;
	color:#999999;
	background-color:#f2f2f2;
	padding:7px 5px 0px 5px;
	height:28px;
	font-variant:small-caps;
	min-width:120px;
	border-right:solid 1px #999999;
}
div.menu a:hover,
div.menu a.active{
	background-color:#FFF;
}

div.menu ul li ul{
	position:absolute;
	display:none;
}
div.menu ul li:hover ul{
	display:block;
}
div.menu ul li:hover ul li{
	float:none;
}

div.content div.navigation{
	float:left;
}

div.content div.navigation ul{
	display:block;
	width:200px;
	background:#FFF;
	margin-bottom:20px;
	border:solid 1px #999;
	border-bottom:none;
}

div.content div.navigation ul li a{
	border:none;
	text-align:left;
	border-bottom:1px solid #999;
}
div.content div.navigation ul li a:hover{
	background:#FFF;
}
div.content div.navigation ul li a.active{
	background-color:#F00;
	color:#FFF;
}
div.content div.navigation select{
	width:100%;
}
div.content div.navigation select option{
	border-bottom:1px solid #999999;
	text-align:left;
}

</style>