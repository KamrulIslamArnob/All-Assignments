<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css">
</head>

<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Hey! Admin.</h1>
        <div class="flex mb-5">
            <button id="add-new" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                New</button>
        </div>
        <div class="container mx-auto mt-10">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody id="user-table">
                 
                </tbody>
            </table>
        </div>
    </div>


    <div id="add-user-form" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-80">
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-4 rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-2">Add New User</h2>
            <input type="text" id="new-username" placeholder="Username" class="mb-2 px-2 py-1 border">
            <input type="text" id="new-email" placeholder="Email" class="mb-2 px-2 py-1 border">
            <select id="new-role" class="mb-2 px-2 py-1 border">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <button id="save-new-user"
                class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-1 px-2 rounded">Save</button>
            <button id="cancel-new-user"
                class="bg-gray-500 hover-bg-gray-700 text-white font-bold py-1 px-2 rounded">Cancel</button>
        </div>
    </div>

    <script>

function saveDataToJSON(data) {
    fetch('update_data.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(responseData => {
        if (responseData.success) {
            console.log('Data saved successfully');
        } else {
            console.error('Error saving data:', responseData.error);
        }
    })
    .catch(error => console.error('Error saving data:', error));
}


function initializeUserData() {
    const userTable = document.getElementById('user-table');
    let data = localStorage.getItem('userData');
    if (!data) {
       
        fetch('registration_data.json')
            .then(response => response.json())
            .then(jsonData => {
                data = jsonData;
              
                localStorage.setItem('userData', JSON.stringify(data));
            })
            .catch(error => console.error('Error fetching JSON data:', error));
    } else {
        data = JSON.parse(data);
    }

    
    userTable.innerHTML = '';
    data.forEach(user => {
        const newRow = createUserRow(user);
        userTable.appendChild(newRow);
    });
}


function fetchUserData() {
    fetch('registration_data.json')
        .then(response => response.json())
        .then(data => {
            const userTable = document.getElementById('user-table');
            userTable.innerHTML = ''; 

            data.forEach(user => {
                const newRow = createUserRow(user);
                userTable.appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching JSON data:', error));
}


function createUserRow(user) {
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td class="border px-4 py-2">${user.username}</td>
        <td class="border px-4 py-2">${user.email}</td>
        <td class="border px-4 py-2">
            <span class="role-text">${user.role}</span>
            <button class="edit-button bg-blue-500 hover-bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button>
        </td>
        <td class="border px-4 py-2">
            <button class="delete-button bg-red-500 hover-bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
        </td>
    `;


    const editButton = newRow.querySelector('.edit-button');
    const deleteButton = newRow.querySelector('.delete-button');

    editButton.addEventListener('click', () => {
        const roleText = newRow.querySelector('.role-text');
        const newRole = prompt('Change role to User or Admin:');
        if (newRole !== null && (newRole === 'User' || newRole === 'Admin')) {
           
            roleText.textContent = newRole;

            
            const username = newRow.querySelector('td').textContent;

          
            fetch('registration_data.json')
                .then(response => response.json())
                .then(data => {
                    const userIndex = data.findIndex(user => user.username === username);
                    if (userIndex !== -1) {
                        data[userIndex].role = newRole;

                    
                        saveDataToJSON(data);
                    }
                })
                .catch(error => console.error('Error fetching JSON data:', error));
        }
    });

    deleteButton.addEventListener('click', () => {
        const username = newRow.querySelector('td').textContent;

        if (confirm(`Are you sure you want to delete the user "${username}"?`)) {
     
            fetch('registration_data.json')
                .then(response => response.json())
                .then(data => {
               
                    const index = data.findIndex(user => user.username === username);
                    if (index !== -1) {
                        data.splice(index, 1);

                      
                        saveDataToJSON(data);
                    }
                })
                .catch(error => console.error('Error fetching JSON data:', error));
        }
    });

    return newRow;
}

initializeUserData();


const addUserForm = document.getElementById('add-user-form');
const addNewButton = document.getElementById('add-new');
const saveNewUserButton = document.getElementById('save-new-user');
const cancelNewUserButton = document.getElementById('cancel-new-user');
addNewButton.addEventListener('click', () => {
    addUserForm.style.display = 'block';
});
cancelNewUserButton.addEventListener('click', () => {
    addUserForm.style.display = 'none';
});
saveNewUserButton.addEventListener('click', () => {
   
    const newUsername = document.getElementById('new-username').value;
    const newEmail = document.getElementById('new-email').value;
    const newRole = document.getElementById('new-role').value;

   
    const newUser = {
        username: newUsername,
        email: newEmail,
        role: newRole,
    };

   
    fetch('registration_data.json')
        .then(response => response.json())
        .then(data => {
          
            data.push(newUser);

    
            saveDataToJSON(data);

        
            const userTable = document.getElementById('user-table');
            const newRow = createUserRow(newUser);
            userTable.appendChild(newRow);

            document.getElementById('new-username').value = '';
            document.getElementById('new-email').value = '';
            document.getElementById('new-role').value = 'User';
            addUserForm.style.display = 'none';
        })
        .catch(error => console.error('Error fetching JSON data:', error));
});

    </script>
</body>

</html>