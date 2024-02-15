<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    /* The switch - the box around the slider */
.switch {
  /* Variables */
 --switch_width: 2em;
 --switch_height: 1em;
 --thumb_color: #e8e8e8;
 --track_color: #e8e8e8;
 --track_active_color: #888;
 --outline_color: #000;
 font-size: 17px;
 position: relative;
 display: inline-block;
 width: var(--switch_width);
 height: var(--switch_height);
}

/* Hide default HTML checkbox */
.switch input {
 opacity: 0;
 width: 0;
 height: 0;
}

/* The slider */
.slider {
 box-sizing: border-box;
 border: 2px solid var(--outline_color);
 position: absolute;
 cursor: pointer;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background-color: var(--track_color);
 transition: .15s;
 border-radius: var(--switch_height);
}

.slider:before {
 box-sizing: border-box;
 position: absolute;
 content: "";
 height: var(--switch_height);
 width: var(--switch_height);
 border: 2px solid var(--outline_color);
 border-radius: 100%;
 left: -2px;
 bottom: -2px;
 background-color: var(--thumb_color);
 transform: translateY(-0.2em);
 box-shadow: 0 0.2em 0 var(--outline_color);
 transition: .15s;
}

input:checked + .slider {
 background-color: var(--track_active_color);
}

input:focus-visible + .slider {
 box-shadow: 0 0 0 2px var(--track_active_color);
}

/* Raise thumb when hovered */
input:hover + .slider:before {
 transform: translateY(-0.3em);
 box-shadow: 0 0.3em 0 var(--outline_color);
}

input:checked + .slider:before {
 transform: translateX(calc(var(--switch_width) - var(--switch_height))) translateY(-0.2em);
}

/* Raise thumb when hovered & checked */
input:hover:checked + .slider:before {
 transform: translateX(calc(var(--switch_width) - var(--switch_height))) translateY(-0.3em);
 box-shadow: 0 0.3em 0 var(--outline_color);
}
.containerpage {
 
 --color: #E1E1E1;
 background-color: #F3F3F3;
 background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
     linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
 background-size: 55px 55px;
}
.background{
    background-color:rgba(225, 225, 226, 0.323);;
}
.bordercustum{
    border-left: 1.5px solid black;
    border-right: 1.5px solid black;
}
</style>
<body class="h-screen flex flex-col containerpage" >
    <nav class="bg-gray-200 shadow shadow-gray-300 w-100 px-8 md:px-auto ">
	<div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">

		<div class="text-indigo-500 md:order-1">
	
        <img width="48" height="48" src="https://img.icons8.com/fluency/48/mailing.png" alt="mailing"/>
		</div>
		<div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
			<ul class="flex font-semibold justify-between">
             
            <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Dashbord">Dashboard</a></li>
                    <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Ressources">Resources</a></li>
                    <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Workspace">Workspace</a></li>
                    <li class="md:px-4 md:py-2 text-indigo-500"><a href="/Management">Management</a></li>
			</ul>
		</div>
		<div class="order-2 md:order-3">
			<button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-gray-50 rounded-xl flex items-center gap-2">
      
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span>Logout</span>
            </button>
		</div>
        
	</div>
</nav>
<div class="flex-1 flex border w-full">
<div class=" w-1/3 border-r p-6 background rounded-md shadow-md bordercustum">
    <h2 class="text-xl font-bold mb-4 border-b pb-2 text-gray-800">Available Roles</h2>
    <ul>
        <li onclick="createrole()" class="mb-2 flex items-center hover:bg-gray-100 rounded-md p-2 cursor-pointer">
            <div class="mr-2 p-2 bg-blue-500 text-white rounded-full">
                <!-- You can customize the icon or add an SVG for a "Create new role" button -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 110-2 1 1 0 010 2zm8 4a1 1 0 11-2 0 1 1 0 012 0zM10 5a1 1 0 100 2 1 1 0 000-2zM2 7a1 1 0 011-1h2v10a1 1 0 01-2 0V8H2a1 1 0 01-1-1V2a1 1 0 011-1h9a1 1 0 011 1v2h5a1 1 0 110 2h-5v6a1 1 0 11-2 0V8H3a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            Create new role
        </li>
        
        @foreach($roles as $role)
        <li onclick="getPermissions('{{ $role }}')" class="mb-2 hover:bg-gray-100 rounded-md p-2 cursor-pointer" style="background: linear-gradient(to right, #a6c0fe, #f68084); border-radius: 0.375rem;"
>
            {{ $role }}
        </li>
    @endforeach
    </ul>
</div>
<div class="mb-8 h-screen overflow-y-auto w-2/3 p-6 background rounded-md shadow-md userssection bordercustum">
    <h2 class="text-xl font-bold mb-4 border-b pb-2 text-gray-800">Available Users</h2>
    <table class="w-full">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-r border-gray-300">Email</th>
                <th class="py-2 px-4 border-b border-gray-300">Role</th>
                <th class="py-2 px-4 border-b border-gray-300">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr onclick="userselected({{ $user->id }})" class="cursor-pointer hover:bg-gray-100">
                    <td class="py-3 px-4 border-b border-r border-gray-300">{{ $user->email }}</td>
                    <td class="py-3 px-4 border-b border-gray-300 userrole userrole{{ $user->id }}"></td>
                    <td class="py-3 px-4 border-b border-gray-300 flex justify-center items-center">
    <button onclick="deleteuser({{ $user->id }})"
            class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline-red active:bg-red-800">
        Delete
    </button>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="hidden mb-8 h-full w-2/3 p-6 background rounded-md shadow-md permissionsection bordercustum">
    <div>
        <h2 class="text-xl font-bold mb-4 border-b pb-2 text-gray-800">Create New Role</h2>
        <input type="text" id="roleName" placeholder="Role Name" class="border p-2 mb-4 w-full rounded-md">
    </div>
    <h2 class="text-xl font-bold mb-4 border-b pb-2 text-gray-800">Available Permissions</h2>
    <ul>
        @foreach($permissions as $permission)
            <li class="flex items-center mb-2 gap-6">
                <label class="switch">
                    <input type="checkbox" class="permission-checkbox" value="{{ $permission }}">
                    <span class="slider"></span>
                </label>
                <span>{{ $permission }}</span>
            </li>
        @endforeach
    </ul>

    <button id="createRoleBtn" class="bg-blue-500 text-white px-4 py-2 rounded self-end mt-4 cursor-pointer">Create Role</button>
</div>
<div class="hidden permissionofrole mb-8 h-full w-2/3 p-6 background rounded-md shadow-md">
    <h2 class="text-xl font-bold mb-4 border-b pb-2 text-gray-800">Permissions for Selected Role</h2>
    <ul id="permissionsList" class="list-disc pl-6">
        <!-- Permissions will be dynamically added here -->
    </ul>
    <button onclick="DeleteRole()" class="w-1/2 m-auto bg-red-600 text-black text-center rounded-xl h-12 font-mono text-lg ">Delete Role</button>
</div>

</body>
<script>
    function createrole() {
    var permissionSection = document.querySelector(".permissionsection");
    if (permissionSection.style.display === "none" || permissionSection.style.display === "") {
        permissionSection.style.display = "block";
        document.querySelector('.permissionofrole').classList.add('hidden')
    } else {
        permissionSection.style.display = "none";
    }
}

    document.getElementById('createRoleBtn').addEventListener('click', function () {
        
        // Get role name from the input
        var roleName = document.getElementById('roleName').value;

        // Get selected permissions
        var selectedPermissions = [];
        var checkboxes = document.querySelectorAll('.permission-checkbox:checked');

        checkboxes.forEach(function (checkbox) {
            selectedPermissions.push(checkbox.value);
        });
        
        // Send the data to your Laravel backend using AJAX or any preferred method
        // Example using fetch and FormData
        console.log(roleName,selectedPermissions)
        fetch('/create-role', {
            method: 'POST',
            headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    },
            body: JSON.stringify({
                roleName: roleName,
                permissions: selectedPermissions,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response (e.g., show success message)
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
        
    });
</script>
<script>
    var roleclickled ;
    function getPermissions(role) {
        const permissionsList = document.getElementById('permissionsList');
        roleclickled = role;
        // Fetch request to get permissions for the selected role
        fetch('/get-role-permissions', {
            method: 'POST', // Adjust the HTTP method as needed
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ role: role }),
        })
        .then(response => response.json())
        .then(data => {
            // Clear previous permissions
            permissionsList.innerHTML = '';

            // Display the permissions
            data.permissions.forEach(permission => {
                const listItem = document.createElement('li');
                listItem.textContent = permission;
                permissionsList.appendChild(listItem);
            });

            // Show the permissions div
            document.querySelector('.permissionofrole').classList.remove('hidden');
            document.querySelector('.permissionsection').classList.add('hidden')
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    function userselected(id){

        if(roleclickled){
            console.log(id)      
            fetch('/assignrole', {
            method: 'POST', // Adjust the HTTP method as needed
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ role: roleclickled , id: id}),
        })
        .then(response => response.json())
        .then(data => {
            document.querySelector(`.userrole${id}`).textContent = roleclickled
        })
        .catch(error => {
            console.error('Error:', error);
        });
        }else
            console.log("no role")
    }
    function DeleteRole(){
        console.log(roleclickled)
    }
    function deleteuser(userId) {
    // Assuming you're using Laravel and the csrf_token() helper function
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch(`/delete-user/${userId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error deleting user: ${response.statusText}`);
        }
        console.log('User deleted successfully');
    })
    .catch(error => {
        console.error(error.message);
    });
}


</script>
</html>
