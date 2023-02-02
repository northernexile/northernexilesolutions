
import technologyTypeSlice from '../slices/technologyTypeSlice'
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {ApiError, TechnologyType} from "../types/types";
import TechnologyTypeService from "../services/technologyTypeService";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const technologyTypeActions = technologyTypeSlice.actions

export const getAllTechnologyTypes =():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState): Promise<void> =>{
        const response:TechnologyType[]|ApiError = await TechnologyTypeService.getAllTechnologies()

        if(isApiError(response,200)){
            toast.error(response.message);
        } else {
            dispatch(technologyTypeActions.setTechnologies(response))
        }
    }
}



