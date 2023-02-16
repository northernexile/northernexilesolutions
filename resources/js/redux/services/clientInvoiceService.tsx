
import Api from '../api/api'
import {ClientInvoice} from "../types/types";

export default {
    async add(clientInvoice){
        const response = await Api().post('client/invoice',{
            client_id:clientInvoice.client_id,
            status:clientInvoice.status
        })
        return response.data.data.client_invoice;
    },

    async update(clientInvoice){
        return await Api().patch(`client/invoice/${clientInvoice.id}`,{
            client_id:clientInvoice.client_id,
            status:clientInvoice.status
        }).then((response) => {
            return response.data.data.client_invoice
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('client/invoice').then((response) => {
            return response.data.data.client_invoices
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`client/invoice/${id}`).then((response)=>{
            return response.data.data.client_invoice;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(clientInvoice:ClientInvoice){
        return  await Api().delete(`client/invoice/${clientInvoice.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

