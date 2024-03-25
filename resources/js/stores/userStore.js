import useHelperStore from "../helper"

const helperStore = useHelperStore

const useUserStore = {

    create(data) {
        return new Promise((resolve, reject) => {
            axios.post(`${window.API_URL}/api/admin/create-user`, data)
            .then((response) => {
                resolve(response)
            })
            .catch((error) => {
                
                let errors = error.response.data.errors
                helperStore.handleError(errors)
            })
        })
    }
}

export default useUserStore