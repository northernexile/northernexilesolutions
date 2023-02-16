
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {ClientAddress} from "../types/types";
import InitialState ,{SetClientAddressAction} from "../types/clientAddress";

const initialState: InitialState = {
    clientAddress:{
        client_id:null,
        address_id:null
    },
    clientAddresses:[]
}

export const clientAddressSlice = createSlice({
    name: SetClientAddressAction,
    initialState: initialState,
    reducers: {
        setClientAddress: (state,action: PayloadAction<ClientAddress>) => {
            state.clientAddress = action.payload
        },
        setClientsAddresses: (state,action:PayloadAction<Array<ClientAddress>>) => {
            state.clientAddresses = action.payload
        },
    }
});

const selectClientAddress = (state) => state.clientAddress.clientAddress

export default clientAddressSlice
export {selectClientAddress}
