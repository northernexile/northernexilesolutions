
import InitialState,{SetErrorAction} from "../types/error";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {ApiError} from "../types/types";

const initialState: InitialState = {
    error:{}
}

export const errorSlice = createSlice({
    name: SetErrorAction,
    initialState: initialState,
    reducers:{
        setError: (state,action: PayloadAction<ApiError>) => {
            state.error = action.payload
        },
        clearError: (state,action:PayloadAction<any>) => {
            state.error = {}
        }
    }
})

export default errorSlice
