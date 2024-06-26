
import Api from '../api/api'
import {ClientAddress} from "../types/types";

export default {
    async add(clientAddress){
        const response = await Api().post('address',{
            client_id:clientAddress.client_id,
            address_id:clientAddress.address_id
        })
        return response.data.data.clientAddress;
    },

    async update(clientAddress){
        return await Api().patch(`client/address/${clientAddress.id}`,{
            client_id:clientAddress.client_id,
            address_id:clientAddress.address_id
        }).then((response) => {
            return response.data.data.clientAddress
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(clientId){
        return await Api().get('client/address',{params:{client_id:clientId}}).then((response) => {
            return response.data.data.clientAddresses
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`client/address/${id}`).then((response)=>{
            return response.data.data.clientAddress;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(clientAddress:ClientAddress){
        return  await Api().delete(`client/address/${clientAddress.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

