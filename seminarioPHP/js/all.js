//validacion de registro
function validarApe(){
patt = /^\D*$/;
valor = document.getElementById("Apellido").value;
if (valor != ""){
	if (patt.test(valor)){
		return true;
	}else{
		alert("Apellido Solo Letras");
		return false;
	}
}else{
	alert("Campo Apellido vacio");
	return false;
}
}

function validarNom(){
patt = /^\D*$/;
valor = document.getElementById("Nombre").value;
if (valor != ""){
	if (patt.test(valor)){
		return true;
	}else{
		alert("Nombre Solo Letras, 6 Caracteres");
		return false;
	}
}else{
	alert("Campo Nombre vacio");
	return false;
}
}

function validarEma(){
patt = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var valor = document.getElementById("Email").value;
if (valor != ""){
	if (patt.test(valor)){
		return true;
	}else{
		alert("Email mal escrito");
		return false;
	}
}else{
	alert("Campo Email vacio");
	return false;
}
}

function validarUsu2(){
expre = /\w/;
valor = document.getElementById("Usuario").value;
if ( (valor!="") & (valor.length>=6) ){
	if (!patt.test(valor)){
		return true;
	}else{
		alert("Usuario mal escrito");
		return false;
	}
}else{
	alert("Campo Usuario vacio");
	return false;
}
}

function validarPass21(){
var mayusucla= /[A-Z]+/;
var miniscula = /[a-z]+/;
var caracespeciales= /[\^$.*@+?=!:|\\/()\[\]{}]+|[0-9]+/;
valor = document.getElementById("Pass").value;
if (mayusucla.test(valor) && miniscula.test(valor) && caracespeciales.test(valor)){
	return true;
}else{
	alert("ingresa una minuscula, una mayuscula y un char especial o un numero");
	return false;
}
}
function validarPass22(){
valor = document.getElementById("Pass").value;
valor2 = document.getElementById("Pass2").value;
if (valor == valor2){
	return true
}else{
	alert("Las contraseñas son diferentes");
	return false;
}
}
function validar(){
if (validarApe() && validarNom() && validarEma() && validarUsu2() && validarPass21() && validarPass22()){
	return true;
}else{
	return false;
}
}
//validacion de alta peli
function validarimagen(){
valor = document.getElementById("files").value;
if (valor.length == 0){
	alert("Seleccione una imagen");
	return false;
}
}
function validarnombre(){
valor = document.getElementById("nombre").value;
if (valor == ""){
	alert("Ingrese Nombre");
	return false;
}
}
function validargenero(){
valor = document.getElementById("genero").selectedIndex;
if (valor == "" || valor == 0){
	alert("Ingrese Genero");
	return false;
}
}
function validaranio(){
valor = document.getElementById("anio").selectedIndex;
if (valor == "" || valor == 0){
	alert("Ingrese Año");
	return false;
}
}
function validarsino(){
valor = document.getElementById("sino").value;
if (valor == ""){
	alert("Ingrese Sinopsis");
	return false;
}
}

function validarpeli(){
if(validarimagen()) && (validarnombre()) && (validargenero()) && (validaranio()) && (validarsino()){
		return true;
}else{
	return false;
}
}

function validarpeli2(){
if (validarnombre()){
	if (validarsino()){
		return true;
	}
}
return false;
}
//validacion de iniciar
function validarPass(){
valor = document.getElementById("pass").value;
if (valor == ""){
	alert("Ingrese valor en la contraseña");
	return false;
}
}
function validarUsu(){
valor = document.getElementById("usu").value;
if (valor == ""){
	alert("Ingrese valor en el Usuario");
	return false;
}
}
function validariniciar(){
	if (validarUsu() || validarPass()){
		return true;
}
}

function validarcomen(){
valor = document.getElementById("texto").value;
if (valor == ""){
	alert("Ingrese Comentario");
	return false;
}
}
