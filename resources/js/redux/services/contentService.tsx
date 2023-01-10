
import Api from '../api/api'

export default {
    async getAll(){
        const response = await Api().get('content')
        return response.data.data.content;
    },

    async getById(id:any){
        const response = await Api().get(`content/${id}`)
        return response.data.data.content
    }
}
