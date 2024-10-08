// function showPlaceholder(inputElement,addlabel) {
//     const originalValue = inputElement.getAttribute('original-value');
//     //clear value if input matches original value, display placeholder
//     if (inputElement.value === originalValue || inputElement.value === '') {
//         inputElement.value = '';
//         if(addlabel){
//             inputElement.setAttribute('placeholder',addlabel+":\t\t"+originalValue);
//         }else{
//         inputElement.setAttribute('placeholder',originalValue);
//         }
//     }
// }
function showPlaceholder(inputElement, addLabel) {
  const originalValue = inputElement.getAttribute('original-value');

  // Define the padding based on the length of the addLabel
  const padding = "\t".repeat(3 - Math.floor((addLabel || "").length / 3));

  // Clear value if input matches original value, display placeholder
  if (inputElement.value === originalValue || inputElement.value === '') {
    inputElement.value = '';
    if (addLabel) {
      inputElement.setAttribute('placeholder', addLabel + ":" + padding + originalValue);
    } else {
      inputElement.setAttribute('placeholder', originalValue);
    }
  }
}

function hidePlaceholder(inputElement) {
    inputElement.setAttribute('placeholder', '');
    //show the original value if the user didn't type anything
    if (inputElement.value === '') {
        inputElement.value = inputElement.getAttribute('original-value');
    }
}
