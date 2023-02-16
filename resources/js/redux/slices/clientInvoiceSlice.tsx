
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {ClientInvoice} from "../types/types";
import InitialState ,{SetClientInvoiceAction} from "../types/clientInvoice";

const initialState: InitialState = {
    clientInvoice:{
        client_id:null,
        status:null
    },
    clientInvoices:[]
}

export const clientInvoiceSlice = createSlice({
    name: SetClientInvoiceAction,
    initialState: initialState,
    reducers: {
        setClientInvoice: (state,action: PayloadAction<ClientInvoice>) => {
            state.clientInvoice = action.payload
        },
        setClientsInvoices: (state,action:PayloadAction<Array<ClientInvoice>>) => {
            state.clientInvoices = action.payload
        },
    }
});

const selectClientInvoice = (state) => state.clientInvoice.clientInvoice

export default clientInvoiceSlice
export {selectClientInvoice}
