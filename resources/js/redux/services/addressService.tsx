
import Api from '../api/api'
import {Address} from "../types/types";

export default {
    async add(address){
        const response = await Api().post('address',{
            thoroughfare:address.thoroughfare,
            address_line_1:address.address_line_1,
            address_line_2:address.address_line_2,
            address_line_3:address.address_line_3,
            town:address.town,
            county:address.county,
            postcode:address.postcode,
            client_id:address.client_id
        })
        return response.data.data.address;
    },

    async update(address){
        return await Api().patch(`address/${address.id}`,{
            thoroughfare:address.thoroughfare,
            address_line_1:address.address_line_1,
            address_line_2:address.address_line_2,
            address_line_3:address.address_line_3,
            town:address.town,
            county:address.county,
            postcode:address.postcode,
        }).then((response) => {
            return response.data.data.address
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('address').then((response) => {
            return response.data.data.addressses
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`address/${id}`).then((response)=>{
            return response.data.data.address;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(address:Address){
        return  await Api().delete(`address/${address.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

