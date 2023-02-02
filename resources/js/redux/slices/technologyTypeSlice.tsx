
import InitialState, {SetTechnologyTypeAction} from "../types/technologyType";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {TechnologyType} from "../types/types";

const initialState: InitialState = {
    technologyType:{},
    technologyTypes:[]
};

export const technologyTypeSlice = createSlice({
    name: SetTechnologyTypeAction,
    initialState: initialState,
    reducers: {
        setTechnologyType: (state,action:PayloadAction<TechnologyType>) => {
            state.technologyType = action.payload
        },
        setTechnologies: (state,action: PayloadAction<Array<TechnologyType>>) => {
            state.technologyTypes = action.payload
        },
    },
});

export default technologyTypeSlice
