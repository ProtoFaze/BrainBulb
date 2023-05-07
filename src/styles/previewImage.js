
  function previewImage() {
    var fileInput = document.getElementById('file_input');
    var previewImage = document.getElementById('preview-image');
    var file = fileInput.files[0];
    var reader = new FileReader();
  
    reader.onload = function(e) {
      previewImage.src = e.target.result;
      fileInput.value = e.target.result;
    }
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      previewImage.src = '../../images/anonymousUser.png';
      fileInput.value = '';
    }
  }
  