const useHelperStore = {
    handleError(errors) {
        for(let key in errors) {
            if(errors[key].length > 0) {
                toastr.error(errors[key][0])
            }
        }
    }
}

export default useHelperStore;