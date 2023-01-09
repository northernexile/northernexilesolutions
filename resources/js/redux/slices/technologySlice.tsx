
import InitialState, {SetTechnologyAction} from "../types/technology";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Technology} from "../types/types";

const initialState: InitialState = {
    technologies: []
};

export const technologySlice = createSlice({
    name: SetTechnologyAction,
    initialState: initialState,
    reducers: {
        setTechnologies: (state,action: PayloadAction<Array<Technology>>) => {
            state.technologies = action.payload
        },
    },
});

export default technologySlice
