<style>

form input,
form textarea,
form select,
a.button{
	border:1px #999 solid;
	padding:5px;
	color:#666;
	background-color:#FFF;
	border-radius:3px;
	margin:3px;
	display: inline-block;
}
a.button,
form input[type="submit"]{
	background-color:#f2f2f2;
}

form select,
form input[type="text"],
form input[type="file"],
form input[type="password"]{
	min-width:300px;
}

form dl dd img {
	width: 300px;
	border-radius: 3px;
}

form dl dd img + input[type=submit] {
	position: absolute;
	margin-left: -60px;
	opacity: 0.5;
	transition: opacity 0.5s;
}

form dl dd:hover img + input[type=submit] {
	opacity: 1;
}

form textarea{
	width:90%;
	padding:0px;
	min-height:100px;
}

form dl dt{
	padding-left:30px;
	min-width:150px;
	float:left;
	margin:5px;
}
form dl dd{
	margin-left:160px;
}
.date select {
    min-width: inherit;
    width: auto;
}

</style>