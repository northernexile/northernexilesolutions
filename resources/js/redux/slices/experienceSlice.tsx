
import InitialState,{SetExperienceAction} from "../types/experience";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Experience} from "../types/types";

const initialState: InitialState = {
    experience:{
        title:'',
        company:'',
        description:'',
        start:null,
        stop:null
    },
    history:[]
}

export const experienceSlice = createSlice({
    name: SetExperienceAction,
    initialState: initialState,
    reducers: {
        setExperience: (state,action: PayloadAction<Experience>) => {
            state.experience = action.payload
        },
        setExperiences: (state,action:PayloadAction<Array<Experience>>) => {
            state.history = action.payload
        },
    }
});

const selectExperience = (state) => state.experience.experience

export default experienceSlice
export {selectExperience}
