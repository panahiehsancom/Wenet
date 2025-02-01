let users = [
  {
    id: 1,
    username: "alireza",
    password: "",
    role: "admin",
    lastLogin: new Date().getFullYear(),
    status: true,
  },
  {
    id: 2,
    username: "amir1",
    password: "",
    role: "member",
    lastLogin: new Date().getFullYear(),
    status: false,
  },
];
let selectedUserIndex = null;

function openRemoveUserDialog(index) {
  selectedUserIndex = index; 
  backDrop.classList.add("showDialog");
  removeDialog.classList.add("showDialog");
    
    
}

function closeRemoveDialog() {
  selectedUserIndex = null;
  backDrop.classList.remove("showDialog");
  removeDialog.classList.remove("showDialog");
}

async function removeUser() {
  
  const user = users[selectedUserIndex];
  const formData = new FormData();
  formData.append("payload_data", JSON.stringify(user));
  const response = await axios.post("users.php?action=remove", formData); 
  const valid_update =  response.data;
		if(valid_update.response.valid)
		{
			closeEditDialog();
            getUsers();
		}
		else
			window.alert('no');  
  closeRemoveDialog();
}

function openEditUserDialog(index) {
  selectedUserIndex = index;
  document.getElementById("editUsername").value = users[index].username;
  document.getElementById("editStatus").checked = users[index].status;
  document.getElementById("editPassword").value = users[index].password;
  document.getElementById("editConfirmPassword").value = users[index].password;
  document.getElementById("editlastlogin").checked = users[index].lastLogin;
  backDrop.classList.add("showDialog");
  editDialog.classList.add("showDialog");
}

function closeEditDialog() {
  selectedUserIndex = null;
  backDrop.classList.remove("showDialog");
  editDialog.classList.remove("showDialog");
}

async function editUser() {
  const user = {
    id: users[selectedUserIndex].id,
    username: document.getElementById("editUsername").value,
    password: document.getElementById("editPassword").value,
    status: document.getElementById("editStatus").checked?1:0,
    role: document.getElementById("editUserRole").value,
    lastLogin: document.getElementById("editlastlogin").value,
  };
  const formData = new FormData();
  formData.append("payload_data", JSON.stringify(user));
  const response = await axios.post("users.php?action=update", formData); 
  const valid_update =  response.data;
		if(valid_update.response.valid)
		{
			closeEditDialog();
            getUsers();
		}
		else
			window.alert('no');  
  

}
async function createUser()
{ 
 const user = { 
    username: document.getElementById("txt_username").value,
    password: document.getElementById("txt_password").value,
    status: 1,
    role: document.getElementById("cmb_UserRole").value,
    lastLogin: '',
  };
    
  const formData = new FormData();
  formData.append("payload_data", JSON.stringify(user));
  const response = await axios.post("users.php?action=create", formData); 
  const valid_update =  response.data;
  if(valid_update.response.valid)
	{
		closeEditDialog();
        getUsers();
	}
	else
		window.alert('no');  
  getUsers();
}
async function getUsers() {
	try{
	const response = await axios.get("users.php?action=getlist"); 
	const action_response =  response.data;	
	users	 = action_response.response_array;
	renderUsers();
	}catch(error)
	{
		console.log(error);
	}
}
getUsers();
function renderUsers() {
  if (!users.length) return;
  const usersTable = document.getElementById("usersTable");
  let tableRows = `
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Role</th>
      <th>Status</th>
      <th>Last Login</th>
      <th>Action</th>
    </tr>
    `;

  for (let i = 0; i < users.length; i++) {
    const user = users[i];
    tableRows += `
      <tr>
        <td>${user.id}</td>
        <td>${user.username}</td>
        <td>${user.role}</td>
        <td>
          ${
            user.status
              ? `<div class="chip chipSuccess"><i class="fa fa-check"></i> active</div>`
              : `<div class="chip chipError"><i class="fa fa-times"></i> inactive</div>`
          }
        </td>
        <td class="tableDate">${user.lastLogin}</td>
        <td>
          <a title="User logs"><i class="fa fa-book successColor"></i></a>
          <a title="Edit user" onclick="openEditUserDialog(${i})"><i class="fa fa-edit primaryColor"></i></a>
          <a title="Remove user" onclick="openRemoveUserDialog(${i})"><i class="fa fa-trash redColor"></i></a>
        </td>
      </tr>
    `;
  }
  usersTable.innerHTML = tableRows;
}
renderUsers();
