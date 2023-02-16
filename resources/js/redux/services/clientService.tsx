
import Api from '../api/api'
import {Client} from "../types/types";

export default {
    async add(client){
        const response = await Api().post('client',{
            name:client.name,
            email:client.email,
            phone:client.phone
        })
        return response.data.data.client;
    },

    async update(client){
        return await Api().patch(`client/${client.id}`,{
            name:client.name,
            email:client.email,
            phone:client.phone
        }).then((response) => {
            return response.data.data.client
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('client').then((response) => {
            return response.data.data.clients
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`client/${id}`).then((response)=>{
            return response.data.data.client;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(client:Client){
        return  await Api().delete(`client/${client.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

