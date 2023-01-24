
import Api from '../api/api'

export default {
    async add(name,email,text){
        const response = await Api().post('contact',{name:name,email:email,text:text})
        return response.data.data.contact;
    },
}