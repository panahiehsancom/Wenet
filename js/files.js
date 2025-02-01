
async function uploadFiles() {
   
      const files = document.getElementById("media_info").files;
      
      if (!files.length) {
      
        return;
      }
   
      for (const file of files) {
        // create form data
        const formData = new FormData();
        formData.append("file", file); 
        formData.append("path1", [file.name]);
        formData.append("type", "upload");
        let response = await axios.post("upload.php", formData);
        if (response.data.response === "succeed") {
         console.log("Success to UPLOAD");
   
        } else {
            console.log("Failed to UPLOAD");
        }
      } 
  }