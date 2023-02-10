
import InitialState,{SetChartAction} from "../types/chart";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import Chart from "../types/chart";

const initialState : InitialState = {
    chart:{},
    charts:[]
}

export const chartSlice = createSlice({
    name: SetChartAction,
    initialState: initialState,
    reducers: {
        setChart: (state,action: PayloadAction<any>) => {
            state.chart = action.payload
        },
        setCharts: (state,action: PayloadAction<any>)=>{
            state.charts = action.payload
        }
    }
});

export default chartSlice
