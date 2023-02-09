import Api from "../api/api";

export default {
    async getAll(){
        return await Api().get('cv').then((response) => {
            return response.data.data.cv
        }).catch((error)=>{
            return error.response.data
        });
    },
}
