
import InitialState, {SetExperienceSectorAction} from "../types/experienceSector";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {ExperienceSector} from "../types/types";

const initialState: InitialState = {
    experienceSectors: [],
    experienceSector:{}
};

export const experienceSectorSlice = createSlice({
    name: SetExperienceSectorAction,
    initialState: initialState,
    reducers: {
        setSectors: (state,action: PayloadAction<Array<ExperienceSector>>) => {
            state.experienceSectors = action.payload
        },
        setSector: (state,action:PayloadAction<ExperienceSector>) => {
            state.experienceSector = action.payload
        }
    },
});

const selectExperienceSector = (state) => state.experienceSector.experienceSector

export default experienceSectorSlice;
export {selectExperienceSector}
