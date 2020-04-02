export default {
    name: "TheUserForm",

    template: `
    <section id="add-user-form">
        <form @submit.prevent="addUser">
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required placeholder="First name">
            </div>

            <div>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required placeholder="Last name">
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Password">
            </div>

            <div>
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" placeholder="Role">
            </div>

            <div>
                <input type="submit">
            </div>        
        </form>    
    </section>
    `,

    methods: {
        addUser() {
            //debugger;
            let url = "./admin/index.php?add_user=true",
                userData = new FormData(document.querySelector("form"));

                fetch(url, {
                    method: 'POST',
                    body: userData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.result == true) {
                        alert('added a new user!');
                    } else {
                        alert(`couldn't add user: ${data.result}`)
                    }
                })
                .catch((err) => console.error(err)
                );
        }
    }
}