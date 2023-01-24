
import Api from '../api/api'

export default {
    async add(name,email,text){
        const response = await Api().post('contact',{name:name,email:email,text:text})
        return response.data.data.contact;
    },

    async getAll(){
        const response = await  Api().get('contact');
        return response.data.data.contacts
    }
}
