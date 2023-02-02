
import InitialState, {SetTechnologyAction} from "../types/technology";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Technology} from "../types/types";

const initialState: InitialState = {
    technology:{
        id:'',
        name:'',
        icon:'',
        description:''
    },
    technologies: []
};

export const technologySlice = createSlice({
    name: SetTechnologyAction,
    initialState: initialState,
    reducers: {
        setTechnology: (state,action:PayloadAction<Technology>) => {
            state.technology = action.payload
        },
        setTechnologies: (state,action: PayloadAction<Array<Technology>>) => {
            state.technologies = action.payload
        },
    },
});

export default technologySlice
