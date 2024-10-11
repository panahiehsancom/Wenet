 
<!DOCTYPE html>
<html>
<body>


  Select image to upload:
  <input type="file" name="files[]" id="media_info" accept=".png,.gif,.jpg, .pdf,.wav, .mp3, .mp4, .mpg, .mov, .wmv,.svg, .bmp,  .psd, .ai, .pages, .flv, .f4l, .qt">
  <input type="submit" value="Upload Image" name="submit"  onclick="uploadFiles()">


<script>

var file = document.getElementById('media_info');

file.onchange = function(e) {
  var ext = this.value.match(/\.([^\.]+)$/)[1];
  switch (ext) {
    case 'png':
    case 'gif':
    case 'jpg': 
	case 'wav':
	case 'mp3':
	case 'mp4':
	case 'mpg':
	case 'mov':
	case 'wmv':
	case 'svg':
	case 'bmp':
	case 'ai':
	case 'pages':
	case 'flv':
	case 'f4l':
	case 'qt': 
      alert('Allowed');
      break;
    default:
      alert('Not allowed');
      this.value = '';
  }
};


async function uploadFiles() {
  try {
    const files = document.getElementById("file").files; 
    if (!files.length) {
      throwError("Please select a file.");
      return;
    }
 
  } catch (error) {
    console.log(error);
    throwError("Error from server.");
  }
}
</script>

</body>
</html>

 