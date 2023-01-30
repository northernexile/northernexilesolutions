
import Api from '../api/api'
import {Contact} from "../types/types";

export default {
    async add(name,email,text){
        const response = await Api().post('contact',{name:name,email:email,text:text})
        return response.data.data.contact;
    },

    async update(id,name,email,text){
        const response = await Api().patch(`contact/${id}`,{name:name,email:email,text:text})
        return response.data.data.contact
    },

    async getAll(){
        return await Api().get('contact').then((response) => {
            return response.data.data.contacts
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`contact/${id}`).then((response)=>{
            return response.data.data.contact;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(contact:Contact){
        return  await Api().delete(`contact/${contact.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

