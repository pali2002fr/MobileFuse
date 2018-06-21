function firstAphanumeric(str){
  var i = 0;
  var regExp = /[a-zA-Z0-9]/;
  while(i<=str.length){
    var char = str.charAt(i);
    if(regExp.test( char )) {
      return char;
    }
    i++;
  }
  return false;
}
firstAphanumeric('=9876pali');