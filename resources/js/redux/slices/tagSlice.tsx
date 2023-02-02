
import InitialState, {SetTagAction} from "../types/tag";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Tag} from "../types/types";

const initialState: InitialState = {
    tags: [],
    tag:{}
};

export const tagSlice = createSlice({
    name: SetTagAction,
    initialState: initialState,
    reducers: {
        setTags: (state,action: PayloadAction<Array<Tag>>) => {
            state.tags = action.payload
        },
        setTag: (state,action: PayloadAction<Tag>) => {
            state.tag = action.payload
        }
    },
});

export const selectTag = (state) => state.tag.tag
export default tagSlice
