
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {ClientInvoiceItem} from "../types/types";
import InitialState ,{SetClientInvoiceItemAction} from "../types/clientInvoiceItem";

const initialState: InitialState = {
    clientInvoiceItem:{
        id:null,
        client_invoice_id:null,
        amount_in_pence_ex_vat:null,
        description:null,
        item_date:null
    },
    clientInvoiceItems:[]
}

export const clientInvoiceItemSlice = createSlice({
    name: SetClientInvoiceItemAction,
    initialState: initialState,
    reducers: {
        setClientInvoiceItem: (state,action: PayloadAction<ClientInvoiceItem>) => {
            state.clientInvoiceItem = action.payload
        },
        setClientsInvoiceItems: (state,action:PayloadAction<Array<ClientInvoiceItem>>) => {
            state.clientInvoiceItems = action.payload
        },
    }
});

const selectClientInvoiceItem = (state) => state.clientInvoiceItem.clientInvoiceItem

export default clientInvoiceItemSlice
export {selectClientInvoiceItem}
