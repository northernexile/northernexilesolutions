
import InitialState,{SetCVAction} from "../types/cv";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {CV} from "../types/types"

const initialState : InitialState = {
    cv:{}
}

export const cvSlice = createSlice({
    name: SetCVAction,
    initialState: initialState,
    reducers: {
        setCV: (state,action: PayloadAction<CV>) => {
            state.cv = action.payload
        }
    }
});

export default cvSlice
