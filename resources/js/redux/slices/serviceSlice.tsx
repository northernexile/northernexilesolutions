

import InitialState,{SetServiceAction} from "../types/services";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Service} from "../types/types";

const initialState: InitialState = {
    services:[]
}

export const serviceSlice = createSlice({
    name: SetServiceAction,
    initialState: initialState,
    reducers: {
        setServices: (state,action: PayloadAction<Array<Service>>) => {
            state.services = action.payload
        },
    },
});

export default serviceSlice
