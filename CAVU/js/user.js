
let user =
{
    id: 1,
    username: "",
    password: "",
    name: "",
    family: "",
    email: "",
};

let geo_point =
{
    latitude: 0,
    longitude: 0,
};

let request =
{
    userid: "",
    description: "",
    points: [],
};
async function load_request(request_id) {

    const req = {
        requestid: request_id,
    };
    const formData = new FormData();
    formData.append("request_info", JSON.stringify(req));
    const response = await axios.post("userdb.php?action=get_vertices", formData);
    const data = response.data;
    const point_list = JSON.parse(data.json);
    const count = point_list.length;
    let triangleCoordsArr = [];
    for (let i = 0; i < point_list.length; i++) {
        triangleCoords = {};
         const lat = point_list[i].latitude;
         const lng = point_list[i].longitude;
         triangleCoords['lat'] = lat;
         triangleCoords['lng'] = lng;
         triangleCoordsArr.push(triangleCoords);
    }
    for (var i = 0; i < triangleCoordsArr.length; i++) {
        // Construct the polygon.
        var mTriangle = new google.maps.Polygon({
            paths: triangleCoordsArr[i],
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
        });
        mTriangle.setMap(map);
    }
}
async function load_all_user_request() {
    const response = await axios.post("userdb.php?action=load_requests", '{}');
    const data = response.data;
    const request_list = JSON.parse(data.json);
    const count = request_list.length;
    const element = document.getElementById("user_requests");
    for (let i = 0; i < request_list.length; i++) {
        const id = request_list[i].RequestID;
        const title = request_list[i].RequestTitle;
        const description = request_list[i].RequestDescription;
        const datetime = request_list[i].Date;
        const content = '<li class="field-item"><img src="images/field.webp"  alt="Field Image" class="circle"><div class="content"/>  <h5 class="title">' + title + '</h5> <p>' + description + '</p></div></li> ';
        element.innerHTML += content;
    }


    //user_requests
}
async function logout() {
    const response = await axios.post("userdb.php?action=logout", '{}');
    const output_reg = response.data;
    if (output_reg.response.valid) {
        window.location.href = 'login.php';
    }
    else {
        console.log('failed!');
    }
}
async function add_new_request() {
    const vertices = document.getElementById('vertices').value;
    const request =
    {
        userid: 'userid',
        title: 'title',
        description: 'description',
        points: [],
    };
    if (vertices.length > 0) {
        const points = vertices.split(")").filter(function (i) { return i });//remove empty
        for (let i = 0; i < points.length; i++) {
            let point = points[i];
            point = point.replace('(', '');
            point = point.replace(')', '');
            const gpoints = point.split(',').filter(function (i) { return i });//remove empty

            const geo_point =
            {
                latitude: gpoints[0],
                longitude: gpoints[1],
            };
            request.points.push(geo_point);
        }
    }
    json_request = JSON.stringify(request);
    const formData = new FormData();
    formData.append("request_info", json_request);
    const response = await axios.post("userdb.php?action=add_request", formData);
    const output_reg = response.data;
    if (output_reg.response.valid) {
        window.location.href = 'app.php';
    }
    else {
        console.log('failed!');
    }

}
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
    if (output_reg.response.valid) {
        window.location.href = 'app.php';
    }
    else {
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
    if (output_reg.response.valid) {
        window.location.href = 'app.php';
    }
    else {
        console.log('failed!');
    }
}

load_all_user_request();