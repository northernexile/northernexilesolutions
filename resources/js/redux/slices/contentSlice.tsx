
import InitialState, {SetContentAction} from "../types/content";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Content} from "../types/types";

const initialState: InitialState = {
    content: [],
    active: {
        id:'',
        name:'',
        text:''
    }
};

export const contentSlice = createSlice({
    name: SetContentAction,
    initialState: initialState,
    reducers: {
        setContent: (state,action: PayloadAction<Array<Content>>) => {
            state.content = action.payload
        },
        setActiveContent: (state,action: PayloadAction<Content>) => {
            state.active = action.payload
        }
    },
});

export default contentSlice
