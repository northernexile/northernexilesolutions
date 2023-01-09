
import InitialState, {SetContentAction} from "../types/content";
import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import {Content} from "../types/types";

const initialState: InitialState = {
    content: []
};

export const contentSlice = createSlice({
    name: SetContentAction,
    initialState: initialState,
    reducers: {
        setContent: (state,action: PayloadAction<Array<Content>>) => {
            state.content = action.payload
        },
    },
});

export default contentSlice
