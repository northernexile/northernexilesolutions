
import InitialState,{SetContactAction} from "../types/contact";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Contact, Content} from "../types/types";
import {SetContentAction} from "../types/content";

const initialState: InitialState = {
    contact:{name:'',email:'',text:''}
}

export const contactSlice = createSlice({
    name: SetContactAction,
    initialState: initialState,
    reducers: {
        setContact: (state,action: PayloadAction<Contact>) => {
            state.contact = action.payload
        },
    },
});

export default contactSlice
