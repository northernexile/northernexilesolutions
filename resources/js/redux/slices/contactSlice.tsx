
import InitialState,{SetContactAction} from "../types/contact";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Contact} from "../types/types";

const initialState: InitialState = {
    contact:{id:'',name:'',email:'',text:'',created_at:''},
    contacts:[]
}

export const contactSlice = createSlice({
    name: SetContactAction,
    initialState: initialState,
    reducers: {
        setContact: (state,action: PayloadAction<Contact>) => {
            state.contact = action.payload
        },
        setContacts: (state,action:PayloadAction<Array<Contact>>) => {
            state.contacts = action.payload
        }
    }
});

export default contactSlice
