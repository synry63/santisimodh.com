<style>

body{
	background: #FFF;
	font-family:"Times New Roman", Times, serif;
	color:#000000;
	margin:0px;
	padding:0px;
}

dl dd{
	margin-right:40px;
}

table th{
	text-align:left;
}

a{
	transition:all 0.5s;
}

a,a:visited{
	cursor:pointer;
	text-decoration:none;
	color:#000000;
}

ul, li, h1, h4{
	margin:0px;
	padding:0px;
	list-style:none;
}

.clear{
	clear:both !important;
}

.right{
	float:right;
}

.left{
	float:left;
}

hr{
	border:solid 1px #CCC;
}

.red{
	color:RED !important;
}

div.adminsTransTitle a.adminsTransTitleLink{
	color:#FFFFFF;
}
div.adminsTransTitle a.adminsTransTitleLink:hover {
	background-color:#FFFFFF;
	color:#000000;
}
div.adminsTransTitle .standartFormular {
	border:solid 1px #000000;
	background-color:#000000;
}

table.listing {
	background-color:#003366;
	color:#FFFFFF;
	width:95%;
	margin:5px;
	padding:3px;
	-moz-border-radius:10px;
}
table.listing thead {
	background-color:#FFFFFF;
	color:#000000;
	-moz-border-radius:5px;
	text-align:center;
	margin-bottom:5px;
}
table.listing tbody td{
	text-align:left;
	padding:3px;
}
.sec {
	background-color:#003388;
}
table.listing tbody tr:hover{
	background:#003399;
	border:solid 1px #000000;
}
table.listing a:link {
	color:#FFFFFF;
	text-decoration:none;
	display:block;
}
table.listing a:visited {
	color:#FFFFFF;
	text-decoration:none;
	display:block;
}
a.alpha {
	filter:alpha(opacity=80);
	-moz-opacity:0.8;
	-khtml-opacity: 0.8;
	opacity: 0.8;
}

div.page{
	margin:0px auto;
	width:1000px;
	display:none;
}

div.content{
	clear:both;
	background:#e6e6e6;
	border:#b3b3b3 solid 1px;
	padding:5px;
	width:100%;
}

div.body{
	padding:5px;
	border-radius:2px;
	background:#FFF;
	border:1px solid #B3B3B3;
}

div.body + div.body{
	margin:0px;
	margin-top:20px;
}


div.footer{
	clear:both;
	display:block;
}

div.loading{
	position:absolute;
	top:200px;
	left:50%;
}

ul.content-position {
	height:192px;
	display:block;
	width:783px;
}

ul.content-position li{
	float:left;
	display:block;
	width:170px;
	margin-right:20px;
}

ul.content-position p{
	font-weight:bold;
}

ul.content-position span{
	display:inline-block;
	padding:30px 10px;
	margin:0px;
}

ul.content-position li.content3 span:last-child,
ul.content-position li.content1 span:first-child{
	border:solid 1px #000;
	border-left:none;
}
ul.content-position li.content3 span:first-child,
ul.content-position li.content1 span:last-child{
	border:none;
	box-shadow:inset 3px 0px 3px #000;
}

ul.content-position li.content4 span:last-child,
ul.content-position li.content2 span:first-child{
	border:solid 1px #000;
	border-top:none;
	display:block;
	padding:10px 10px;
}
ul.content-position li.content4 span:first-child,
ul.content-position li.content2 span:last-child{
	border:none;
	box-shadow:inset 0px 3px 3px #000;
	display:block;
	margin-top:2px;
	padding:10px 10px;
}
ul.content-position li.content4 span:first-child{
	box-shadow:inset 0px -3px 3px #000;
}
ul.content-position li.content4 span:last-child{
	border:solid 1px #000;
	border-bottom:none;
	margin-top:3px;
}
ul.content-position li.content3 span:last-child{
	border:solid 1px #000;
	border-right:none;
}

ul.content-position li.content3 span:first-child{
	box-shadow:inset -3px 0px 3px #000;
}

ul.paginator {
	height:14px;
}	

ul.paginator li{
	float:left;
	display:block;
	padding:5px;
}
ul.paginator li.active a{
	font-weight:bold;
}

</style>
<?
include('header.php');
include('menu.php');
include('box.php');
include('content.php');
include('catalog.php');
include('form.php');
include('table.php');
include('footer.php');
?>