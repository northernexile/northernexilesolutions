
import Api from '../api/api'

export default {
    async getAll(){
        const response = await Api().get('pages')
        return response.data.data.page;
    },

    async getById(id:any){
        const response = await Api().get(`pages/${id}`)
        return response.data.data.page
    }
}
