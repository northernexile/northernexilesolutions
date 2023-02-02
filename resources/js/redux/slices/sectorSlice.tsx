
import InitialState, {SetSectorAction} from "../types/sector";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Sector} from "../types/types";

const initialState: InitialState = {
    sectors: [],
    active: {
        id:'',
        name:'',
        icon:''
    }
};

export const sectorSlice = createSlice({
    name: SetSectorAction,
    initialState: initialState,
    reducers: {
        setSectors: (state,action: PayloadAction<Array<Sector>>) => {
            state.sectors = action.payload
        },
        setActiveSector: (state,action: PayloadAction<Sector>) => {
            state.active = action.payload
        }
    },
});

export default sectorSlice
