import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import {ApiError, Chart} from "../types/types";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import chartSlice from "../slices/chartSlice";
import chartService from "../services/chartService";

export const chartActions = chartSlice.actions

export const getChart = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:any|ApiError = await chartService.getFrameworks()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        dispatch(chartActions.setChart(response))
    }
}
