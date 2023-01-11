
import InitialState,{SetCompanyAction} from "../types/company";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Company, Content} from "../types/types";
import {SetContentAction} from "../types/content";

const initialState: InitialState = {
    company:{
        vatNumber:'',
        companiesHouseNumber:''
    }
}

export const companySlice = createSlice({
    name: SetCompanyAction,
    initialState: initialState,
    reducers: {
        setCompany: (state,action: PayloadAction<Company>) => {
            state.company = action.payload
        },
    },
});

export default companySlice
