function search(data){
  if(!data){
    return -1;
  }

  var sizeOfArray = data.length;
  var incrementeLeftArray = 0;
  var incrementeRightArray = sizeOfArray - 1;
  var incrementeLoopWhile = 0;
  var totalWhileLoop = Math.floor(sizeOfArray/2);

  if((sizeOfArray%2) != 0){
    totalWhileLoop += 1;
  } 

  while(incrementeLoopWhile != totalWhileLoop) {

    if(incrementeLoopWhile > totalWhileLoop) {
      break;
    }
    
    if(!Number.isInteger(data[incrementeLeftArray])){
      return data[incrementeLeftArray];
    } else {
      incrementeLeftArray++;
    }

    if(!Number.isInteger(data[incrementeRightArray])){
      return data[incrementeRightArray];
    } else {
      incrementeRightArray--;
    }
    incrementeLoopWhile++;
  }
  return -1;
}
search([1,'e',2,3,4,5,6,7,8]);