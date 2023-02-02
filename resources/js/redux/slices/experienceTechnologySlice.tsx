
import InitialState, {SetExperienceTechnologyAction} from "../types/experienceTechnology";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {ExperienceTechnology} from "../types/types";

const initialState: InitialState = {
    experienceTechnologies: [],
    experienceTechnology:{}
};

export const experienceTechnologySlice = createSlice({
    name: SetExperienceTechnologyAction,
    initialState: initialState,
    reducers: {
        setTechnologies: (state,action: PayloadAction<Array<ExperienceTechnology>>) => {
            state.experienceTechnologies = action.payload
        },
        setTechnology: (state,action:PayloadAction<ExperienceTechnology>) => {
            state.experienceTechnology = action.payload
        }
    },
});

const selectExperienceTechnology = (state) => state.experienceTechnology.experienceTechnology

export default experienceTechnologySlice;
export {selectExperienceTechnology}
