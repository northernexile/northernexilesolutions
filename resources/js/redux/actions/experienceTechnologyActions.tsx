
import {ApiError, ExperienceTechnology} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ExperienceTechnologyService from "../services/experienceTechnologyService";
import ExperienceTechnologySlice from "../slices/experienceTechnologySlice";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const experienceTechnologyActions = ExperienceTechnologySlice.actions

export const addExperienceTechnology = (experienceTechnology:ExperienceTechnology):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:ExperienceTechnology|ApiError = await ExperienceTechnologyService.add(experienceTechnology)

        if(!isApiError(response,201)) {
            toast.success('Experience Technology added.')
            dispatch(experienceTechnologyActions.setTechnology(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewExperienceTechnology = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceTechnology|ApiError = await ExperienceTechnologyService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Experience Technology loaded')
        dispatch(experienceTechnologyActions.setTechnology(response))
    }
}

export const updateExperienceTechnology = (experienceTechnology:ExperienceTechnology):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceTechnology|ApiError = await ExperienceTechnologyService.update(experienceTechnology)
        if(!isApiError(response,200)) {
            toast.success('Updated Experience Technology')
            dispatch(experienceTechnologyActions.setTechnology(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteExperienceTechnology = (experienceTechnology:ExperienceTechnology):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ExperienceTechnologyService.delete(experienceTechnology)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllExperienceTechnologies = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:ExperienceTechnology[]|ApiError = await ExperienceTechnologyService.getAllTechnologies()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded Experience Technology')
        dispatch(experienceTechnologyActions.setTechnologies(response))
    }
}
