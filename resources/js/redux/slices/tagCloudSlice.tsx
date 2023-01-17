

import InitialState, {SetTagCloudAction} from "../types/tagCloud";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {TagCloud} from "../types/types";

const initialState: InitialState = {
    cloud: [],
};

export const tagCloudSlice = createSlice({
    name: SetTagCloudAction,
    initialState: initialState,
    reducers: {
        setTagCloud: (state,action: PayloadAction<Array<TagCloud>>) => {
            state.cloud = action.payload
        },
    },
});

export default tagCloudSlice
