
import InitialState,{SetChartAction} from "../types/chart";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import Chart from "../types/chart";

const initialState : InitialState = {
    chart:{}
}

export const chartSlice = createSlice({
    name: SetChartAction,
    initialState: initialState,
    reducers: {
        setChart: (state,action: PayloadAction<any>) => {
            state.chart = action.payload
        }
    }
});

export default chartSlice
