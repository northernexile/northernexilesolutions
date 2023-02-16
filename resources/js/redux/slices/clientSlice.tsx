
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Client} from "../types/types";
import InitialState ,{SetClientAction} from "../types/client";

const initialState: InitialState = {
    client:{
        id:null,
        name:'',
        email:'',
        phone:'',
    },
    clients:[]
}

export const clientSlice = createSlice({
    name: SetClientAction,
    initialState: initialState,
    reducers: {
        setClient: (state,action: PayloadAction<Client>) => {
            state.client = action.payload
        },
        setClients: (state,action:PayloadAction<Array<Client>>) => {
            state.clients = action.payload
        },
    }
});

const selectClient = (state) => state.client.client

export default clientSlice
export {selectClient}
