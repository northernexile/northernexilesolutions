import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import {ApiError, CV} from "../types/types";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";
import cvService from "../services/cvService";
import cvSlice from "../slices/cvSlice";

export const cvActions = cvSlice.actions

export const getCv = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:CV|ApiError = await cvService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        dispatch(cvActions.setCV(response))
    }
}
