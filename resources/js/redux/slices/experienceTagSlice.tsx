
import InitialState, {SetExperienceTagAction} from "../types/experienceTag";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {ExperienceTag} from "../types/types";

const initialState: InitialState = {
    experienceTags: [],
    experienceTag:{}
};

export const experienceTagSlice = createSlice({
    name: SetExperienceTagAction,
    initialState: initialState,
    reducers: {
        setTags: (state,action: PayloadAction<Array<ExperienceTag>>) => {
            state.experienceTags = action.payload
        },
        setTag: (state,action:PayloadAction<ExperienceTag>) => {
            state.experienceTag = action.payload
        }
    },
});

const selectExperienceTag = (state) => state.experienceTag.experienceTag

export default experienceTagSlice;
export {selectExperienceTag}
