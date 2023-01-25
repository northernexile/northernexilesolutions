
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import errorSlice from '../slices/errorSlice'

export const errorActions = errorSlice.actions

export const clearError = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        errorActions.clearError({})
    }
}
