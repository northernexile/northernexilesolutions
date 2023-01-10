
import InitialState, {SetPageAction} from "../types/page";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Page} from "../types/types";

const initialState: InitialState = {
    pages: [],
    active: {
       id:'',
       name:'',
       slug:''
    }
};

export const pageSlice = createSlice({
    name: SetPageAction,
    initialState: initialState,
    reducers: {
        setPage: (state,action: PayloadAction<Array<Page>>) => {
            state.pages = action.payload
        },
        setActivePage: (state,action: PayloadAction<Page>) => {
            state.active = action.payload
        }
    },
});

export default pageSlice
