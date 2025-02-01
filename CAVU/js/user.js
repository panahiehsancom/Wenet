
let user =
{
    id: 1,
    username: "",
    password: "",
    name: "",
    family: "",
    email: "",
};

async function register_user() { 

    const user = {
        name: document.getElementById('first_name').value,
        family: document.getElementById('last_name').value,
        username: document.getElementById('email').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
    };
    const formData = new FormData();
    formData.append("user_info", JSON.stringify(user));
    const response = await axios.post("userdb.php?action=create", formData);
    const output_reg = response.data;
    if(output_reg.response.valid)
    {
        window.location.href = 'app.php';
    }
    else{
        console.log('failed!');
    }
}

async function login() { 

    const user = { 
        username: document.getElementById('email').value, 
        password: document.getElementById('password').value,
    };
    const formData = new FormData();
    formData.append("user_info", JSON.stringify(user));
    const response = await axios.post("userdb.php?action=login", formData);
    const output_reg = response.data;
    if(output_reg.response.valid)
    {
        window.location.href = 'app.php';
    }
    else{
        console.log('failed!');
    }
}
