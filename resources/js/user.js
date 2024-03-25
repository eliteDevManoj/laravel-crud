import useUserStore from "./stores/userStore";

const userStore = useUserStore

$('#myTable').DataTable()

$('#btn-create-user').on('click', async () => {
    let userName = $('#user-name').val()
    let userEmail = $('#user-email').val()

    let data = {
        name: userName,
        email: userEmail
    }

    try {
        let res = await userStore.create(data)

        if(res.data.data){

            toastr.success('user created successfully!')
        }
    }
    catch(error){

        toastr.error(error)
    }
})
