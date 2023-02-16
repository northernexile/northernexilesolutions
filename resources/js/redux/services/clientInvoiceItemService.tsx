
import Api from '../api/api'
import {ClientInvoiceItem} from "../types/types";

export default {
    async add(clientInvoiceItem){
        const response = await Api().post('client/invoice/item',{
            client_invoice_id:clientInvoiceItem.client_invoice_id,
            amount_in_pence_ex_vat:clientInvoiceItem.amount_in_pence_ex_vat,
            description:clientInvoiceItem.description,
            item_date:clientInvoiceItem.item_date
        })
        return response.data.data.client_invoice_item;
    },

    async update(clientInvoiceItem){
        return await Api().patch(`client/invoice/item/${clientInvoiceItem.id}`,{
            client_invoice_id:clientInvoiceItem.client_invoice_id,
            amount_in_pence_ex_vat:clientInvoiceItem.amount_in_pence_ex_vat,
            description:clientInvoiceItem.description,
            item_date:clientInvoiceItem.item_date
        }).then((response) => {
            return response.data.data.client_invoice_item
        }).catch((error) => {
            return error.response.data
        })
    },

    async getAll(){
        return await Api().get('client/invoice/item').then((response) => {
            return response.data.data.client_invoice_items
        }).catch((error)=>{
            return error.response.data
        });
    },
    async getById(id){
        return await Api().get(`client/invoice/item/${id}`).then((response)=>{
            return response.data.data.client_invoice_item;
        }).catch((error) => {
            return error.response.data
        })

    },
    async delete(clientInvoiceItem:ClientInvoiceItem){
        return  await Api().delete(`client/invoice/item/${clientInvoiceItem.id}`)
            .then((response) => {
                return response.data.success
            }).catch((error) => {
                return error.response.data;
            })
    }
}

