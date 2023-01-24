
import Api from '../api/api'
import {Contact} from "../types/types";

export default {
    async add(name,email,text){
        const response = await Api().post('contact',{name:name,email:email,text:text})
        return response.data.data.contact;
    },

    async getAll(){
        const response = await  Api().get('contact');
        return response.data.data.contacts
    },
    async getById(id){
        const response = await Api().get(`contact/${id}`)
        return response.data.data.contact;
    },
    async delete(contact:Contact){
        const response = await Api().delete(`contact${contact.id}`)
        return response.data.success
    }
}
