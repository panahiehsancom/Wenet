 
<!DOCTYPE html>
<html>
<head>
  <script src="js/files.js" ></script>
  <script src="js/axios.min.js" ></script>
</head>
<body>


Select image to upload:
<input type="file" name="files[]" id="media_info" multiple="multiple" accept=".png,.gif,.jpg, .pdf,.wav, .mp3, .mp4, .mpg, .mov, .wmv,.svg, .bmp,  .psd, .ai, .pages, .flv, .f4l, .qt">
<input type="submit" value="Upload Image" name="submit"  onclick="uploadFiles()">


<script>
var file = document.getElementById('media_info');

file.onchange = function(e) {
  var ext = this.value.match(/\.([^\.]+)$/)[1];
  switch (ext) {
  case 'png':
  case 'gif':
  case 'jpg': 
  case 'pdf': 
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

 
</script>

</body>
</html>

 